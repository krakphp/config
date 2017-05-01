<?php

namespace Krak\Config\ConfigStore;

/** This decorator supports retrieving nested items from the config via dot notation */
class NestedKeyConfigStore extends ConfigStoreDecorator
{
    public function has($key) {
        if (strpos($key, '.') !== false) {
            list($key) = explode('.', $key);
        }
        return $this->store->has($key);
    }

    public function get($key) {
        if (strpos($key, '.') === false) {
            return $this->store->get($key);
        }

        $default = func_num_args() > 1 ? func_get_arg(1) : null;
        $parts = explode('.', $key);

        if (!$this->store->has($parts[0])) {
            return $default;
        }

        $data = $this->store->get($parts[0]);

        foreach (array_slice($parts, 1) as $part) {
            if (array_key_exists($part, $data)) {
                $data = $data[$part];
            } else {
                return $default;
            }
        }

        return $data;
    }
}
