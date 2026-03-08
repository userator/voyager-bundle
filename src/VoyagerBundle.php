<?php

declare(strict_types=1);

namespace Userator\VoyagerBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class VoyagerBundle extends AbstractBundle
{
    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builder->prependExtensionConfig(
            'framework',
            [
                'asset_mapper' => [
                    'paths' => [
                        __DIR__ . '/../assets/dist' => '@userator/voyager-bundle',
                    ],
                ],
            ],
        );
    }

}
