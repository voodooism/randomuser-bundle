<?php
declare(strict_types=1);

namespace Voodooism\RandomUserBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class RandomUserExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('random_user_api.host', $config['host']);
        $container->setParameter('random_user_api.version', $config['version']);
        $container->setParameter('random_user_api.connection_timeout', $config['connection_timeout']);
        $container->setParameter('random_user_api.request_timeout', $config['request_timeout']);
    }

    public function getAlias(): string
    {
        return 'random_user_api';
    }
}