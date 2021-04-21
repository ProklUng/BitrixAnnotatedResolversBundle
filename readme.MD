# Битриксовые конвертеры для бандла AnnotatedParamResolverBundle

Конверторы для бандла [https://github.com/ProklUng/AnnotatedParamResolverBundle](AnnotatedParamResolverBundle), без 
него он не имеет смысла, да и не запустится:

1) **BitrixFile**

В action контроллера, при запросе вида /route?file=7; где 7 - битриксовый ID файла, будет лежать массив,
идентичный тому, что отдает CFile::GetFileArray.

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
 
В action контроллера будет лежать URL файла при запросе вида /route?file=7. Где 7 - битриксовый ID файла.

~~~php
use Prokl\BitrixAnnotatedResolversBundle\Annotation\BitrixFileUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SampleControllerBitrixFileUrl extends AbstractController
{
    /**
     * Параметры аннотации необязательны!
     *
     * @param string $file
     * @return JsonResponse $content
     * @BitrixFileUrl(
     *    var="file"
     * )
     */
    public function action(
        string $file
    ): JsonResponse {

        return new JsonResponse([
            'url' => $file
        ]);
    }
}
~~~

