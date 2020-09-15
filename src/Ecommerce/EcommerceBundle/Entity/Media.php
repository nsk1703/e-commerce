<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asserts;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125)
     * @Asserts\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=true)
     */
    private $updateAt;

    private $file;
    /**
     * @var string
     */
    private $oldFIle;
    private $tempFile;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path.
     *
     * @param string $path
     *
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    public function  getUploadRootDir()
    {
//        Route pour uploader les images
        return __DIR__.'/../../../../web/uploads';
    }

    /*
     * Route absolue du fichier pour l'image
     */
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getAssetPath()
    {
        return '/uploads/'.$this->path;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
//        le fichier temporaire
        $this->tempFile = $this->getAbsolutePath();
//        Sert lors de la modification d'une image, pour contenir l'ancien chenin du fichier
        $this->oldFIle = $this->getPath();
        $this->updateAt = new \DateTime();

        /*
         * Si le fichier existe, alors lon renomme le path qui est le nom de l'image en une chaine de caractere unique aec son extension
         */
        if (null !== $this->file) $this->path = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();

    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        /*
         * SI le fichier n'est pas null , on le deplace vers dans le chemin relatif /web/uploads/ le fichier correspondant
         * et on supprime le chemin du fichier
         *
         * Si on modifie une ancienne image, alors on supprime le fichier temporaire
         */
        if (null !== $this->file)
        {
            $this->file->move($this->getUploadRootDir(), $this->path);
            unset($this->file);

            if ($this->oldFIle !== null) unlink($this->tempFile);
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoevUpload()
    {
//        Avant la suppression du ichier temporaire, on le definit dans le chemin absolu
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
//        Si le fichier temporaire du fichier reel existe apres le remove, on le supprime
        if (file_exists($this->tempFile)) unlink($this->tempFile);
    }

    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }

}
