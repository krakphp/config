<?php

namespace Krak\Config\ConfigItemFactory;

use Krak\Config;

class StdConfigItemFactory implements Config\ConfigItemFactory
{
    private $load_file;

    public function __construct(Config\LoadFile $load_file = null) {
        $this->load_file = $load_file ?: new Config\LoadFile\AggregateLoadFile();
    }

    public function createConfigItem($value) {
        if ($value instanceof Config\ConfigItem) {
            return $value;
        }
        if (is_callable($value)) {
            return new Config\ConfigItem\CallableConfigItem($value);
        }
        if (is_array($value)) {
            return new Config\ConfigItem\ArrayConfigItem($value);
        }
        if (is_string($value)) {
            return new Config\ConfigItem\FileConfigItem($this->load_file, $value);
        }

        throw new LogicException("Invalid type provided for loading file: " . print_r($value, true));
    }
}
