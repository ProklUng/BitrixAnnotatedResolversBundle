<?php

namespace Prokl\BitrixAnnotatedResolversBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class BitrixAnnotatedResolversExtension
 * @package Local\Bundles\BitrixAnnotatedResolvers\DependencyInjection
 *
 * @since 20.04.2021
 */
class BitrixAnnotatedResolversExtension extends Extension
{
    private const DIR_CONFIG = '/../Resources/config';

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container) : void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . self::DIR_CONFIG)
        );

        $loader->load('resolvers.yaml');
    }

    /**
     * @inheritDoc
     */
    public function getAlias() : string
    {
        return 'bitrix_annotated_resolvers';
    }
}
