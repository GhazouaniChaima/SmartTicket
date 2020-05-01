<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * temoignage
 *
 * @ORM\Table(name="temoignage")
 * @ORM\Entity(repositoryClass="ClientBundle\Repository\temoignageRepository")
 */
class temoignage
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
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreationtemoignage", type="datetime", nullable=true)
     */
    private $dateCreationtemoignage;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",
    inversedBy="temoignages")
     */
    private $usertemg;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return temoignage
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set usertemg
     *
     * @param \UserBundle\Entity\User $usertemg
     *
     * @return temoignage
     */
    public function setUsertemg(\UserBundle\Entity\User $usertemg = null)
    {
        $this->usertemg = $usertemg;

        return $this;
    }

    /**
     * Get usertemg
     *
     * @return \UserBundle\Entity\User
     */
    public function getUsertemg()
    {
        return $this->usertemg;
    }

    /**
     * Set dateCreationtemoignage
     *
     * @param \DateTime $dateCreationtemoignage
     *
     * @return temoignage
     */
    public function setDateCreationtemoignage($dateCreationtemoignage)
    {
        $this->dateCreationtemoignage = $dateCreationtemoignage;

        return $this;
    }

    /**
     * Get dateCreationtemoignage
     *
     * @return \DateTime
     */
    public function getDateCreationtemoignage()
    {
        return $this->dateCreationtemoignage;
    }
}
