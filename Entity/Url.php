<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Url
 *
 * @ORM\Table("url", uniqueConstraints={@ORM\UniqueConstraint(name="url_idx", columns={"url"})}, options={"collate"="utf8_bin"})
 * @ORM\Entity
 */
class Url
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
     * @var ArrayCollection<Tweet>
     *
     * @ORM\ManyToMany(targetEntity="Tweet", mappedBy="urls")
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
     * @return Url
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
     * @return Url
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
     * Set url
     *
     * @param string $url
     * @return Url
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
        return $this->getDisplayUrl();
    }
}
