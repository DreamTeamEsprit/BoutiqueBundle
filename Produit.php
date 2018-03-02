<?php

namespace Sante\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="Sante\UserBundle\Repository\ProduitRepository")
 */
class Produit
{
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var float
     *
     * @ORM\Column(name="remise", type="float")
     */
    private $remise;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite_dispo", type="integer")
     */
    private $quantiteDispo;


    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }



    /**
     * @var float
     *
     * @ORM\Column(name="prix_livraison", type="float")
     */
    private $prixLivraison;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="categorie",referencedColumnName="id")
     */
    private $categorie;

    /**
     * @return mixed
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * @param mixed $panier
     */
    public function setPanier($panier)
    {
        $this->panier = $panier;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;


    /**
     * @Assert\File(maxSize="500K")
     */
    private $file;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fabrication", type="date")
     */
    private $dateFabrication;



    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Produit")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Panier", mappedBy="Produit")
     */
    private $panier;




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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Produit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set remise
     *
     * @param float $remise
     *
     * @return Produit
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return float
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set quantiteDispo
     *
     * @param integer $quantiteDispo
     *
     * @return Produit
     */
    public function setQuantiteDispo($quantiteDispo)
    {
        $this->quantiteDispo = $quantiteDispo;

        return $this;
    }

    /**
     * Get quantiteDispo
     *
     * @return int
     */
    public function getQuantiteDispo()
    {
        return $this->quantiteDispo;
    }

    /**
     * Set prixLivraison
     *
     * @param float $prixLivraison
     *
     * @return Produit
     */
    public function setPrixLivraison($prixLivraison)
    {
        $this->prixLivraison = $prixLivraison;

        return $this;
    }

    /**
     * Get prixLivraison
     *
     * @return float
     */
    public function getPrixLivraison()
    {
        return $this->prixLivraison;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Produit
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }


    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }


    public function getWebPath()
    {
        return null===$this->photo ? null : $this->getUploadDir.'/'.$this->photo;
    }

    protected function getUploadRootDir()
    {

        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function  getUploadDir()
    {
        return 'images';
    }
    public function uploadProfilePicture()
    {
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
        $this->photo=$this->file->getClientOriginalName();
        $this->file=null ;
    }

    /**
     * Set dateFabrication
     *
     * @param \DateTime $dateFabrication
     *
     * @return Produit
     */
    public function setDateFabrication($dateFabrication)
    {
        $this->dateFabrication = $dateFabrication;

        return $this;
    }

    /**
     * Get dateFabrication
     *
     * @return \DateTime
     */
    public function getDateFabrication()
    {
        return $this->dateFabrication;
    }



    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Produit
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }
}
