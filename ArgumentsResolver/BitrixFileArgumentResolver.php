<?php

namespace Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver;

use Doctrine\Common\Annotations\Reader;
use Prokl\BitrixAnnotatedResolversBundle\Annotation\BitrixFile;
use Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver\Traits\ArgumentResolverTrait;
use Prokl\BitrixAnnotatedResolversBundle\Exceptions\BitrixFileNotFoundException;
use Prokl\BitrixAnnotatedResolversBundle\Services\BitrixFileParam;
use ReflectionException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

/**
 * Class BitrixFileArgumentResolver
 * @package Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver
 *
 * @description
 *
 * Аннотация метода контроллера - @BitrixFile. Параметры:
 * var - название переменной в action контроллера.
 *
 * @since 01.04.2021
 */
final class BitrixFileArgumentResolver implements ArgumentValueResolverInterface
{
    use ArgumentResolverTrait;

    private const DEFAULT_ANNOTATION = BitrixFile::class;

    /**
     * @var Reader $reader Читатель аннотаций.
     */
    private $reader;

    /**
     * @var ControllerResolverInterface $controllerResolver Controller Resolver.
     */
    private $controllerResolver;

    /**
     * BitrixFileArgumentResolver constructor.
     *
     * @param Reader                      $reader             Читатель аннотаций.
     * @param ControllerResolverInterface $controllerResolver Controller Resolver.
     */
    public function __construct(
        Reader $reader,
        ControllerResolverInterface $controllerResolver
    ) {
        $this->reader = $reader;
        $this->controllerResolver = $controllerResolver;
    }

    /**
     * @inheritDoc
     * @throws ReflectionException Ошибки рефлексии.
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        $annotation = $this->getAnnotation($request, self::DEFAULT_ANNOTATION);

        if (!$annotation instanceof BitrixFile) {
            return false;
        }

        $var = $annotation->getVar();
        if (!$request->request->has($var) && !$request->query->has($var)) {
            return false;
        }

        return $argument->getName() === $annotation->getVar();
    }

    /**
     * @inheritDoc
     * @throws ReflectionException Ошибки рефлексии.
     * @throws BitrixFileNotFoundException
     */
    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        $annotation = $this->getAnnotation($request, self::DEFAULT_ANNOTATION);
        $variable = $annotation->getVar();

        $values = $this->getRequestData($request);

        $object = new BitrixFileParam();
        $object->fromId($values[$variable]);

        $request->attributes->set($variable, $object);

        yield $object;
     }

    /**
     * Данные запроса в зависимости от типа запроса.
     *
     * @param Request $request Request.
     *
     * @return array
     */
    private function getRequestData(Request $request) : array
    {
        // Тип запроса.
        $typeRequest = $request->getMethod();

        return $typeRequest !== 'GET' ?
            $request->request->all()
            :
            $request->query->all();
    }
}
