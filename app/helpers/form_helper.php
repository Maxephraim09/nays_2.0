<?php
// ========================================
// FORM HELPER FUNCTIONS
// ========================================

if (!function_exists('form_open')) {
    function form_open($action = '', $method = 'post', $attributes = []) {
        $attrs = '';
        foreach ($attributes as $key => $value) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
        }
        
        $method = strtolower($method);
        $html = '<form action="' . url($action) . '" method="' . ($method === 'get' ? 'get' : 'post') . '"' . $attrs . '>';
        
        if ($method !== 'get') {
            $html .= csrf_field();
            if ($method !== 'post') {
                $html .= '<input type="hidden" name="_method" value="' . strtoupper($method) . '">';
            }
        }
        
        return $html;
    }
}

if (!function_exists('form_close')) {
    function form_close() {
        return '</form>';
    }
}

if (!function_exists('form_input')) {
    function form_input($type, $name, $value = '', $attributes = []) {
        $attrs = '';
        foreach ($attributes as $key => $val) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($val) . '"';
        }
        
        $value = $value ?: old($name);
        
        return '<input type="' . $type . '" name="' . $name . '" value="' . htmlspecialchars($value) . '"' . $attrs . '>';
    }
}

if (!function_exists('form_textarea')) {
    function form_textarea($name, $value = '', $attributes = []) {
        $attrs = '';
        foreach ($attributes as $key => $val) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($val) . '"';
        }
        
        $value = $value ?: old($name);
        
        return '<textarea name="' . $name . '"' . $attrs . '>' . htmlspecialchars($value) . '</textarea>';
    }
}

if (!function_exists('form_select')) {
    function form_select($name, $options = [], $selected = '', $attributes = []) {
        $attrs = '';
        foreach ($attributes as $key => $val) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($val) . '"';
        }
        
        $selected = $selected ?: old($name);
        
        $html = '<select name="' . $name . '"' . $attrs . '>';
        foreach ($options as $value => $label) {
            $isSelected = ($value == $selected) ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($value) . '"' . $isSelected . '>' . htmlspecialchars($label) . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    }
}

if (!function_exists('form_error')) {
    function form_error($field, $errors = []) {
        if (isset($errors[$field])) {
            return '<span class="text-danger">' . implode(', ', $errors[$field]) . '</span>';
        }
        return '';
    }
}