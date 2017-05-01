<?php

namespace Krak\Config\ConfigStore;

use Krak\Config;

abstract class ConfigStoreDecorator extends AbstractConfigStore
{
    protected $store;

    public function __construct(Config\ConfigStore $store) {
        $this->store = $store;
    }

    public function add($key, $value) {
        return $this->store->add($key, $value);
    }
    public function has($key) {
        return $this->store->has($key);
    }
    public function get($key) {
        return $this->store->get($key);
    }
}
