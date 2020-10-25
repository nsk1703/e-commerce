<?php

namespace Users\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VillesFranceFree
 *
 * @ORM\Table(name="villes_france_free", uniqueConstraints={@ORM\UniqueConstraint(name="ville_slug", columns={"ville_slug"}), @ORM\UniqueConstraint(name="ville_code_commune_2", columns={"ville_code_commune"})}, indexes={@ORM\Index(name="ville_population_2010", columns={"ville_population_2010"}), @ORM\Index(name="ville_nom_soundex", columns={"ville_nom_soundex"}), @ORM\Index(name="ville_longitude_latitude_deg", columns={"ville_longitude_deg", "ville_latitude_deg"}), @ORM\Index(name="ville_code_commune", columns={"ville_code_commune"}), @ORM\Index(name="ville_nom", columns={"ville_nom"}), @ORM\Index(name="ville_nom_simple", columns={"ville_nom_simple"}), @ORM\Index(name="ville_nom_metaphone", columns={"ville_nom_metaphone"}), @ORM\Index(name="ville_code_postal", columns={"ville_code_postal"}), @ORM\Index(name="ville_nom_reel", columns={"ville_nom_reel"}), @ORM\Index(name="ville_departement", columns={"ville_departement"})})
 * @ORM\Entity
 */
