<?php

namespace Krak\Config\LoadFile;

use Krak\Config;
use Symfony\Component\Yaml\Yaml;

class YamlLoadFile implements Config\LoadFile
{
    public function loadFile($path) {
        return Yaml::parse(file_get_contents($path));
    }
}
