<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use \Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, UserApiInterface
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var Collection|PostInterface[] */
    private $post;

    public function __construct()
    {
        $this->post = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function addPost(PostInterface $post): void
    {
        $post->setUserPost($this);
        $this->post->add($post);
    }

    public function removePost(PostInterface $post): void
    {
        $post->removeUserPost($this);
        $this->post->removeElement($post);
    }

    public function getPost(): Collection
    {
        return $this->post;
    }


    public function getRoles()
    {
        return ['ROLE_USER'];
    }


    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->name;
    }

    public function eraseCredentials()
    {
    }
}
