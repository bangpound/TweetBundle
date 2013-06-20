<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use CrEOF\Spatial\PHP\Types\Geometry\Polygon;

/**
 * Place
 *
 * @ORM\Table("place")
 * @ORM\Entity
 */
class Place
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="string", length=16)
     * @ORM\Id
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\Column(name="attributes", type="json_array")
     * @JMS\Type("array")
     */
    private $attributes;

    /**
     * @var Polygon
     *
     * @ORM\Column(name="bounding_box", type="polygon", nullable=true)
     * @JMS\Type("array")
     * @JMS\Accessor(setter="setBoundingBoxGeoJSON")
     */
    private $boundingBox;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=255)
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="place_type", type="string", length=255)
     */
    private $placeType;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


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
     * Set attributes
     *
     * @param array $attributes
     * @return Place
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set boundingBox
     *
     * @param Polygon $boundingBox
     * @return Place
     */
    public function setBoundingBox(Polygon $boundingBox)
    {
        $this->boundingBox = $boundingBox;

        return $this;
    }

    /**
     *
     * @param array $boundingBox
     * @return Place
     */
    public function setBoundingBoxGeoJSON($boundingBox)
    {
        if (is_array($boundingBox) && isset($boundingBox['coordinates']))
        {
            $rings = array();
            foreach ($boundingBox['coordinates'] as $coordinates)
            {
                $ring = $coordinates;
                $ring[] = $coordinates[0];
                $rings[] = $ring;
            }
            return $this->setBoundingBox(new Polygon($rings));
        }
    }

    /**
     * Get boundingBox
     *
     * @return geometry
     */
    public function getBoundingBox()
    {
        return $this->boundingBox;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Place
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return Place
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return Place
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Place
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
     * Set placeType
     *
     * @param string $placeType
     * @return Place
     */
    public function setPlaceType($placeType)
    {
        $this->placeType = $placeType;

        return $this;
    }

    /**
     * Get placeType
     *
     * @return string
     */
    public function getPlaceType()
    {
        return $this->placeType;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Place
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function __toString()
    {
        return $this->fullName;
    }
}
