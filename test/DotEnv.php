<?php

/**
 * Klasa parsira .env fajl i kreira environment varijable
 *
 * @author Dragoljub Djordjevic
 * @version 0.1
 */

class DotEnv
{

    private $file;

    public function __construct($envFile)
    {
        if (is_readable($envFile)) {
            $this->file = $envFile;
            $this->load();
        } else {
            echo "File does not exists";
        }

    }

    private function load()
    {
        $lines = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {

            if (strpos($line, "#") === 0) {
                continue;
            }

            list ($name, $value) = explode("=", $line);

            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_SERVER[$name] = $value;
                $_ENV[$name] = $value;
            }
        }
    }


    /*
     * Get environment variable
     *
     * @param $name - environment variable name
     * @param $default - default value if environment variable is not found
     *
     * @returns string
     */

    public function getVar($name, $default = "variable is not set"): string
    {

        if (getenv($name) != false) {
            return getenv($name);
        } else {
            return $default;
        }

    }

}
