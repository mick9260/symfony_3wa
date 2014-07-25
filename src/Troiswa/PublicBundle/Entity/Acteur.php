<?php

namespace Troiswa\PublicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Acteur
 *
 * @ORM\Table(name="acteur")
 * @ORM\Entity(repositoryClass="Troiswa\PublicBundle\Entity\ActeurRepository")
 */
class Acteur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="text")
     * @Assert\NotBlank(message="Le prénom ne peut pas être vide!")
     * @Assert\Length(
     *      min = "2",
     *      minMessage = "Votre nom doit faire au moins 2 caractères",
     * )
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="text")*
     * @Assert\NotBlank(message="Le nom ne peut pas être vide!")
     * @Assert\Length(
     *      min = "5",
     *      minMessage = "Votre nom doit faire au moins 5 caractères",
     * )

     */
    private $nom;

    /**
     * @var \Date
     *
     * @ORM\Column(name="datenaissance", type="date")
     * @Assert\NotBlank(message="La date ne peut pas être vide!")
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="text")
     * @Assert\Date(message="Le sexe doit être indiqué!")
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="text")
     * @Assert\NotBlank(message="La nationalité doit être indiqué!")
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="biographie", type="text")
     * @Assert\NotBlank(message="La biographie doit être complété!")
     */
    private $biographie;






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
     * Set prenom
     *
     * @param string $prenom
     * @return Acteurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Acteurs
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
     * Set sexe
     *
     * @param string $sexe
     * @return Acteurs
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     * @return Acteurs
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string 
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set biographie
     *
     * @param string $biographie
     * @return Acteurs
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * Get biographie
     *
     * @return string 
     */
    public function getBiographie()
    {
        return $this->biographie;
    }



    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     * @return Acteur
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }
    public function getGender()
    {
        if($this ->sexe === 'F')
        {
        return "Femme";
        }else{
        return "Homme";
        }
    }
    public function getShortBiographie()
    {
      return substr($this->biographie,0,50);
    }
    public function getAge()
    {
        $datediff = $this->datenaissance->diff(new\datetime());
        return $datediff->y;
    }
}
