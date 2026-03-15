<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileUpdateType;
use App\Form\UserCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/profile', name: 'admin_profile')]
    public function profile(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        
        // Profile Update Form
        $profileForm = $this->createForm(ProfileUpdateType::class, $user);
        $profileForm->handleRequest($request);

        if ($profileForm->isSubmitted() && $profileForm->isValid()) {
            $plainPassword = $profileForm->get('plainPassword')->getData();
            if ($plainPassword) {
                $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
            }
            
            $entityManager->flush();
            $this->addFlash('success', 'Profil mis à jour avec succès.');
            return $this->redirectToRoute('admin_profile');
        }

        // User Creation Form
        $newUser = new User();
        $userForm = $this->createForm(UserCreateType::class, $newUser);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $plainPassword = $userForm->get('plainPassword')->getData();
            $newUser->setPassword($passwordHasher->hashPassword($newUser, $plainPassword));
            $newUser->setRoles(['ROLE_ADMIN']);
            
            $entityManager->persist($newUser);
            $entityManager->flush();
            
            $this->addFlash('success', 'Nouvel utilisateur créé avec succès.');
            return $this->redirectToRoute('admin_profile');
        }

        return $this->render('admin/profile.html.twig', [
            'profileForm' => $profileForm->createView(),
            'userForm' => $userForm->createView(),
            'users' => $entityManager->getRepository(User::class)->findAll(),
        ]);
    }
}
