<?php

namespace Krak\Config;

function store(ConfigItemFactory $item_factory = null) {
    $store = new ConfigStore\ItemConfigStore($item_factory);
    $store = new ConfigStore\CachedConfigStore($store);
    $store = new ConfigStore\NestedKeyConfigStore($store);
    return $store;
}

function mergeConfigItems(array $items) {
    return array_reduce($items, function($acc, $item) {
        return array_merge_recursive($acc, $item->load());
    }, []);
}
