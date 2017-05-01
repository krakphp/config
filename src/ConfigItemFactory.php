<?php

namespace Krak\Config;

interface ConfigItemFactory {
    /** a config item is just a callable that returns an array of items when invoked */
    public function createConfigItem($value);
}