class VillesFranceFree
{
    /**
     * @var int
     *
     * @ORM\Column(name="ville_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $villeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_departement", type="string", length=3, nullable=true)
     */
    private $villeDepartement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_slug", type="string", length=255, nullable=true)
     */
    private $villeSlug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom", type="string", length=45, nullable=true)
     */
    private $villeNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom_simple", type="string", length=45, nullable=true)
     */
    private $villeNomSimple;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom_reel", type="string", length=45, nullable=true)
     */
    private $villeNomReel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom_soundex", type="string", length=20, nullable=true)
     */
    private $villeNomSoundex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom_metaphone", type="string", length=22, nullable=true)
     */
    private $villeNomMetaphone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_code_postal", type="string", length=255, nullable=true)
     */
    private $villeCodePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_commune", type="string", length=3, nullable=true)
     */
    private $villeCommune;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_code_commune", type="string", length=5, nullable=false)
     */
    private $villeCodeCommune;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_arrondissement", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $villeArrondissement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_canton", type="string", length=4, nullable=true)
     */
    private $villeCanton;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_amdi", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $villeAmdi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_population_2010", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $villePopulation2010;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_population_1999", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $villePopulation1999;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_population_2012", type="integer", nullable=true, options={"unsigned"=true,"comment"="approximatif"})
     */
    private $villePopulation2012;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_densite_2010", type="integer", nullable=true)
     */
    private $villeDensite2010;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ville_surface", type="float", precision=10, scale=0, nullable=true)
     */
    private $villeSurface;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ville_longitude_deg", type="float", precision=10, scale=0, nullable=true)
     */
    private $villeLongitudeDeg;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ville_latitude_deg", type="float", precision=10, scale=0, nullable=true)
     */
    private $villeLatitudeDeg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_longitude_grd", type="string", length=9, nullable=true)
     */
    private $villeLongitudeGrd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_latitude_grd", type="string", length=8, nullable=true)
     */
    private $villeLatitudeGrd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_longitude_dms", type="string", length=9, nullable=true)
     */
    private $villeLongitudeDms;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_latitude_dms", type="string", length=8, nullable=true)
     */
    private $villeLatitudeDms;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_zmin", type="integer", nullable=true)
     */
    private $villeZmin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ville_zmax", type="integer", nullable=true)
     */
    private $villeZmax;



    /**
     * Get villeId.
     *
     * @return int
     */
    public function getVilleId()
    {
        return $this->villeId;
    }

    /**
     * Set villeDepartement.
     *
     * @param string|null $villeDepartement
     *
     * @return VillesFranceFree
     */
    public function setVilleDepartement($villeDepartement = null)
    {
        $this->villeDepartement = $villeDepartement;

        return $this;
    }

    /**
     * Get villeDepartement.
     *
     * @return string|null
     */
    public function getVilleDepartement()
    {
        return $this->villeDepartement;
    }

    /**
     * Set villeSlug.
     *
     * @param string|null $villeSlug
     *
     * @return VillesFranceFree
     */
    public function setVilleSlug($villeSlug = null)
    {
        $this->villeSlug = $villeSlug;

        return $this;
    }

    /**
     * Get villeSlug.
     *
     * @return string|null
     */
    public function getVilleSlug()
    {
        return $this->villeSlug;
    }

    /**
     * Set villeNom.
     *
     * @param string|null $villeNom
     *
     * @return VillesFranceFree
     */
    public function setVilleNom($villeNom = null)
    {
        $this->villeNom = $villeNom;

        return $this;
    }

    /**
     * Get villeNom.
     *
     * @return string|null
     */
    public function getVilleNom()
    {
        return $this->villeNom;
    }

    /**
     * Set villeNomSimple.
     *
     * @param string|null $villeNomSimple
     *
     * @return VillesFranceFree
     */
    public function setVilleNomSimple($villeNomSimple = null)
    {
        $this->villeNomSimple = $villeNomSimple;

        return $this;
    }

    /**
     * Get villeNomSimple.
     *
     * @return string|null
     */
    public function getVilleNomSimple()
    {
        return $this->villeNomSimple;
    }

    /**
     * Set villeNomReel.
     *
     * @param string|null $villeNomReel
     *
     * @return VillesFranceFree
     */
    public function setVilleNomReel($villeNomReel = null)
    {
        $this->villeNomReel = $villeNomReel;

        return $this;
    }

    /**
     * Get villeNomReel.
     *
     * @return string|null
     */
    public function getVilleNomReel()
    {
        return $this->villeNomReel;
    }

    /**
     * Set villeNomSoundex.
     *
     * @param string|null $villeNomSoundex
     *
     * @return VillesFranceFree
     */
    public function setVilleNomSoundex($villeNomSoundex = null)
    {
        $this->villeNomSoundex = $villeNomSoundex;

        return $this;
    }

    /**
     * Get villeNomSoundex.
     *
     * @return string|null
     */
    public function getVilleNomSoundex()
    {
        return $this->villeNomSoundex;
    }

    /**
     * Set villeNomMetaphone.
     *
     * @param string|null $villeNomMetaphone
     *
     * @return VillesFranceFree
     */
    public function setVilleNomMetaphone($villeNomMetaphone = null)
    {
        $this->villeNomMetaphone = $villeNomMetaphone;

        return $this;
    }

    /**
     * Get villeNomMetaphone.
     *
     * @return string|null
     */
    public function getVilleNomMetaphone()
    {
        return $this->villeNomMetaphone;
    }

    /**
     * Set villeCodePostal.
     *
     * @param string|null $villeCodePostal
     *
     * @return VillesFranceFree
     */
    public function setVilleCodePostal($villeCodePostal = null)
    {
        $this->villeCodePostal = $villeCodePostal;

        return $this;
    }

    /**
     * Get villeCodePostal.
     *
     * @return string|null
     */
    public function getVilleCodePostal()
    {
        return $this->villeCodePostal;
    }

    /**
     * Set villeCommune.
     *
     * @param string|null $villeCommune
     *
     * @return VillesFranceFree
     */
    public function setVilleCommune($villeCommune = null)
    {
        $this->villeCommune = $villeCommune;

        return $this;
    }

    /**
     * Get villeCommune.
     *
     * @return string|null
     */
    public function getVilleCommune()
    {
        return $this->villeCommune;
    }

    /**
     * Set villeCodeCommune.
     *
     * @param string $villeCodeCommune
     *
     * @return VillesFranceFree
     */
    public function setVilleCodeCommune($villeCodeCommune)
    {
        $this->villeCodeCommune = $villeCodeCommune;

        return $this;
    }

    /**
     * Get villeCodeCommune.
     *
     * @return string
     */
    public function getVilleCodeCommune()
    {
        return $this->villeCodeCommune;
    }

    /**
     * Set villeArrondissement.
     *
     * @param int|null $villeArrondissement
     *
     * @return VillesFranceFree
     */
    public function setVilleArrondissement($villeArrondissement = null)
    {
        $this->villeArrondissement = $villeArrondissement;

        return $this;
    }

    /**
     * Get villeArrondissement.
     *
     * @return int|null
     */
    public function getVilleArrondissement()
    {
        return $this->villeArrondissement;
    }

    /**
     * Set villeCanton.
     *
     * @param string|null $villeCanton
     *
     * @return VillesFranceFree
     */
    public function setVilleCanton($villeCanton = null)
    {
        $this->villeCanton = $villeCanton;

        return $this;
    }

    /**
     * Get villeCanton.
     *
     * @return string|null
     */
    public function getVilleCanton()
    {
        return $this->villeCanton;
    }

    /**
     * Set villeAmdi.
     *
     * @param int|null $villeAmdi
     *
     * @return VillesFranceFree
     */
    public function setVilleAmdi($villeAmdi = null)
    {
        $this->villeAmdi = $villeAmdi;

        return $this;
    }

    /**
     * Get villeAmdi.
     *
     * @return int|null
     */
    public function getVilleAmdi()
    {
        return $this->villeAmdi;
    }

    /**
     * Set villePopulation2010.
     *
     * @param int|null $villePopulation2010
     *
     * @return VillesFranceFree
     */
    public function setVillePopulation2010($villePopulation2010 = null)
    {
        $this->villePopulation2010 = $villePopulation2010;

        return $this;
    }

    /**
     * Get villePopulation2010.
     *
     * @return int|null
     */
    public function getVillePopulation2010()
    {
        return $this->villePopulation2010;
    }

    /**
     * Set villePopulation1999.
     *
     * @param int|null $villePopulation1999
     *
     * @return VillesFranceFree
     */
    public function setVillePopulation1999($villePopulation1999 = null)
    {
        $this->villePopulation1999 = $villePopulation1999;

        return $this;
    }

    /**
     * Get villePopulation1999.
     *
     * @return int|null
     */
    public function getVillePopulation1999()
    {
        return $this->villePopulation1999;
    }

    /**
     * Set villePopulation2012.
     *
     * @param int|null $villePopulation2012
     *
     * @return VillesFranceFree
     */
    public function setVillePopulation2012($villePopulation2012 = null)
    {
        $this->villePopulation2012 = $villePopulation2012;

        return $this;
    }

    /**
     * Get villePopulation2012.
     *
     * @return int|null
     */
    public function getVillePopulation2012()
    {
        return $this->villePopulation2012;
    }

    /**
     * Set villeDensite2010.
     *
     * @param int|null $villeDensite2010
     *
     * @return VillesFranceFree
     */
    public function setVilleDensite2010($villeDensite2010 = null)
    {
        $this->villeDensite2010 = $villeDensite2010;

        return $this;
    }

    /**
     * Get villeDensite2010.
     *
     * @return int|null
     */
    public function getVilleDensite2010()
    {
        return $this->villeDensite2010;
    }

    /**
     * Set villeSurface.
     *
     * @param float|null $villeSurface
     *
     * @return VillesFranceFree
     */
    public function setVilleSurface($villeSurface = null)
    {
        $this->villeSurface = $villeSurface;

        return $this;
    }

    /**
     * Get villeSurface.
     *
     * @return float|null
     */
    public function getVilleSurface()
    {
        return $this->villeSurface;
    }

    /**
     * Set villeLongitudeDeg.
     *
     * @param float|null $villeLongitudeDeg
     *
     * @return VillesFranceFree
     */
    public function setVilleLongitudeDeg($villeLongitudeDeg = null)
    {
        $this->villeLongitudeDeg = $villeLongitudeDeg;

        return $this;
    }

    /**
     * Get villeLongitudeDeg.
     *
     * @return float|null
     */
    public function getVilleLongitudeDeg()
    {
        return $this->villeLongitudeDeg;
    }

    /**
     * Set villeLatitudeDeg.
     *
     * @param float|null $villeLatitudeDeg
     *
     * @return VillesFranceFree
     */
    public function setVilleLatitudeDeg($villeLatitudeDeg = null)
    {
        $this->villeLatitudeDeg = $villeLatitudeDeg;

        return $this;
    }

    /**
     * Get villeLatitudeDeg.
     *
     * @return float|null
     */
    public function getVilleLatitudeDeg()
    {
        return $this->villeLatitudeDeg;
    }

    /**
     * Set villeLongitudeGrd.
     *
     * @param string|null $villeLongitudeGrd
     *
     * @return VillesFranceFree
     */
    public function setVilleLongitudeGrd($villeLongitudeGrd = null)
    {
        $this->villeLongitudeGrd = $villeLongitudeGrd;

        return $this;
    }

    /**
     * Get villeLongitudeGrd.
     *
     * @return string|null
     */
    public function getVilleLongitudeGrd()
    {
        return $this->villeLongitudeGrd;
    }

    /**
     * Set villeLatitudeGrd.
     *
     * @param string|null $villeLatitudeGrd
     *
     * @return VillesFranceFree
     */
    public function setVilleLatitudeGrd($villeLatitudeGrd = null)
    {
        $this->villeLatitudeGrd = $villeLatitudeGrd;

        return $this;
    }

    /**
     * Get villeLatitudeGrd.
     *
     * @return string|null
     */
    public function getVilleLatitudeGrd()
    {
        return $this->villeLatitudeGrd;
    }

    /**
     * Set villeLongitudeDms.
     *
     * @param string|null $villeLongitudeDms
     *
     * @return VillesFranceFree
     */
    public function setVilleLongitudeDms($villeLongitudeDms = null)
    {
        $this->villeLongitudeDms = $villeLongitudeDms;

        return $this;
    }

    /**
     * Get villeLongitudeDms.
     *
     * @return string|null
     */
    public function getVilleLongitudeDms()
    {
        return $this->villeLongitudeDms;
    }

    /**
     * Set villeLatitudeDms.
     *
     * @param string|null $villeLatitudeDms
     *
     * @return VillesFranceFree
     */
    public function setVilleLatitudeDms($villeLatitudeDms = null)
    {
        $this->villeLatitudeDms = $villeLatitudeDms;

        return $this;
    }

    /**
     * Get villeLatitudeDms.
     *
     * @return string|null
     */
    public function getVilleLatitudeDms()
    {
        return $this->villeLatitudeDms;
    }

    /**
     * Set villeZmin.
     *
     * @param int|null $villeZmin
     *
     * @return VillesFranceFree
     */
    public function setVilleZmin($villeZmin = null)
    {
        $this->villeZmin = $villeZmin;

        return $this;
    }

    /**
     * Get villeZmin.
     *
     * @return int|null
     */
    public function getVilleZmin()
    {
        return $this->villeZmin;
    }

    /**
     * Set villeZmax.
     *
     * @param int|null $villeZmax
     *
     * @return VillesFranceFree
     */
    public function setVilleZmax($villeZmax = null)
    {
        $this->villeZmax = $villeZmax;

        return $this;
    }

    /**
     * Get villeZmax.
     *
     * @return int|null
     */
    public function getVilleZmax()
    {
        return $this->villeZmax;
    }
}
