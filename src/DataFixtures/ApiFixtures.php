<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
        $this->loadPosts($manager);
    }

    public function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@bitbag.pl');
        $user->setName('test');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'secret'
        ));
        $manager->persist($user);
        $manager->flush();
    }

    public function loadPosts(ObjectManager $manager)
    {
        $userRepository = $manager->getRepository(User::class);
        $user = $userRepository->findOneBy(['name' => 'test']);

        $post = new Post();
        $post->setDateTime(new \DateTime('now'));
        $post->setDescription('Some description');
        $post->setUserPost($user);

        $manager->persist($post);
        $manager->flush();
    }
}
