<?php

namespace Krak\Config\LoadFile;

use Krak\Config;
use LogicException;

class AggregateLoadFile implements Config\LoadFile
{
    private $loaders;

    public function __construct(array $loaders = []) {
        $this->loaders = $loaders ?: self::defaultLoaders();
    }

    public function loadFile($path) {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $this->loaders)) {
            throw new LogicException('No loaders are able to handle the config path extension: ' . $ext);
        }

        $loader = $this->loaders[$ext];
        if (!$loader instanceof Config\LoadFile) {
            throw new LogicException("Loader for extension '$ext' is not an instance of Krak\Config\LoadFile");
        }

        return $loader->loadFile($path);
    }

    public static function defaultLoaders() {
        return [
            'php' => new PhpLoadFile(),
            'json' => new JsonLoadFile(),
            'ini' => new IniLoadFile(),
            'yml' => new YamlLoadFile(),
        ];
    }
}
