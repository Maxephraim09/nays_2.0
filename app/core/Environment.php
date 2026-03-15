<?php
namespace App\Core;

class Environment
{
    /**
     * Validate environment configuration
     */
    public static function validate()
    {
        $required = [
            'APP_KEY',
            'DB_HOST',
            'DB_DATABASE',
            'DB_USERNAME',
            'MAIL_HOST',
            'MAIL_USERNAME',
            'MAIL_PASSWORD'
        ];

        $missing = [];
        foreach ($required as $key) {
            if (empty($_ENV[$key])) {
                $missing[] = $key;
            }
        }

        if (!empty($missing)) {
            throw new \Exception("Missing required environment variables: " . implode(', ', $missing));
        }

        // Validate APP_KEY format
        if (!preg_match('/^base64:/', $_ENV['APP_KEY'])) {
            throw new \Exception("APP_KEY must be in base64 format. Run 'php bin/generate-key' to generate one.");
        }

        // Check if in production mode
        if ($_ENV['APP_ENV'] === 'production') {
            self::validateProduction();
        }
    }

    /**
     * Validate production environment
     */
    private static function validateProduction()
    {
        if ($_ENV['APP_DEBUG'] === 'true') {
            throw new \Exception("APP_DEBUG must be false in production environment!");
        }

        if (empty($_ENV['APP_URL']) || $_ENV['APP_URL'] === 'http://localhost') {
            throw new \Exception("APP_URL must be set to your production URL!");
        }

        if (strlen($_ENV['JWT_SECRET']) < 32) {
            throw new \Exception("JWT_SECRET must be at least 32 characters in production!");
        }

        if ($_ENV['BCRYPT_ROUNDS'] < 12) {
            throw new \Exception("BCRYPT_ROUNDS should be at least 12 in production!");
        }
    }

    /**
     * Generate secure random keys
     */
    public static function generateKeys()
    {
        return [
            'app_key' => 'base64:' . base64_encode(random_bytes(32)),
            'jwt_secret' => bin2hex(random_bytes(32)),
            'encryption_key' => bin2hex(random_bytes(32))
        ];
    }

    /**
     * Check if environment is local/development
     */
    public static function isLocal()
    {
        return in_array($_ENV['APP_ENV'], ['local', 'development']);
    }

    /**
     * Check if environment is production
     */
    public static function isProduction()
    {
        return $_ENV['APP_ENV'] === 'production';
    }

    /**
     * Check if debugging is enabled
     */
    public static function isDebug()
    {
        return $_ENV['APP_DEBUG'] === 'true';
    }

    /**
     * Get environment variable with default
     */
    public static function get($key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}