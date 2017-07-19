<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jeux
 *
 * @ORM\Table(name="jeux")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\jeuxRepository")
 */
class jeux
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
     * @ORM\Column(name="listeJeux", type="text")
     */
    private $listeJeux;


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
     * @return jeux
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
     * Set listeJeux
     *
     * @param string $listeJeux
     * @return jeux
     */
    public function setListeJeux($listeJeux)
    {
        $this->listeJeux = $listeJeux;

        return $this;
    }

    /**
     * Get listeJeux
     *
     * @return string 
     */
    public function getListeJeux()
    {
        return $this->listeJeux;
    }
}
