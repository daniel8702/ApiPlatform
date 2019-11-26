<?php


namespace App\Entity;


use Doctrine\Common\Collections\Collection;

interface PostInterface
{
    public function getId(): int;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getDateTime(): \DateTime;

    public function setDateTime(\DateTime $dateTime): void;

    public function getUserPost(): UserApiInterface;

    public function setUserPost(UserApiInterface $userPost): void;

}
