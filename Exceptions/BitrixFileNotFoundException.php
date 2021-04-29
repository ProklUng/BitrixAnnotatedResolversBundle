<?php

namespace Prokl\BitrixAnnotatedResolversBundle\Exceptions;

use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;
use Prokl\BaseException\BaseException;

/**
 * Class BitrixFileNotFoundException
 * @package Prokl\BitrixAnnotatedResolversBundle\Exceptions
 *
 * @sinсe 02.04.2021
 */
class BitrixFileNotFoundException extends BaseException implements RequestExceptionInterface
{

}
