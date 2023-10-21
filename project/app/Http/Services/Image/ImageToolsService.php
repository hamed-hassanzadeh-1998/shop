<?php

namespace App\Http\Services\Image;

class ImageToolsService
{

    protected $image;
    protected $exclusiveDirectory;
    protected $imageDirectory;
    protected $imageName;
    protected $imageFormat;
    protected $finalImageDirectory;
    protected $finalImageName;

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $exclusiveDirectory
     */
    public function setExclusiveDirectory($exclusiveDirectory): void
    {
        $this->exclusiveDirectory =trim($exclusiveDirectory,'/\\') ;
    }

    /**
     * @return mixed
     */
    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }


    /**
     * @param mixed $imageName
     */
    public function setImageName($imageName): void
    {
        $this->imageName = $imageName;
    }

    /**
     * @return mixed
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    /**
     * @param mixed $finalImageName
     */
    public function setFinalImageName($finalImageName): void
    {
        $this->finalImageName = $finalImageName;
    }

    /**
     * @return mixed
     */
    public function getFinalImageName()
    {
        return $this->finalImageName;
    }

    /**
     * @param mixed $imageFormat
     */
    public function setImageFormat($imageFormat): void
    {
        $this->imageFormat = $imageFormat;
    }

    /**
     * @return mixed
     */
    public function getImageFormat()
    {
        return $this->imageFormat;
    }

    /**
     * @return mixed
     */
    public function getFinalImageDirectory()
    {
        return $this->finalImageDirectory;
    }

    /**
     * @param mixed $finalImageDirectory
     */
    public function setFinalImageDirectory($finalImageDirectory): void
    {
        $this->finalImageDirectory = $finalImageDirectory;
    }

    /**
     * @param mixed $imageDirectory
     */
    public function setImageDirectory($imageDirectory): void
    {
        $this->imageDirectory =trim($imageDirectory,'/\\') ;
    }


    /**
     * @return bool|null
     */
    public function setCurrentImageName(): ?bool
    {
        return empty($this->image) ?
            false
            : $this->setImageName(imageName: pathinfo($this->image->getClientOriginalName(),PATHINFO_FILENAME));
    }
}
