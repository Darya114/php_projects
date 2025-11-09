<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Post;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: "users")]
class User
{
    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "string", unique: true, length: 100)]
    private string $email;

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }
    
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: "user")]
    private Collection $posts;

    public function __construct() {
        $this->posts = new ArrayCollection();
    }

    public function getPosts(): Collection {
        return $this->posts;
    }
}
