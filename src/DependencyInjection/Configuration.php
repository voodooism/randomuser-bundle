<?php
declare(strict_types=1);

namespace Voodooism\RandomUserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('random_user_api');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('host')->defaultValue('https://randomuser.me')->end()
                ->scalarNode('version')->defaultValue('1.3')->end()
                ->integerNode('connection_timeout')->defaultValue(30)->end()
                ->integerNode('request_timeout')->defaultValue(30)->end()
            ->end();

        return $treeBuilder;
    }
}