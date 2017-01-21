<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gift
 *
 * @ORM\Table(name="gift")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GiftRepository")
 */
class Gift
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Addressee")
     */
    private $addressee;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Buyer")
     */
    private $buyer;

    /**
     * @ORM\ManyToMany(targetEntity="Shop", inversedBy="gifts")
     * @ORM\JoinTable(name="shops_gifts")
     */
    private $shops;

    public function __construct()
    {
       $this->shops = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Gift
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Gift
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
     * Set price
     *
     * @param float $price
     *
     * @return Gift
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * Set addressee
     *
     * @param \AppBundle\Entity\Addressee $addressee
     *
     * @return Gift
     */
    public function setAddressee(\AppBundle\Entity\Addressee $addressee = null)
    {
        $this->addressee = $addressee;

        return $this;
    }

    /**
     * Get addressee
     *
     * @return \AppBundle\Entity\Addressee
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * Set buyer
     *
     * @param \AppBundle\Entity\Buyer $buyer
     *
     * @return Gift
     */
    public function setBuyer(\AppBundle\Entity\Buyer $buyer = null)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return \AppBundle\Entity\Buyer
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Add shop
     *
     * @param \AppBundle\Entity\Shop $shop
     *
     * @return Gift
     */
    public function addShop(\AppBundle\Entity\Shop $shop)
    {
        $this->shops[] = $shop;

        return $this;
    }

    /**
     * Remove shop
     *
     * @param \AppBundle\Entity\Shop $shop
     */
    public function removeShop(\AppBundle\Entity\Shop $shop)
    {
        $this->shops->removeElement($shop);
    }

    /**
     * Get shops
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShops()
    {
        return $this->shops;
    }
}
