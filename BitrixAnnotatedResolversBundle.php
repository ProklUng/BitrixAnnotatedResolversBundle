<?php

namespace Prokl\BitrixAnnotatedResolversBundle;

use LogicException;
use Prokl\AnnotatedParamResolverBundle\AnnotatedParamResolverBundle;
use Prokl\BitrixAnnotatedResolversBundle\DependencyInjection\BitrixAnnotatedResolversExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BitrixAnnotatedResolversBundle
 * @package Prokl\BitrixAnnotatedResolversBundle
 *
 * @since 20.04.2021
 */
final class BitrixAnnotatedResolversBundle extends Bundle
{
   /**
   * @inheritDoc
   */
    public function getContainerExtension()
    {
        if ($this->extension === null) {
            $this->extension = new BitrixAnnotatedResolversExtension();
        }

        return $this->extension;
    }

    /**
     * @inheritDoc
     * @throws LogicException
     */
    public function boot() : void
    {
        parent::boot();
        if (!class_exists(AnnotatedParamResolverBundle::class)) {
            throw new LogicException(
                'Этот бандл работает только вместе с AnnotatedParamResolverBundle.'
            );
        }
    }
}
