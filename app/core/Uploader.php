<?php
namespace App\Core;

class Uploader {
    protected $errors = [];
    protected $uploadedFiles = [];
    
    public function upload($file, $directory, $options = []) {
        $defaults = [
            'allowedTypes' => ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'],
            'maxSize' => MAX_FILE_SIZE,
            'randomName' => true
        ];
        
        $options = array_merge($defaults, $options);
        
        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            $this->errors[] = 'No file uploaded';
            return false;
        }
        
        // Check for errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->errors[] = $this->uploadError($file['error']);
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
            mkdir($uploadDir, 0755, true);
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
    
    public function uploadMultiple($files, $directory, $options = []) {
        $uploaded = [];
        foreach ($files['tmp_name'] as $key => $tmp_name) {
            if ($files['error'][$key] === UPLOAD_ERR_OK) {
                $file = [
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key],
                    'tmp_name' => $tmp_name,
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
    
    protected function uploadError($code) {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                return 'File exceeds upload_max_filesize';
            case UPLOAD_ERR_FORM_SIZE:
                return 'File exceeds MAX_FILE_SIZE';
            case UPLOAD_ERR_PARTIAL:
                return 'File only partially uploaded';
            case UPLOAD_ERR_NO_FILE:
                return 'No file uploaded';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Missing temporary folder';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Failed to write file to disk';
            default:
                return 'Unknown upload error';
        }
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function getUploadedFiles() {
        return $this->uploadedFiles;
    }
}