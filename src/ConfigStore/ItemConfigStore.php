<?php

namespace Krak\Config\ConfigStore;

use Krak\Config;

class ItemConfigStore extends AbstractConfigStore
{
    private $item_factory;
    private $items;

    public function __construct(Config\ConfigItemFactory $item_factory = null) {
        $this->item_factory = $item_factory ?: new Config\ConfigItemFactory\StdConfigItemFactory();
        $this->items = [];
    }

    public function add($key, $value) {
        $item = $this->item_factory->createConfigItem($value);
        $this->items[$key][] = $item;
    }

    public function has($key) {
        return array_key_exists($key, $this->items);
    }

    public function get($key) {
        if (!$this->has($key)) {
            throw new LogicException("Config item does not exist at the key: $key");
        }

        return Config\mergeConfigItems($this->items[$key]);
    }
}
