<?php

namespace Krak\Config\ConfigItem;

use Krak\Config;

class CallableConfigItem implements Config\ConfigItem
{
    private $load;

    public function __construct(callable $load) {
        $this->load = $load;
    }

    public function load() {
        return call_user_func($this->load);
    }
}
