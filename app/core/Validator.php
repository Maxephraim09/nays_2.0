<?php
namespace App\Core;

class Validator {
    protected $errors = [];
    protected $data = [];
    protected $messages = [];
    
    public static function validate($data, $rules, $messages = []) {
        $validator = new self();
        $validator->data = $data;
        $validator->messages = $messages;
        
        foreach ($rules as $field => $ruleString) {
            $rules = explode('|', $ruleString);
            
            foreach ($rules as $rule) {
                $params = [];
                
                if (strpos($rule, ':') !== false) {
                    list($rule, $param) = explode(':', $rule, 2);
                    $params = explode(',', $param);
                }
                
                $method = 'validate' . ucfirst($rule);
                if (method_exists($validator, $method)) {
                    $validator->$method($field, $params);
                }
            }
        }
        
        return $validator;
    }
    
    public function fails() {
        return !empty($this->errors);
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    protected function addError($field, $message) {
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = [];
        }
        $this->errors[$field][] = $message;
    }
    
    protected function getMessage($field, $rule, $default) {
        $key = $field . '.' . $rule;
        return $this->messages[$key] ?? $this->messages[$rule] ?? $default;
    }
    
    protected function validateRequired($field, $params) {
        if (!isset($this->data[$field]) || trim($this->data[$field]) === '') {
            $message = $this->getMessage($field, 'required', ucfirst($field) . ' is required');
            $this->addError($field, $message);
        }
    }
    
    protected function validateEmail($field, $params) {
        if (isset($this->data[$field]) && !empty($this->data[$field])) {
            if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
                $message = $this->getMessage($field, 'email', 'Invalid email format');
                $this->addError($field, $message);
            }
        }
    }
    
    protected function validateMin($field, $params) {
        if (!isset($this->data[$field]) || trim($this->data[$field]) === '') {
            return;
        }
        
        $min = $params[0];
        $value = $this->data[$field];
        
        // Check if it's a number
        if (is_numeric($value)) {
            if ($value < $min) {
                $message = $this->getMessage($field, 'min', ucfirst($field) . " must be at least {$min}");
                $this->addError($field, $message);
            }
        } else {
            if (strlen($value) < $min) {
                $message = $this->getMessage($field, 'min', ucfirst($field) . " must be at least {$min} characters");
                $this->addError($field, $message);
            }
        }
    }
    
    protected function validateMax($field, $params) {
        if (!isset($this->data[$field]) || trim($this->data[$field]) === '') {
            return;
        }
        
        $max = $params[0];
        $value = $this->data[$field];
        
        // Check if it's a number
        if (is_numeric($value)) {
            if ($value > $max) {
                $message = $this->getMessage($field, 'max', ucfirst($field) . " must not exceed {$max}");
                $this->addError($field, $message);
            }
        } else {
            if (strlen($value) > $max) {
                $message = $this->getMessage($field, 'max', ucfirst($field) . " must not exceed {$max} characters");
                $this->addError($field, $message);
            }
        }
    }
    
    protected function validateNumeric($field, $params) {
        if (isset($this->data[$field]) && !empty($this->data[$field])) {
            if (!is_numeric($this->data[$field])) {
                $message = $this->getMessage($field, 'numeric', ucfirst($field) . ' must be a number');
                $this->addError($field, $message);
            }
        }
    }
    
    protected function validateConfirmed($field, $params) {
        if (isset($this->data[$field]) && isset($this->data[$field . '_confirmation'])) {
            if ($this->data[$field] !== $this->data[$field . '_confirmation']) {
                $message = $this->getMessage($field, 'confirmed', ucfirst($field) . ' confirmation does not match');
                $this->addError($field, $message);
            }
        }
    }
    
    protected function validateIn($field, $params) {
        if (isset($this->data[$field]) && !empty($this->data[$field])) {
            if (!in_array($this->data[$field], $params)) {
                $message = $this->getMessage($field, 'in', ucfirst($field) . ' must be one of: ' . implode(', ', $params));
                $this->addError($field, $message);
            }
        }
    }
}