<?php

namespace Prokl\BitrixAnnotatedResolversBundle\Tests\Cases\ArgumentResolvers\Traits;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

/**
 * Trait ArgumentResolverTrait
 * @package Prokl\BitrixAnnotatedResolversBundle\Tests\Cases\ArgumentResolvers\Traits
 *
 * @since 03.04.2021
 */
trait ArgumentResolverTrait
{

    /**
     * @param string $paramName Название параметра.
     * @param string $type
     *
     * @return ArgumentMetadata
     */
    private function getMetaArgument(string $paramName, string $type = 'string'): ArgumentMetadata
    {
        return new ArgumentMetadata(
            $paramName,
            $type,
            false,
            false,
            ''
        );
    }

    /**
     * Запрос $_GET.
     *
     * @param string $controller  Класс контроллера.
     * @param array  $getParams   $_GET параметры запроса.
     * @param string $typeRequest Тип запроса.
     * @param string $method      Метод.
     *
     * @return Request
     */
    private function createRequest(
        string $controller,
        array $getParams,
        string $typeRequest = 'GET',
        string $method = 'action'
    ): Request
    {
        $request = new Request(
            $getParams,
            [],
            [
                '_controller' => $controller.'::' . $method,
            ]
        );
        $request->setMethod($typeRequest);

        return $request;
    }

    /**
     * Запрос $_POST.
     *
     * @param string $controller Класс контроллера.
     * @param array  $getParams  $_POST параметры запроса.
     * @param string $method     Метод.
     * @return Request
     */
    private function createRequestPost(string $controller, array $getParams, string $method = 'action'): Request
    {
        $request = new Request(
            [],
            $getParams,
            [
                '_controller' => $controller.'::' . $method,
            ]
        );
        $request->setMethod('POST');

        return $request;
    }
}
