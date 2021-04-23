<?php

namespace Prokl\BitrixAnnotatedResolversBundle\Tests\Tools;

use Exception;
use Prokl\TestingTools\Base\BaseTestCase;
use Prokl\TestingTools\Tools\Container\BuildContainer;

/**
 * Class ContainerAwareBaseTestCase
 * @package Prokl\BitrixAnnotatedResolversBundle\Tests\Tools
 *
 * @since 23.04.2021
 */
class ContainerAwareBaseTestCase extends BaseTestCase
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->container = static::$testContainer = BuildContainer::getTestContainer(
            [
                'dev/test_container.yaml',
                'resolvers.yaml',
                'dev/local.yaml'
            ],
            '/Resources/config'
        );

        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        BuildContainer::rrmdir($_SERVER['DOCUMENT_ROOT'] . 'Tests/Cases/ArgumentResolvers/Tools/cache');
    }
}
