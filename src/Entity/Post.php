<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\Table(name="symfony_demo_post")
 *
 */
class Post
{
    public const NUM_ITEMS = 10;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $slug;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="post.blank_summary")
     */
    private $summary;
    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="post.blank_content")
     * @Assert\Length(min=10, minMessage="post.too_short_content")
     */
    private $content;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Assert\DateTime
     */
    private $publishedAt;

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }
    public function getPublishedAt(): \DateTime
    {
        return $this->publishedAt;
    }
    public function setPublishedAt(?\DateTime $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }
}
