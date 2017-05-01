<?php

namespace Krak\Config\LoadFile;

use Krak\Config;

class PhpLoadFile implements Config\LoadFile
{
    public function loadFile($path) {
        return require $path;
    }
}
