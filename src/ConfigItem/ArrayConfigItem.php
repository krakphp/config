<?php

namespace Krak\Config\ConfigItem;

use Krak\Config;

class ArrayConfigItem implements Config\ConfigItem
{
    private $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function load() {
        return $this->data;
    }
}
