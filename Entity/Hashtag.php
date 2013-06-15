<?php

namespace Bangpound\TweetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hashtag
 *
 * @ORM\Table("hashtag")
 * @ORM\Entity
 */
class Hashtag
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
     * @ORM\ManyToOne(targetEntity="Entities", inversedBy="hashtags")
     */
    private $entities;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

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
     * Set text
     *
     * @param string $text
     * @return Hashtag
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
    public function setEntities(Entities $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    public function __toString()
    {
        return $this->getText();
    }
}
