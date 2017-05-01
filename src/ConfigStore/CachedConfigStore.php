<?php

namespace Krak\Config\ConfigStore;

use Krak\Config;

class CachedConfigStore extends ConfigStoreDecorator
{
    private $cache = [];

    public function add($key, $value) {
        unset($this->cache[$key]);
        $this->store->add($key, $value);
    }

    public function get($key) {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }

        $res = $this->store->get($key);
        $this->cache[$key] = $res;
        return $res;
    }
}
