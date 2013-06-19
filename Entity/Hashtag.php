<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Hashtag
 *
 * @ORM\Table("hashtag", uniqueConstraints={@ORM\UniqueConstraint(name="text_idx", columns={"text"})}, options={"collate"="utf8_bin"})
 * @ORM\Entity
 */
class Hashtag
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
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var ArrayCollection<Tweet>
     *
     * @ORM\ManyToMany(targetEntity="Tweet", mappedBy="hashtags")
     */
    private $tweets;

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

    public function __toString()
    {
        return $this->getText();
    }
}
