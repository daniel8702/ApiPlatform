<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;

interface UserApiInterface
{
    public function getId(): int;

    public function getName(): string;

    public function setName(string $name): void;

    public function getEmail(): string;

    public function setEmail(string $email): void;

    public function getPassword(): string;

    public function setPassword(string $password): void;

    public function addPost(PostInterface $post): void;

    public function removePost(PostInterface $post): void;

    public function getPost(): Collection;
}
