<?php
namespace App\Libraries;

class Uploader {
    protected $errors = [];
    protected $uploadedFiles = [];
    
    /**
     * Upload a single file
     */
    public function upload($file, $directory, $options = []) {
        $defaults = [
            'allowedTypes' => ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'],
            'maxSize' => 5 * 1024 * 1024, // 5MB default
            'randomName' => true
        ];
        
        $options = array_merge($defaults, $options);
        
        // Check if file was uploaded
        if (!isset($file['tmp_name']) || empty($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            $this->errors[] = 'No file uploaded or upload error';
            return false;
        }
        
        // Check file size
        if ($file['size'] > $options['maxSize']) {
            $this->errors[] = 'File too large. Max size: ' . ($options['maxSize'] / 1048576) . 'MB';
            return false;
        }
        
        // Get file extension
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        // Check allowed types
        if (!in_array($ext, $options['allowedTypes'])) {
            $this->errors[] = 'File type not allowed. Allowed: ' . implode(', ', $options['allowedTypes']);
            return false;
        }
        
        // Create directory if not exists
        $uploadDir = PUBLIC_PATH . '/uploads/' . $directory . '/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                $this->errors[] = 'Failed to create upload directory';
                return false;
            }
        }
        
        // Generate filename
        if ($options['randomName']) {
            $filename = uniqid() . '_' . time() . '.' . $ext;
        } else {
            $filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $file['name']);
        }
        
        $destination = $uploadDir . $filename;
        
        // Move file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $this->uploadedFiles[] = [
                'original' => $file['name'],
                'filename' => $filename,
                'path' => '/uploads/' . $directory . '/' . $filename,
                'size' => $file['size'],
                'type' => $ext
            ];
            return '/uploads/' . $directory . '/' . $filename;
        } else {
            $this->errors[] = 'Failed to move uploaded file';
            return false;
        }
    }
    
    /**
     * Upload multiple files
     */
    public function uploadMultiple($files, $directory, $options = []) {
        $uploaded = [];
        
        // Handle single file array structure
        if (isset($files['name']) && !is_array($files['name'])) {
            return $this->upload($files, $directory, $options);
        }
        
        // Handle multiple files
        foreach ($files['name'] as $key => $name) {
            if ($files['error'][$key] === UPLOAD_ERR_OK) {
                $file = [
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                ];
                
                $result = $this->upload($file, $directory, $options);
                if ($result) {
                    $uploaded[] = $result;
                }
            }
        }
        
        return $uploaded;
    }
    
    /**
     * Upload base64 image
     */
    public function uploadBase64($base64String, $directory, $filename = null) {
        // Extract image data from base64 string
        if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $matches)) {
            $imageType = $matches[1];
            $base64String = substr($base64String, strpos($base64String, ',') + 1);
        } else {
            $this->errors[] = 'Invalid base64 image format';
            return false;
        }
        
        $base64String = str_replace(' ', '+', $base64String);
        $imageData = base64_decode($base64String);
        
        if ($imageData === false) {
            $this->errors[] = 'Base64 decode failed';
            return false;
        }
        
        // Create directory if not exists
        $uploadDir = PUBLIC_PATH . '/uploads/' . $directory . '/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                $this->errors[] = 'Failed to create upload directory';
                return false;
            }
        }
        
        // Generate filename if not provided
        if (!$filename) {
            $filename = uniqid() . '_' . time() . '.' . $imageType;
        }
        
        $destination = $uploadDir . $filename;
        
        // Save file
        if (file_put_contents($destination, $imageData)) {
            return '/uploads/' . $directory . '/' . $filename;
        } else {
            $this->errors[] = 'Failed to save file';
            return false;
        }
    }
    
    /**
     * Delete a file
     */
    public function delete($filePath) {
        $fullPath = PUBLIC_PATH . $filePath;
        if (file_exists($fullPath) && is_file($fullPath)) {
            return unlink($fullPath);
        }
        return false;
    }
    
    /**
     * Get errors
     */
    public function getErrors() {
        return $this->errors;
    }
    
    /**
     * Get uploaded files info
     */
    public function getUploadedFiles() {
        return $this->uploadedFiles;
    }
    
    /**
     * Validate image dimensions
     */
    public function validateImageDimensions($filePath, $minWidth = null, $minHeight = null, $maxWidth = null, $maxHeight = null) {
        if (!file_exists($filePath)) {
            $this->errors[] = 'File does not exist';
            return false;
        }
        
        $imageInfo = getimagesize($filePath);
        if ($imageInfo === false) {
            $this->errors[] = 'Invalid image file';
            return false;
        }
        
        list($width, $height) = $imageInfo;
        
        if ($minWidth && $width < $minWidth) {
            $this->errors[] = "Image width must be at least {$minWidth}px";
            return false;
        }
        
        if ($minHeight && $height < $minHeight) {
            $this->errors[] = "Image height must be at least {$minHeight}px";
            return false;
        }
        
        if ($maxWidth && $width > $maxWidth) {
            $this->errors[] = "Image width must not exceed {$maxWidth}px";
            return false;
        }
        
        if ($maxHeight && $height > $maxHeight) {
            $this->errors[] = "Image height must not exceed {$maxHeight}px";
            return false;
        }
        
        return true;
    }
    
    /**
     * Create image thumbnail
     */
    public function createThumbnail($sourcePath, $destinationPath, $maxWidth = 200, $maxHeight = 200) {
        if (!file_exists($sourcePath)) {
            $this->errors[] = 'Source file does not exist';
            return false;
        }
        
        $imageInfo = getimagesize($sourcePath);
        if ($imageInfo === false) {
            $this->errors[] = 'Invalid image file';
            return false;
        }
        
        list($width, $height, $type) = $imageInfo;
        
        // Create source image based on type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $source = imagecreatefromgif($sourcePath);
                break;
            default:
                $this->errors[] = 'Unsupported image type';
                return false;
        }
        
        // Calculate new dimensions
        $ratio = min($maxWidth / $width, $maxHeight / $height);
        $newWidth = round($width * $ratio);
        $newHeight = round($height * $ratio);
        
        // Create thumbnail
        $thumbnail = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG
        if ($type == IMAGETYPE_PNG) {
            imagealphablending($thumbnail, false);
            imagesavealpha($thumbnail, true);
            $transparent = imagecolorallocatealpha($thumbnail, 255, 255, 255, 127);
            imagefilledrectangle($thumbnail, 0, 0, $newWidth, $newHeight, $transparent);
        }
        
        imagecopyresampled($thumbnail, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
        // Save thumbnail
        $directory = dirname($destinationPath);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($thumbnail, $destinationPath, 85);
                break;
            case IMAGETYPE_PNG:
                imagepng($thumbnail, $destinationPath, 9);
                break;
            case IMAGETYPE_GIF:
                imagegif($thumbnail, $destinationPath);
                break;
        }
        
        // Free memory
        imagedestroy($source);
        imagedestroy($thumbnail);
        
        return true;
    }
}