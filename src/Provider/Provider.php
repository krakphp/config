<?php

namespace Krak\Config\Provider;

use Krak\Config;

trait Provider
{
    private function configStore() {
        return function($c) {
            return Config\store($c[Config\ConfigItemFactory::class]);
        };
    }

    private function configItemFactory() {
        return function($c) {
            return new Config\ConfigItemFactory\StdConfigItemFactory($c[Config\LoadFile::class]);
        };
    }

    private function loadFile() {
        return function($c) {
            return new Config\LoadFile\AggregateLoadFile($c['krak.config.load_file.loaders']);
        };
    }

    private function loadFileLoaders() {
        return function($c) {
            return Config\LoadFile\AggregateLoadFile::defaultLoaders();
        };
    }
}
