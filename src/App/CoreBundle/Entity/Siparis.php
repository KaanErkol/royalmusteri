<?php

namespace App\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Siparis
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Siparis
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
     * @ORM\ManyToOne(targetEntity="Musteri")
     * @ORM\JoinColumn(name="musteri_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Urunler", mappedBy="parent",cascade={"all"}, orphanRemoval=true)
     */

    private $urunler;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime",nullable=TRUE)
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime",nullable=TRUE)
     */
    private $updated;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;


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
     * Constructor
     */
    public function __construct()
    {
        $this->urunler = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Siparis
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Siparis
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add urunler
     *
     * @param \App\CoreBundle\Entity\Urunler $urunler
     * @return Siparis
     */
    public function addUrunler(\App\CoreBundle\Entity\Urunler $urunler)
    {
        $this->urunler[] = $urunler;

        return $this;
    }

    /**
     * Remove urunler
     *
     * @param \App\CoreBundle\Entity\Urunler $urunler
     */
    public function removeUrunler(\App\CoreBundle\Entity\Urunler $urunler)
    {
        $this->urunler->removeElement($urunler);
    }

    /**
     * Get urunler
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUrunler()
    {
        return $this->urunler;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Siparis
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    public function __toString(){
        return 'test';
    }

    /**
     * Set user
     *
     * @param \App\CoreBundle\Entity\Musteri $user
     * @return Siparis
     */
    public function setUser(\App\CoreBundle\Entity\Musteri $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\CoreBundle\Entity\Musteri 
     */
    public function getUser()
    {
        return $this->user;
    }
}
