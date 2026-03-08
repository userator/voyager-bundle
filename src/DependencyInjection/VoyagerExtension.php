<?php

declare(strict_types=1);

namespace Userator\VoyagerBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class VoyagerExtension extends Extension
{
    /**
     * @param array<array-key, mixed> $configs
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config'),
        );
        $loader->load('services.yaml');
        $loader->load('routes.yaml');

        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('userator_voyager.endpoint', $config['endpoint'] ?? '/graphql');
    }
}
