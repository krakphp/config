<?php

namespace Krak\Config\LoadFile;

use Krak\Config;

class IniLoadFile implements Config\LoadFile
{
    public function loadFile($path) {
        return parse_ini_file($path, true);
    }
}
