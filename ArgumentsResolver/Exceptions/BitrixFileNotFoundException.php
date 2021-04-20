<?php

namespace Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver\Exceptions;

use Prokl\BitrixAnnotatedResolversBundle\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

/**
 * Class BitrixFileNotFoundException
 * @package Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver\Exceptions
 *
 * @sinсe 02.04.2021
 */
class BitrixFileNotFoundException extends BaseException implements RequestExceptionInterface
{

}
