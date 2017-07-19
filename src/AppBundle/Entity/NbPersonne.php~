<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NbPersonne
 *
 * @ORM\Table(name="nb_personne")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NbPersonneRepository")
 */
class NbPersonne
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
     * @ORM\Column(name="nbpersonne", type="integer")
     */
    private $nbpersonne;


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
     * @return NbPersonne
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
     * Set nbpersonne
     *
     * @param integer $nbpersonne
     * @return NbPersonne
     */
    public function setNbpersonne($nbpersonne)
    {
        $this->nbpersonne = $nbpersonne;

        return $this;
    }

    /**
     * Get nbpersonne
     *
     * @return integer 
     */
    public function getNbpersonne()
    {
        return $this->nbpersonne;
    }
}
