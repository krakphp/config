<?php

namespace Krak\Config\LoadFile;

use Krak\Config;

class JsonLoadFile implements Config\LoadFile
{
    public function loadFile($path) {
        return json_decode(file_get_contents($path), true);
    }
}
