<?php

namespace Estimations\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;

    /**
     * @ORM\Column()
     * @Assert\File(maxSize="6000000")
     */
    protected $doc;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getDoc()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getDoc()->move(
            $this->getUploadRootDir(),
            $this->getDoc()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getDoc()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->doc = null;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Document
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }


    /**
     * Set doc
     *
     * @param UploadedFile $doc
     * @return Document
     */
    public function setDoc(UploadedFile $doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc
     *
     * @return UploadedFile
     */
    public function getDoc()
    {
        return $this->doc;
    }
}
