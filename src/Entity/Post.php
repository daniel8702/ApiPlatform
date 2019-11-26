<?php

declare(strict_types=1);

namespace App\Entity;

class Post implements PostInterface
{
    /** @var int */
    private $id;

    /** @var string */
    private $description;

    /** @var \DateTime */
    private $dateTime;

    /** @var UserApiInterface */
    private $userPost;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime(\DateTime $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @param UserApiInterface $userPost
     */
    public function setUserPost(UserApiInterface $userPost): void
    {
        $this->userPost = $userPost;
    }

    /**
     * @return UserApiInterface
     */
    public function getUserPost(): UserApiInterface
    {
        return $this->userPost;
    }
}
