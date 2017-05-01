<?php

namespace Krak\Config;

interface ConfigItem {
    /** load the config item data */
    public function load();
}
