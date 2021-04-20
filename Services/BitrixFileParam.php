<?php

namespace Prokl\BitrixAnnotatedResolversBundle\Services;

use CFile;
use Prokl\BitrixAnnotatedResolversBundle\Exceptions\BitrixFileNotFoundException;
use Prokl\AnnotatedParamResolverBundle\ArgumentResolver\Contracts\UnserializableRequestInterface;
use RuntimeException;

/**
 * Class BitrixFileParam
 * @package Local\Bundles\CustomArgumentResolverBundle\ArgumentsResolver\Services
 *
 * @since 01.04.2021
 */
class BitrixFileParam implements UnserializableRequestInterface
{
    /**
     * @var array $file
     */
    private $file;

    /**
     * @return array
     */
    public function getFile(): array
    {
        return $this->file;
    }

    /**
     * Информация по ID файла.
     *
     * @param integer $id ID файла.
     *
     * @return void
     * @throws BitrixFileNotFoundException Invalid Bitrix file ID.
     */
    public function fromId(int $id) : void
    {
        if (!$id) {
            throw new RuntimeException(
                'Invalid Bitrix file ID.'
            );
        }

        $this->file = CFile::GetFileArray($id);
        if ($this->file === false) {
            throw new BitrixFileNotFoundException(
                'File with ID ' . $id . ' not found.'
            );
        }
    }

    /**
     * URL файла.
     *
     * @return string
     * @throws BitrixFileNotFoundException
     */
    public function url() : string
    {
        if (count($this->file) === 0) {
            throw new BitrixFileNotFoundException(
                'Not have file info.'
            );
        }

        return $this->file['SRC'];
    }
}
