<?php

namespace App\Library\Services;

use SplFileInfo;

class ImageManager
{

    private $name = '';
    private $alt = '';
    private $path = '';
    protected $mimeType = array(
        'JPEG' => 'image/jpeg',
        'JPG' => 'image/jpeg',
        'PNG' => 'image/png',
    );

    /**
     * Establece el nombre del archivo
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Obtiene el nombre del archivo
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Establece el texto alternativo del archivo
     *
     * @param string $alt
     * @return self
     */
    public function setAlt(string $alt)
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * Obtiene el texto alternativo del archivo
     *
     * @return string
     */
    public function getALt()
    {
        return $this->alt;
    }

    /**
     * Establece el tipo del archivo
     *
     * @param string $mimeType
     * @return self
     */
    public function setMimeType(string $mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * Establece la ruta de destino
     *
     * @param string $path
     * @return self
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Obtiene la ruta de destino
     *
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Obtiene el mime del archivo
     *
     * @param SplFileInfo|string $file
     * @return string
     */
    private function getMimeType($file)
    {
        $file = new SplFileInfo($file);
        $format = $file->getExtension();
        return $this->mimeType[strtoupper($format)] ?? 'text/plain';
    }
}
