<?php

namespace Krak\Config;

interface ConfigStore {
    /** adding multiple values to the same keys will cause merging of the config items */
    public function add($key, $value);
    public function has($key);
    public function get($key);
}
