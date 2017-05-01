<?php

namespace Krak\Config\ConfigItem;

use Krak\Config;

class FileConfigItem implements Config\ConfigItem
{
    private $load_file;
    private $path;

    public function __construct(Config\LoadFile $load_file, $path) {
        $this->load_file = $load_file;
        $this->path = $path;
    }

    public function load() {
        return $this->load_file->loadFile($this->path);
    }
}
