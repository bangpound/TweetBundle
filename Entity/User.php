<?php

namespace Bangpound\TweetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * User
 *
 * @ORM\Table("user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contributors_enabled", type="boolean")
     */
    private $contributorsEnabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @JMS\Type("DateTime<'D M d H:i:s O Y'>")
     */
    private $createdAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="default_profile", type="boolean")
     */
    private $defaultProfile;

    /**
     * @var boolean
     *
     * @ORM\Column(name="default_profile_image", type="boolean")
     */
    private $defaultProfileImage;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="favourites_count", type="integer", nullable=true)
     */
    private $favouritesCount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="follow_request_sent", type="boolean", nullable=true)
     */
    private $followRequestSent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="following", type="boolean", nullable=true)
     */
    private $following;

    /**
     * @var integer
     *
     * @ORM\Column(name="followers_count", type="integer")
     */
    private $followersCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="friends_count", type="integer")
     */
    private $friendsCount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="geo_enabled", type="boolean")
     */
    private $geoEnabled;

    /**
     * @var string
     *
     * @ORM\Column(name="id_str", type="string", length=255)
     */
    private $idStr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_translator", type="boolean")
     */
    private $isTranslator;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=255)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="listed_count", type="integer", nullable=true)
     */
    private $listedCount;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notifications", type="boolean", nullable=true)
     */
    private $notifications;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_background_color", type="string", length=6)
     */
    private $profileBackgroundColor;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_background_image_url", type="string", length=255)
     */
    private $profileBackgroundImageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_background_image_url_https", type="string", length=255)
     */
    private $profileBackgroundImageUrlHttps;

    /**
     * @var boolean
     *
     * @ORM\Column(name="profile_background_tile", type="boolean")
     */
    private $profileBackgroundTile;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_banner_url", type="string", length=255, nullable=true)
     */
    private $profileBannerUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_image_url", type="string", length=255)
     */
    private $profileImageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_image_url_https", type="string", length=255)
     */
    private $profileImageUrlHttps;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_link_color", type="string", length=6)
     */
    private $profileLinkColor;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_sidebar_border_color", type="string", length=6)
     */
    private $profileSidebarBorderColor;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_sidebar_fill_color", type="string", length=6)
     */
    private $profileSidebarFillColor;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_text_color", type="string", length=6)
     */
    private $profileTextColor;

    /**
     * @var boolean
     *
     * @ORM\Column(name="profile_use_background_image", type="boolean")
     */
    private $profileUseBackgroundImage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="protected", type="boolean")
     */
    private $protected;

    /**
     * @var string
     *
     * @ORM\Column(name="screen_name", type="string", length=255)
     */
    private $screenName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="show_all_inline_media", type="boolean", nullable=true)
     */
    private $showAllInlineMedia;

    /**
     * @var integer
     *
     * @ORM\Column(name="statuses_count", type="integer")
     */
    private $statusesCount;

    /**
     * @var string
     *
     * @ORM\Column(name="time_zone", type="string", length=255, nullable=true)
     */
    private $timeZone;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Tweet", mappedBy="user")
     */
    private $tweet;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="utc_offset", type="integer", nullable=true)
     */
    private $utcOffset;

    /**
     * @var boolean
     *
     * @ORM\Column(name="verified", type="boolean")
     */
    private $verified;

    /**
     * @var string
     *
     * @ORM\Column(name="withheld_in_countries", type="string", length=255, nullable=true)
     */
    private $withheldInCountries;

    /**
     * @var string
     *
     * @ORM\Column(name="withheld_scope", type="string", length=255, nullable=true)
     */
    private $withheldScope;


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
     * Set contributorsEnabled
     *
     * @param boolean $contributorsEnabled
     * @return User
     */
    public function setContributorsEnabled($contributorsEnabled)
    {
        $this->contributorsEnabled = $contributorsEnabled;

        return $this;
    }

    /**
     * Get contributorsEnabled
     *
     * @return boolean
     */
    public function getContributorsEnabled()
    {
        return $this->contributorsEnabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
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

    /**
     * Set defaultProfile
     *
     * @param boolean $defaultProfile
     * @return User
     */
    public function setDefaultProfile($defaultProfile)
    {
        $this->defaultProfile = $defaultProfile;

        return $this;
    }

    /**
     * Get defaultProfile
     *
     * @return boolean
     */
    public function getDefaultProfile()
    {
        return $this->defaultProfile;
    }

    /**
     * Set defaultProfileImage
     *
     * @param boolean $defaultProfileImage
     * @return User
     */
    public function setDefaultProfileImage($defaultProfileImage)
    {
        $this->defaultProfileImage = $defaultProfileImage;

        return $this;
    }

    /**
     * Get defaultProfileImage
     *
     * @return boolean
     */
    public function getDefaultProfileImage()
    {
        return $this->defaultProfileImage;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
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
     * Set favouritesCount
     *
     * @param integer $favouritesCount
     * @return User
     */
    public function setFavoritesCount($favouritesCount)
    {
        $this->favouritesCount = $favouritesCount;

        return $this;
    }

    /**
     * Get favoritesCount
     *
     * @return integer
     */
    public function getFavoritesCount()
    {
        return $this->favoritesCount;
    }

    /**
     * Set followRequestSent
     *
     * @param boolean $followRequestSent
     * @return User
     */
    public function setFollowRequestSent($followRequestSent)
    {
        $this->followRequestSent = $followRequestSent;

        return $this;
    }

    /**
     * Get followRequestSent
     *
     * @return boolean
     */
    public function getFollowRequestSent()
    {
        return $this->followRequestSent;
    }

    /**
     * Set following
     *
     * @param boolean $following
     * @return User
     */
    public function setFollowing($following)
    {
        $this->following = $following;

        return $this;
    }

    /**
     * Get following
     *
     * @return boolean
     */
    public function getFollowing()
    {
        return $this->following;
    }

    /**
     * Set followersCount
     *
     * @param integer $followersCount
     * @return User
     */
    public function setFollowersCount($followersCount)
    {
        $this->followersCount = $followersCount;

        return $this;
    }

    /**
     * Get followersCount
     *
     * @return integer
     */
    public function getFollowersCount()
    {
        return $this->followersCount;
    }

    /**
     * Set friendsCount
     *
     * @param integer $friendsCount
     * @return User
     */
    public function setFriendsCount($friendsCount)
    {
        $this->friendsCount = $friendsCount;

        return $this;
    }

    /**
     * Get friendsCount
     *
     * @return integer
     */
    public function getFriendsCount()
    {
        return $this->friendsCount;
    }

    /**
     * Set geoEnabled
     *
     * @param boolean $geoEnabled
     * @return User
     */
    public function setGeoEnabled($geoEnabled)
    {
        $this->geoEnabled = $geoEnabled;

        return $this;
    }

    /**
     * Get geoEnabled
     *
     * @return boolean
     */
    public function getGeoEnabled()
    {
        return $this->geoEnabled;
    }

    /**
     * Set idStr
     *
     * @param string $idStr
     * @return User
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
     * Set isTranslator
     *
     * @param boolean $isTranslator
     * @return User
     */
    public function setIsTranslator($isTranslator)
    {
        $this->isTranslator = $isTranslator;

        return $this;
    }

    /**
     * Get isTranslator
     *
     * @return boolean
     */
    public function getIsTranslator()
    {
        return $this->isTranslator;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return User
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

    /**
     * Set listedCount
     *
     * @param string $listedCount
     * @return User
     */
    public function setListedCount($listedCount)
    {
        $this->listedCount = $listedCount;

        return $this;
    }

    /**
     * Get listedCount
     *
     * @return string
     */
    public function getListedCount()
    {
        return $this->listedCount;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return User
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set notifications
     *
     * @param boolean $notifications
     * @return User
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return boolean
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set profileBackgroundColor
     *
     * @param string $profileBackgroundColor
     * @return User
     */
    public function setProfileBackgroundColor($profileBackgroundColor)
    {
        $this->profileBackgroundColor = $profileBackgroundColor;

        return $this;
    }

    /**
     * Get profileBackgroundColor
     *
     * @return string
     */
    public function getProfileBackgroundColor()
    {
        return $this->profileBackgroundColor;
    }

    /**
     * Set profileBackgroundImageUrl
     *
     * @param string $profileBackgroundImageUrl
     * @return User
     */
    public function setProfileBackgroundImageUrl($profileBackgroundImageUrl)
    {
        $this->profileBackgroundImageUrl = $profileBackgroundImageUrl;

        return $this;
    }

    /**
     * Get profileBackgroundImageUrl
     *
     * @return string
     */
    public function getProfileBackgroundImageUrl()
    {
        return $this->profileBackgroundImageUrl;
    }

    /**
     * Set profileBackgroundImageUrlHttps
     *
     * @param string $profileBackgroundImageUrlHttps
     * @return User
     */
    public function setProfileBackgroundImageUrlHttps($profileBackgroundImageUrlHttps)
    {
        $this->profileBackgroundImageUrlHttps = $profileBackgroundImageUrlHttps;

        return $this;
    }

    /**
     * Get profileBackgroundImageUrlHttps
     *
     * @return string
     */
    public function getProfileBackgroundImageUrlHttps()
    {
        return $this->profileBackgroundImageUrlHttps;
    }

    /**
     * Set profileBackgroundTile
     *
     * @param boolean $profileBackgroundTile
     * @return User
     */
    public function setProfileBackgroundTile($profileBackgroundTile)
    {
        $this->profileBackgroundTile = $profileBackgroundTile;

        return $this;
    }

    /**
     * Get profileBackgroundTile
     *
     * @return boolean
     */
    public function getProfileBackgroundTile()
    {
        return $this->profileBackgroundTile;
    }

    /**
     * Set profileBannerUrl
     *
     * @param string $profileBannerUrl
     * @return User
     */
    public function setProfileBannerUrl($profileBannerUrl)
    {
        $this->profileBannerUrl = $profileBannerUrl;

        return $this;
    }

    /**
     * Get profileBannerUrl
     *
     * @return string
     */
    public function getProfileBannerUrl()
    {
        return $this->profileBannerUrl;
    }

    /**
     * Set profileImageUrl
     *
     * @param string $profileImageUrl
     * @return User
     */
    public function setProfileImageUrl($profileImageUrl)
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    /**
     * Get profileImageUrl
     *
     * @return string
     */
    public function getProfileImageUrl()
    {
        return $this->profileImageUrl;
    }

    /**
     * Set profileImageUrlHttps
     *
     * @param string $profileImageUrlHttps
     * @return User
     */
    public function setProfileImageUrlHttps($profileImageUrlHttps)
    {
        $this->profileImageUrlHttps = $profileImageUrlHttps;

        return $this;
    }

    /**
     * Get profileImageUrlHttps
     *
     * @return string
     */
    public function getProfileImageUrlHttps()
    {
        return $this->profileImageUrlHttps;
    }

    /**
     * Set profileLinkColor
     *
     * @param string $profileLinkColor
     * @return User
     */
    public function setProfileLinkColor($profileLinkColor)
    {
        $this->profileLinkColor = $profileLinkColor;

        return $this;
    }

    /**
     * Get profileLinkColor
     *
     * @return string
     */
    public function getProfileLinkColor()
    {
        return $this->profileLinkColor;
    }

    /**
     * Set profileSidebarBorderColor
     *
     * @param string $profileSidebarBorderColor
     * @return User
     */
    public function setProfileSidebarBorderColor($profileSidebarBorderColor)
    {
        $this->profileSidebarBorderColor = $profileSidebarBorderColor;

        return $this;
    }

    /**
     * Get profileSidebarBorderColor
     *
     * @return string
     */
    public function getProfileSidebarBorderColor()
    {
        return $this->profileSidebarBorderColor;
    }

    /**
     * Set profileSidebarFillColor
     *
     * @param string $profileSidebarFillColor
     * @return User
     */
    public function setProfileSidebarFillColor($profileSidebarFillColor)
    {
        $this->profileSidebarFillColor = $profileSidebarFillColor;

        return $this;
    }

    /**
     * Get profileSidebarFillColor
     *
     * @return string
     */
    public function getProfileSidebarFillColor()
    {
        return $this->profileSidebarFillColor;
    }

    /**
     * Set profileTextColor
     *
     * @param string $profileTextColor
     * @return User
     */
    public function setProfileTextColor($profileTextColor)
    {
        $this->profileTextColor = $profileTextColor;

        return $this;
    }

    /**
     * Get profileTextColor
     *
     * @return string
     */
    public function getProfileTextColor()
    {
        return $this->profileTextColor;
    }

    /**
     * Set profileUseBackgroundImage
     *
     * @param boolean $profileUseBackgroundImage
     * @return User
     */
    public function setProfileUseBackgroundImage($profileUseBackgroundImage)
    {
        $this->profileUseBackgroundImage = $profileUseBackgroundImage;

        return $this;
    }

    /**
     * Get profileUseBackgroundImage
     *
     * @return boolean
     */
    public function getProfileUseBackgroundImage()
    {
        return $this->profileUseBackgroundImage;
    }

    /**
     * Set protected
     *
     * @param boolean $protected
     * @return User
     */
    public function setProtected($protected)
    {
        $this->protected = $protected;

        return $this;
    }

    /**
     * Get protected
     *
     * @return boolean
     */
    public function getProtected()
    {
        return $this->protected;
    }

    /**
     * Set screenName
     *
     * @param string $screenName
     * @return User
     */
    public function setScreenName($screenName)
    {
        $this->screenName = $screenName;

        return $this;
    }

    /**
     * Get screenName
     *
     * @return string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * Set showAllInlineMedia
     *
     * @param boolean $showAllInlineMedia
     * @return User
     */
    public function setShowAllInlineMedia($showAllInlineMedia)
    {
        $this->showAllInlineMedia = $showAllInlineMedia;

        return $this;
    }

    /**
     * Get showAllInlineMedia
     *
     * @return boolean
     */
    public function getShowAllInlineMedia()
    {
        return $this->showAllInlineMedia;
    }

    /**
     * Set statusesCount
     *
     * @param integer $statusesCount
     * @return User
     */
    public function setStatusesCount($statusesCount)
    {
        $this->statusesCount = $statusesCount;

        return $this;
    }

    /**
     * Get statusesCount
     *
     * @return integer
     */
    public function getStatusesCount()
    {
        return $this->statusesCount;
    }

    /**
     * Set timeZone
     *
     * @param string $timeZone
     * @return User
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Get timeZone
     *
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return User
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

    /**
     * Set utcOffset
     *
     * @param integer $utcOffset
     * @return User
     */
    public function setUtcOffset($utcOffset)
    {
        $this->utcOffset = $utcOffset;

        return $this;
    }

    /**
     * Get utcOffset
     *
     * @return integer
     */
    public function getUtcOffset()
    {
        return $this->utcOffset;
    }

    /**
     * Set verified
     *
     * @param boolean $verified
     * @return User
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set withheldInCountries
     *
     * @param string $withheldInCountries
     * @return User
     */
    public function setWithheldInCountries($withheldInCountries)
    {
        $this->withheldInCountries = $withheldInCountries;

        return $this;
    }

    /**
     * Get withheldInCountries
     *
     * @return string
     */
    public function getWithheldInCountries()
    {
        return $this->withheldInCountries;
    }

    /**
     * Set withheldScope
     *
     * @param string $withheldScope
     * @return User
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

    public function __toString()
    {
        return $this->getName();
    }
}
