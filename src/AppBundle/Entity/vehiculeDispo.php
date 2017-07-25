<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * vehiculeDispo
 *
 * @ORM\Table(name="vehicule_dispo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\vehiculeDispoRepository")
 */
class vehiculeDispo
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="nbplacedispo", type="integer")
     */
    private $nbplacedispo;

    /**
     * @var string
     *
     * @ORM\Column(name="pointRdv", type="text")
     */
    private $pointRdv;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="passager", mappedBy="vehicule")
     */
    private $passagers;

    public function __construct() {
        $this->passagers = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return vehiculeDispo
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nbplacedispo
     *
     * @param integer $nbplacedispo
     * @return vehiculeDispo
     */
    public function setNbplacedispo($nbplacedispo)
    {
        $this->nbplacedispo = $nbplacedispo;

        return $this;
    }

    /**
     * Get nbplacedispo
     *
     * @return integer 
     */
    public function getNbplacedispo()
    {
        return $this->nbplacedispo;
    }

    /**
     * Set pointRdv
     *
     * @param string $pointRdv
     * @return vehiculeDispo
     */
    public function setPointRdv($pointRdv)
    {
        $this->pointRdv = $pointRdv;

        return $this;
    }

    /**
     * Get pointRdv
     *
     * @return string 
     */
    public function getPointRdv()
    {
        return $this->pointRdv;
    }

    /**
     * Add passagers
     *
     * @param \AppBundle\Entity\passager $passagers
     * @return vehiculeDispo
     */
    public function addPassager(\AppBundle\Entity\passager $passagers)
    {
        $this->passagers[] = $passagers;

        return $this;
    }

    /**
     * Remove passagers
     *
     * @param \AppBundle\Entity\passager $passagers
     */
    public function removePassager(\AppBundle\Entity\passager $passagers)
    {
        $this->passagers->removeElement($passagers);
    }

    /**
     * Get passagers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPassagers()
    {
        return $this->passagers;
    }
}
