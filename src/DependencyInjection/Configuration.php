<?php

declare(strict_types=1);

namespace Userator\VoyagerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('userator_voyager');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->booleanNode('enabled')->end()
            ->scalarNode('title')->end()
            ->scalarNode('asset_package')->end()
            ->end();

        return $treeBuilder;
    }
}
