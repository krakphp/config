<?php

namespace Krak\Config\ConfigStore;

use Krak\Config;

abstract class AbstractConfigStore implements Config\ConfigStore
{
    public function addFiles($base_path, array $files, $default_ext = null) {
        $base_path = rtrim($base_path, '/');
        foreach ($files as $file) {
            $file = ltrim($file, '/');
            if ($default_ext) {
                $this->add($file, $base_path . '/' . $file . '.' . $default_ext);
            } else {
                $key = substr($file, 0, strrpos($file, '.'));
                $this->add($key, $base_path . '/' . $file);
            }
        }
    }

    public function addPhpFiles($base_path, array $files) {
        return $this->addFiles($base_path, $files, 'php');
    }
    public function addJsonFiles($base_path, array $files) {
        return $this->addFiles($base_path, $files, 'json');
    }
    public function addYamlFiles($base_path, array $files) {
        return $this->addFiles($base_path, $files, 'yml');
    }
    public function addIniFiles($base_path, array $files) {
        return $this->addFiles($base_path, $files, 'ini');
    }

    abstract public function add($key, $value);
    abstract public function has($key);
    abstract public function get($key);
}
