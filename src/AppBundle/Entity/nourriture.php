<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * nourriture
 *
 * @ORM\Table(name="nourriture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\nourritureRepository")
 */
class nourriture
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
     * @var string
     *
     * @ORM\Column(name="entree", type="text")
     */
    private $entree;

    /**
     * @var string
     *
     * @ORM\Column(name="plat", type="text")
     */
    private $plat;

    /**
     * @var string
     *
     * @ORM\Column(name="dessert", type="text")
     */
    private $dessert;

    /**
     * @var string
     *
     * @ORM\Column(name="boisson", type="text")
     */
    private $boisson;


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
     * @return nourriture
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
     * Set entree
     *
     * @param string $entre
     * @return nourriture
     */
    public function setEntree($entree)
    {
        $this->entree = $entree;

        return $this;
    }

    /**
     * Get entree
     *
     * @return string 
     */
    public function getEntree()
    {
        return $this->entree;
    }

    /**
     * Set plat
     *
     * @param string $plat
     * @return nourriture
     */
    public function setPlat($plat)
    {
        $this->plat = $plat;

        return $this;
    }

    /**
     * Get plat
     *
     * @return string 
     */
    public function getPlat()
    {
        return $this->plat;
    }

    /**
     * Set dessert
     *
     * @param string $dessert
     * @return nourriture
     */
    public function setDessert($dessert)
    {
        $this->dessert = $dessert;

        return $this;
    }

    /**
     * Get dessert
     *
     * @return string 
     */
    public function getDessert()
    {
        return $this->dessert;
    }

    /**
     * Set boisson
     *
     * @param string $boisson
     * @return nourriture
     */
    public function setBoisson($boisson)
    {
        $this->boisson = $boisson;

        return $this;
    }

    /**
     * Get boisson
     *
     * @return string 
     */
    public function getBoisson()
    {
        return $this->boisson;
    }
}
