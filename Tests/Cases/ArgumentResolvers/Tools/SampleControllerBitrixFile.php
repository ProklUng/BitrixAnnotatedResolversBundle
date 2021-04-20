<?php

namespace Prokl\BitrixAnnotatedResolversBundle\Tests\Cases\ArgumentResolvers\Tools;

use Prokl\BitrixAnnotatedResolversBundle\Annotation\BitrixFile;
use Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver\Services\BitrixFileParam;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class SampleControllerBitrixFile
 * @package Prokl\BitrixAnnotatedResolversBundle\Tests\Cases\ArgumentResolvers\Tools
 *
 * @since 03.04.2021
 */
class SampleControllerBitrixFile extends AbstractController
{
    /**
     * Controller
     *
     * Параметры аннотации необязательны!
     *
     * @param BitrixFileParam $file
     * @return JsonResponse $content
     * @BitrixFile(
     *    var="file"
     * )
     */
    public function action(
        BitrixFileParam $file
    ): JsonResponse {

        return new JsonResponse([
            'url' => $file->url()
        ]);
    }
}
