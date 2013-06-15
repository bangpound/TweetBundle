<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserMention
 *
 * @ORM\Table("user_mention")
 * @ORM\Entity
 */
class UserMention
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
     * @var Entities
     *
     * @ORM\ManyToOne(targetEntity="Entities", inversedBy="userMentions")
     */
    private $entities;

    /**
     * @var string
     *
     * @ORM\Column(name="id_str", type="string", length=255)
     */
    private $idStr;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="screen_name", type="string", length=255)
     */
    private $screenName;


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
     * Set idStr
     *
     * @param string $idStr
     * @return UserMention
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
     * Set name
     *
     * @param string $name
     * @return UserMention
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
     * Set screenName
     *
     * @param string $screenName
     * @return UserMention
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
    public function setEntities(Entities $entities)
    {
        $this->entities = $entities;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
