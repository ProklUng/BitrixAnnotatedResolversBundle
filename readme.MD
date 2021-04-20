# Битриксовые конвертеры для бандла AnnotatedParamResolverBundle

Конверторы для бандла [https://github.com/ProklUng/AnnotatedParamResolverBundle](AnnotatedParamResolverBundle):

1) **BitrixFile**

В action контроллера будет лежать массив, идентичный тому, что отдает CFile::GetFileArray.

~~~php
use Prokl\BitrixAnnotatedResolversBundle\Annotation\BitrixFile;
use Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver\Services\BitrixFileParam;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SampleControllerBitrixFile extends AbstractController
{
    /**
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
~~~

2) **BitrixFileUrl**
 
~~~php
use Prokl\BitrixAnnotatedResolversBundle\Annotation\BitrixFileUrl;
use Prokl\BitrixAnnotatedResolversBundle\ArgumentsResolver\Services\BitrixFileParam;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SampleControllerBitrixFileUrl extends AbstractController
{
    /**
     * Параметры аннотации необязательны!
     *
     * @param BitrixFileParam $file
     * @return JsonResponse $content
     * @BitrixFileUrl(
     *    var="file"
     * )
     */
    public function action(
        BitrixFileParam $file
    ): JsonResponse {

        return new JsonResponse([
            'url' => $file
        ]);
    }
}
~~~

