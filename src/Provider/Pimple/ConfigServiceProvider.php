<?php

namespace Krak\Config\Provider\Pimple;

use Pimple;
use Krak\Config;

class ConfigServiceProvider implements Pimple\ServiceProviderInterface
{
    use Config\Provider\Provider;

    public function register(Pimple\Container $c) {
        $c[Config\ConfigStore::class] = $this->configStore();
        $c[Config\ConfigItemFactory::class] = $this->configItemFactory();
        $c[Config\LoadFile::class] = $this->loadFile();
        $c['krak.config.load_file.loaders'] = $this->loadFileLoaders();
        $c['config'] = $c->raw(Config\ConfigStore::class);
    }
}
