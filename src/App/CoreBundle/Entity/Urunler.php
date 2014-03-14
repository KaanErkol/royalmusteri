<?php

namespace App\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Urunler
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Urunler
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
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $kutuno;

    /**
     * @ORM\Column(type="text",nullable=TRUE)
     */
    private $uruncinsi;

    /**
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $adet;
    /**
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $firma;

    /**
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $toplam;

    /**
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $agirlik;

    /**
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $markaliurunadet;

    /**
     * @ORM\Column(type="string",nullable=TRUE,length=255)
     */
    private $fsizadet;

    /**
     * @ORM\Column(type="string",nullable=FALSE,length=255)
     */
    private $gonderiyontemi;

    /**
     * @ORM\ManyToOne(targetEntity="Siparis",inversedBy="urunler")
     * @ORM\JoinColumn(name="siparis_id", referencedColumnName="id")
     */
    private $parent;


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
     * Set parent
     *
     * @param \App\CoreBundle\Entity\Siparis $parent
     * @return Urunler
     */
    public function setParent(\App\CoreBundle\Entity\Siparis $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \App\CoreBundle\Entity\Siparis 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set kutuno
     *
     * @param string $kutuno
     * @return Urunler
     */
    public function setKutuno($kutuno)
    {
        $this->kutuno = $kutuno;

        return $this;
    }

    /**
     * Get kutuno
     *
     * @return string 
     */
    public function getKutuno()
    {
        return $this->kutuno;
    }

    /**
     * Set uruncinsi
     *
     * @param string $uruncinsi
     * @return Urunler
     */
    public function setUruncinsi($uruncinsi)
    {
        $this->uruncinsi = $uruncinsi;

        return $this;
    }

    /**
     * Get uruncinsi
     *
     * @return string 
     */
    public function getUruncinsi()
    {
        return $this->uruncinsi;
    }

    /**
     * Set adet
     *
     * @param string $adet
     * @return Urunler
     */
    public function setAdet($adet)
    {
        $this->adet = $adet;

        return $this;
    }

    /**
     * Get adet
     *
     * @return string 
     */
    public function getAdet()
    {
        return $this->adet;
    }

    /**
     * Set toplam
     *
     * @param string $toplam
     * @return Urunler
     */
    public function setToplam($toplam)
    {
        $this->toplam = $toplam;

        return $this;
    }

    /**
     * Get toplam
     *
     * @return string 
     */
    public function getToplam()
    {
        return $this->toplam;
    }

    /**
     * Set agirlik
     *
     * @param string $agirlik
     * @return Urunler
     */
    public function setAgirlik($agirlik)
    {
        $this->agirlik = $agirlik;

        return $this;
    }

    /**
     * Get agirlik
     *
     * @return string 
     */
    public function getAgirlik()
    {
        return $this->agirlik;
    }

    public function __toString(){
        return $this->kutuno;
    }

    /**
     * Set fsizadet
     *
     * @param string $fsizadet
     * @return Urunler
     */
    public function setFsizadet($fsizadet)
    {
        $this->fsizadet = $fsizadet;

        return $this;
    }

    /**
     * Get fsizadet
     *
     * @return string 
     */
    public function getFsizadet()
    {
        return $this->fsizadet;
    }

    /**
     * Set gonderiyontemi
     *
     * @param string $gonderiyontemi
     * @return Urunler
     */
    public function setGonderiyontemi($gonderiyontemi)
    {
        $this->gonderiyontemi = $gonderiyontemi;

        return $this;
    }

    /**
     * Get gonderiyontemi
     *
     * @return string 
     */
    public function getGonderiyontemi()
    {
        return $this->gonderiyontemi;
    }

    /**
     * Set markaliurunadet
     *
     * @param string $markaliurunadet
     * @return Urunler
     */
    public function setMarkaliurunadet($markaliurunadet)
    {
        $this->markaliurunadet = $markaliurunadet;

        return $this;
    }

    /**
     * Get markaliurunadet
     *
     * @return string 
     */
    public function getMarkaliurunadet()
    {
        return $this->markaliurunadet;
    }

    /**
     * Set firma
     *
     * @param string $firma
     * @return Urunler
     */
    public function setFirma($firma)
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * Get firma
     *
     * @return string 
     */
    public function getFirma()
    {
        return $this->firma;
    }
}
