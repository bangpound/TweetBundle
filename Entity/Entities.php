<?php

namespace Bangpound\TweetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entities
 *
 * @ORM\Table("entities")
 * @ORM\Entity
 */
class Entities {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Tweet", mappedBy="entities")
     */
    private $tweet;

    /**
     * @var ArrayCollection<Hashtag>
     *
     * @JMS\Type("ArrayCollection<Bangpound\TweetBundle\Entity\Hashtag>")
     * @ORM\OneToMany(targetEntity="Hashtag", mappedBy="entities", cascade={"persist"})
     * @JMS\AccessType("public_method")
     */
    private $hashtags;

    /**
     * @var ArrayCollection<Media>
     *
     * @JMS\Type("ArrayCollection<Bangpound\TweetBundle\Entity\Media>")
     * @ORM\OneToMany(targetEntity="Media", mappedBy="entities", cascade={"persist"})
     * @JMS\AccessType("public_method")
     */
    private $media;

    /**
     * @var ArrayCollection<Url>
     *
     * @JMS\Type("ArrayCollection<Bangpound\TweetBundle\Entity\Url>")
     * @ORM\OneToMany(targetEntity="Url", mappedBy="entities", cascade={"persist"})
     * @JMS\AccessType("public_method")
     */
    private $urls;

    /**
     * @var ArrayCollection<UserMention>
     *
     * @JMS\Type("ArrayCollection<Bangpound\TweetBundle\Entity\UserMention>")
     * @ORM\OneToMany(targetEntity="UserMention", mappedBy="entities", cascade={"persist"})
     * @JMS\AccessType("public_method")
     */
    private $userMentions;

    public function __construct()
    {
        $this->hashtags = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->urls = new ArrayCollection();
        $this->userMentions = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getHashtags()
    {
        return $this->hashtags;
    }

    public function setHashtags(ArrayCollection $hashtags)
    {
        foreach ($hashtags as $value)
        {
            $value->setEntities($this);
        }
        $this->hashtags = $hashtags;
        return $this;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia(ArrayCollection $media)
    {
        foreach ($media as $value)
        {
            $value->setEntities($this);
        }
        $this->media = $media;
        return $this;
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function setUrls(ArrayCollection $urls)
    {
        foreach ($urls as $value)
        {
            $value->setEntities($this);
        }
        $this->urls = $urls;
        return $this;
    }

    public function getUserMentions()
    {
        return $this->userMentions;
    }

    public function setUserMentions(ArrayCollection $userMentions)
    {
        foreach ($userMentions as $value)
        {
            $value->setEntities($this);
        }
        $this->userMentions = $userMentions;
        return $this;
    }

    public function setTweet(Tweet $tweet)
    {
        $this->tweet = $tweet;
        return $this;
    }

}
