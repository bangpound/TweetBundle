<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Media
 *
 * @ORM\Table("media", uniqueConstraints={@ORM\UniqueConstraint(name="id_str_idx", columns={"id_str"})})
 * @ORM\Entity
 */
class Media
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="display_url", type="string", length=255)
     */
    private $displayUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="expanded_url", type="string", length=255)
     */
    private $expandedUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="id_str", type="string", length=20)
     */
    private $idStr;

    /**
     * @var string
     *
     * @ORM\Column(name="media_url", type="string", length=255)
     */
    private $mediaUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="media_url_https", type="string", length=255)
     */
    private $mediaUrlHttps;

    /**
     * @var integer
     *
     * @ORM\Column(name="source_status_id", type="bigint", options={"unsigned"=true}, nullable=true)
     */
    private $sourceStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="source_status_id_str", type="string", length=20, nullable=true)
     */
    private $sourceStatusIdStr;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var ArrayCollection<Tweet>
     *
     * @ORM\ManyToMany(targetEntity="Tweet", mappedBy="hashtags")
     */
    private $tweets;

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
     * Set displayUrl
     *
     * @param string $displayUrl
     * @return Media
     */
    public function setDisplayUrl($displayUrl)
    {
        $this->displayUrl = $displayUrl;

        return $this;
    }

    /**
     * Get displayUrl
     *
     * @return string
     */
    public function getDisplayUrl()
    {
        return $this->displayUrl;
    }

    /**
     * Set expandedUrl
     *
     * @param string $expandedUrl
     * @return Media
     */
    public function setExpandedUrl($expandedUrl)
    {
        $this->expandedUrl = $expandedUrl;

        return $this;
    }

    /**
     * Get expandedUrl
     *
     * @return string
     */
    public function getExpandedUrl()
    {
        return $this->expandedUrl;
    }

    /**
     * Set idStr
     *
     * @param string $idStr
     * @return Media
     */
    public function setIdStr($idStr)
    {
        $this->idStr = $idStr;

        return $this;
    }

    /**
     * Get idStr
     *
     * @return string
     */
    public function getIdStr()
    {
        return $this->idStr;
    }

    /**
     * Set mediaUrl
     *
     * @param string $mediaUrl
     * @return Media
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;

        return $this;
    }

    /**
     * Get mediaUrl
     *
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * Set mediaUrlHttps
     *
     * @param string $mediaUrlHttps
     * @return Media
     */
    public function setMediaUrlHttps($mediaUrlHttps)
    {
        $this->mediaUrlHttps = $mediaUrlHttps;

        return $this;
    }

    /**
     * Get mediaUrlHttps
     *
     * @return string
     */
    public function getMediaUrlHttps()
    {
        return $this->mediaUrlHttps;
    }

    /**
     * Set sourceStatusId
     *
     * @param integer $sourceStatusId
     * @return Media
     */
    public function setSourceStatusId($sourceStatusId)
    {
        $this->sourceStatusId = $sourceStatusId;

        return $this;
    }

    /**
     * Get sourceStatusId
     *
     * @return integer
     */
    public function getSourceStatusId()
    {
        return $this->sourceStatusId;
    }

    /**
     * Set sourceStatusIdStr
     *
     * @param string $sourceStatusIdStr
     * @return Media
     */
    public function setSourceStatusIdStr($sourceStatusIdStr)
    {
        $this->sourceStatusIdStr = $sourceStatusIdStr;

        return $this;
    }

    /**
     * Get sourceStatusIdStr
     *
     * @return string
     */
    public function getSourceStatusIdStr()
    {
        return $this->sourceStatusIdStr;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Media
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
        return $this->getMediaUrl();
    }
}
