<?php
require_once "bootstrap.php";

use App\Entity\User;
use App\Entity\Post;
use App\DataFixtures\UserFixtures;

// $user = new User();
// $user->setName("Анна");
// $user->setEmail("anna@example.com");

// $entityManager->persist($user);
// $entityManager->flush();

// echo "Пользователь создан с ID: " . $user->getId() . "\n";

// $userRepository = $entityManager->getRepository(User::class);
// $user = $userRepository->findByEmail("anna@example.com");
// print_r($user);


// $user = $entityManager->getRepository(User::class)->find(1);
// $post = new Post();
// $post->setTitle('Мой первый пост');
// $post->setContent('Текст поста...');
// $post->setUser($user); // обязательно присваиваем пользователя
// $entityManager->persist($post);
// $entityManager->flush();



// $post = $entityManager->getRepository(Post::class)->find(1);
// echo $post->getUser()->getName();  


// $fixture = new UserFixtures();
// $fixture->load($entityManager);


