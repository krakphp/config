<?php

namespace Krak\Config\Provider\Cargo;

use Krak\Cargo;
use Krak\Config;

class ConfigServiceProvider implements Cargo\ServiceProvider
{
    use Config\Provider\Provider;

    public function register(Cargo\Container $c) {
        $c[Config\ConfigStore::class] = $this->configStore();
        $c[Config\ConfigItemFactory::class] = $this->configItemFactory();
        $c[Config\LoadFile::class] = $this->loadFile();
        $c['krak.config.load_file.loaders'] = $this->loadFileLoaders();
        $c->alias(Config\ConfigStore::class, 'config');
    }
}
