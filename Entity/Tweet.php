<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use CrEOF\Spatial\PHP\Types\Geometry\Point;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Tweet
 *
 * @ORM\Table("tweet",
 *   uniqueConstraints={
 *       @ORM\UniqueConstraint(name="id_str_idx", columns={"id_str"})
 *   },
 *   indexes={
 *       @ORM\Index(name="created_at_idx", columns={"created_at"}),
 *       @ORM\Index(name="favorite_count_idx", columns={"favorite_count"}),
 *       @ORM\Index(name="retweet_count_idx", columns={"retweet_count"})
 *   }
 * )
 * @ORM\Entity(repositoryClass="Bangpound\Twitter\DataBundle\Entity\DataRepository")
 * @JMS\ExclusionPolicy("none")
 */
class Tweet
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
     * @var Point
     *
     * @ORM\Column(name="coordinates", type="Point", nullable=true)
     * @JMS\Type("array")
     * @JMS\Accessor(setter="setCoordinatesGeoJSON")
     */
    private $coordinates;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @JMS\Type("DateTime<'D M d H:i:s O Y'>")
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="favorite_count", type="integer")
     */
    private $favoriteCount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="favorited", type="boolean")
     */
    private $favorited;

    /**
     * @var string
     *
     * @ORM\Column(name="filter_level", type="string", length=255, nullable=true)
     */
    private $filterLevel;

    /**
     * @var ArrayCollection<Hashtag>
     *
     * @JMS\Type("ArrayCollection<Bangpound\Twitter\DataBundle\Entity\Hashtag>")
     * @ORM\ManyToMany(targetEntity="Hashtag", inversedBy="tweets")
     */
    private $hashtags;

    /**
     * @var string
     *
     * @ORM\Column(name="id_str", type="string", length=20)
     */
    private $idStr;

    /**
     * @var string
     *
     * @ORM\Column(name="in_reply_to_screen_name", type="string", length=255, nullable=true)
     */
    private $inReplyToScreenName;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_reply_to_status_id", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $inReplyToStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="in_reply_to_status_id_str", type="string", length=20, nullable=true)
     */
    private $inReplyToStatusIdStr;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_reply_to_user_id", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $inReplyToUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="in_reply_to_user_id_str", type="string", length=20, nullable=true)
     */
    private $inReplyToUserIdStr;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=255, nullable=true)
     */
    private $lang;

    /**
     * @var ArrayCollection<Media>
     *
     * @JMS\Type("ArrayCollection<Bangpound\Twitter\DataBundle\Entity\Media>")
     * @ORM\ManyToMany(targetEntity="Media")
     */
    private $media;

    /**
     * @var Place
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @JMS\Type("Bangpound\Twitter\DataBundle\Entity\Place")
     */
    private $place;

    /**
     * @var boolean
     *
     * @ORM\Column(name="possibly_sensitive", type="boolean", nullable=true)
     */
    private $possiblySensitive;

    /**
     * @var integer
     *
     * @ORM\Column(name="retweet_count", type="integer", nullable=true)
     */
    private $retweetCount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="retweeted", type="boolean")
     */
    private $retweeted;

    /**
     * @var Tweet
     *
     * @ORM\ManyToOne(targetEntity="Tweet")
     * @ORM\JoinColumn(name="retweeted_status_id", nullable=true)
     * @JMS\Type("Bangpound\Twitter\DataBundle\Entity\Tweet")
     */
    private $retweetedStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var boolean
     *
     * @ORM\Column(name="truncated", type="boolean")
     */
    private $truncated;

    /**
     * @var ArrayCollection<Url>
     *
     * @JMS\Type("ArrayCollection<Bangpound\Twitter\DataBundle\Entity\Url>")
     * @ORM\ManyToMany(targetEntity="Url", inversedBy="tweets")
     */
    private $urls;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tweets", fetch="EAGER")
     * @JMS\Type("Bangpound\Twitter\DataBundle\Entity\User")
     */
    private $user;

    /**
     * @var ArrayCollection<UserMention>
     *
     * @JMS\Type("ArrayCollection<Bangpound\Twitter\DataBundle\Entity\UserMention>")
     * @ORM\ManyToMany(targetEntity="UserMention")
     */
    private $userMentions;

    /**
     * @var boolean
     *
     * @ORM\Column(name="withheld_copyright", type="boolean", nullable=true)
     */
    private $withheldCopyright;

    /**
     * @var string
     *
     * @ORM\Column(name="withheld_scope", type="string", length=255, nullable=true)
     */
    private $withheldScope;

    public function __construct()
    {
        $this->hashtags = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->urls = new ArrayCollection();
        $this->userMentions = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->text;
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

    public function setCoordinates(Point $coordinates)
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     *
     * @param array $coordinates
     * @return \Bangpound\Twitter\DataBundle\Entity\Tweet
     */
    public function setCoordinatesGeoJSON($coordinates)
    {
        if (is_array($coordinates) && isset($coordinates['coordinates']))
        {
            return $this->setCoordinates(new Point($coordinates['coordinates'][0], $coordinates['coordinates'][1]));
        }
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Tweet
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
/*
    public function setCoordinates($coordinates) {
        if (!empty($coordinates)) {
            $class = 'CrEOF\\Spatial\\PHP\\Types\\Geometry\\'. $coordinates['type'];
            $this->coordinates = new $class($coordinates['coordinates'][0], $coordinates['coordinates'][1]);
        }
        return $this;
    }

    public function getCoordinates() {
        return $this->coordinates;
    }
*/

    /**
     * Set favoriteCount
     *
     * @param integer $favoriteCount
     * @return Tweet
     */
    public function setFavoriteCount($favoriteCount)
    {
        $this->favoriteCount = $favoriteCount;

        return $this;
    }

    /**
     * Get favoriteCount
     *
     * @return integer
     */
    public function getFavoriteCount()
    {
        return $this->favoriteCount;
    }

    /**
     * Set favorited
     *
     * @param boolean $favorited
     * @return Tweet
     */
    public function setFavorited($favorited)
    {
        $this->favorited = $favorited;

        return $this;
    }

    /**
     * Get favorited
     *
     * @return boolean
     */
    public function getFavorited()
    {
        return $this->favorited;
    }

    /**
     * Set filterLevel
     *
     * @param string $filterLevel
     * @return Tweet
     */
    public function setFilterLevel($filterLevel)
    {
        $this->filterLevel = $filterLevel;

        return $this;
    }

    /**
     * Get filterLevel
     *
     * @return string
     */
    public function getFilterLevel()
    {
        return $this->filterLevel;
    }

    public function getHashtags()
    {
        return $this->hashtags;
    }

    public function setHashtags(ArrayCollection $hashtags)
    {
        $this->hashtags = $hashtags;
        return $this;
    }

    /**
     * Set idStr
     *
     * @param string $idStr
     * @return Tweet
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
     * Set inReplyToScreenName
     *
     * @param string $inReplyToScreenName
     * @return Tweet
     */
    public function setInReplyToScreenName($inReplyToScreenName)
    {
        $this->inReplyToScreenName = $inReplyToScreenName;

        return $this;
    }

    /**
     * Get inReplyToScreenName
     *
     * @return string
     */
    public function getInReplyToScreenName()
    {
        return $this->inReplyToScreenName;
    }

    /**
     * Set inReplyToStatusId
     *
     * @param integer $inReplyToStatusId
     * @return Tweet
     */
    public function setInReplyToStatusId($inReplyToStatusId)
    {
        $this->inReplyToStatusId = $inReplyToStatusId;

        return $this;
    }

    /**
     * Get inReplyToStatusId
     *
     * @return integer
     */
    public function getInReplyToStatusId()
    {
        return $this->inReplyToStatusId;
    }

    /**
     * Set inReplyToStatusIdStr
     *
     * @param string $inReplyToStatusIdStr
     * @return Tweet
     */
    public function setInReplyToStatusIdStr($inReplyToStatusIdStr)
    {
        $this->inReplyToStatusIdStr = $inReplyToStatusIdStr;

        return $this;
    }

    /**
     * Get inReplyToStatusIdStr
     *
     * @return string
     */
    public function getInReplyToStatusIdStr()
    {
        return $this->inReplyToStatusIdStr;
    }

    /**
     * Set inReplyToUserId
     *
     * @param integer $inReplyToUserId
     * @return Tweet
     */
    public function setInReplyToUserId($inReplyToUserId)
    {
        $this->inReplyToUserId = $inReplyToUserId;

        return $this;
    }

    /**
     * Get inReplyToUserId
     *
     * @return integer
     */
    public function getInReplyToUserId()
    {
        return $this->inReplyToUserId;
    }

    /**
     * Set inReplyToUserIdStr
     *
     * @param string $inReplyToUserIdStr
     * @return Tweet
     */
    public function setInReplyToUserIdStr($inReplyToUserIdStr)
    {
        $this->inReplyToUserIdStr = $inReplyToUserIdStr;

        return $this;
    }

    /**
     * Get inReplyToUserIdStr
     *
     * @return string
     */
    public function getInReplyToUserIdStr()
    {
        return $this->inReplyToUserIdStr;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Tweet
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia(ArrayCollection $media)
    {
        $this->media = $media;
        return $this;
    }


    /**
     * Set place
     *
     * @param Place $place
     * @return Tweet
     */
    public function setPlace(Place $place)
    {
        $this->place = $place;
        return $this;
    }

    /**
     * Get place
     *
     * @return Place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set possiblySensitive
     *
     * @param boolean $possiblySensitive
     * @return Tweet
     */
    public function setPossiblySensitive($possiblySensitive)
    {
        $this->possiblySensitive = $possiblySensitive;

        return $this;
    }

    /**
     * Get possiblySensitive
     *
     * @return boolean
     */
    public function getPossiblySensitive()
    {
        return $this->possiblySensitive;
    }

    /**
     * Set retweetCount
     *
     * @param integer $retweetCount
     * @return Tweet
     */
    public function setRetweetCount($retweetCount)
    {
        $this->retweetCount = $retweetCount;

        return $this;
    }

    /**
     * Get retweetCount
     *
     * @return integer
     */
    public function getRetweetCount()
    {
        return $this->retweetCount;
    }

    /**
     * Set retweeted
     *
     * @param boolean $retweeted
     * @return Tweet
     */
    public function setRetweeted($retweeted)
    {
        $this->retweeted = $retweeted;

        return $this;
    }

    /**
     * Get retweeted
     *
     * @return boolean
     */
    public function getRetweeted()
    {
        return $this->retweeted;
    }

    /**
     * Set retweetedStatus
     *
     * @param Tweet $retweetedStatus
     * @return Tweet
     */
    public function setRetweetedStatus(Tweet $retweetedStatus)
    {
        $this->retweetedStatus = $retweetedStatus;

        return $this;
    }

    /**
     * Get retweeted
     *
     * @return boolean
     */
    public function getRetweetedStatus()
    {
        return $this->retweetedStatus;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Tweet
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Tweet
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set truncated
     *
     * @param boolean $truncated
     * @return Tweet
     */
    public function setTruncated($truncated)
    {
        $this->truncated = $truncated;

        return $this;
    }

    /**
     * Get truncated
     *
     * @return boolean
     */
    public function getTruncated()
    {
        return $this->truncated;
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function setUrls(ArrayCollection $urls)
    {
        $this->urls = $urls;
        return $this;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function getUserMentions()
    {
        return $this->userMentions;
    }

    public function setUserMentions(ArrayCollection $userMentions)
    {
        $this->userMentions = $userMentions;
        return $this;
    }
    
    /**
     * Set withheldCopyright
     *
     * @param boolean $withheldCopyright
     * @return Tweet
     */
    public function setWithheldCopyright($withheldCopyright)
    {
        $this->withheldCopyright = $withheldCopyright;

        return $this;
    }

    /**
     * Get withheldCopyright
     *
     * @return boolean
     */
    public function getWithheldCopyright()
    {
        return $this->withheldCopyright;
    }

    /**
     * Set withheldScope
     *
     * @param string $withheldScope
     * @return Tweet
     */
    public function setWithheldScope($withheldScope)
    {
        $this->withheldScope = $withheldScope;

        return $this;
    }

    /**
     * Get withheldScope
     *
     * @return string
     */
    public function getWithheldScope()
    {
        return $this->withheldScope;
    }
}
