<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('pages/about.html.twig');
    }

    #[Route('/analyses', name: 'app_analyses')]
    public function analyses(): Response
    {
        return $this->render('pages/placeholder.html.twig', ['title' => 'Analyses']);
    }

    #[Route('/histoire', name: 'app_histoire')]
    public function histoire(): Response
    {
        return $this->render('pages/placeholder.html.twig', ['title' => 'Histoire']);
    }

    #[Route('/theorie', name: 'app_theorie')]
    public function theorie(): Response
    {
        return $this->render('pages/placeholder.html.twig', ['title' => 'Théorie']);
    }

    #[Route('/archives', name: 'app_archives')]
    public function archives(): Response
    {
        return $this->render('pages/placeholder.html.twig', ['title' => 'Archives']);
    }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('pages/placeholder.html.twig', ['title' => 'FAQ']);
    }

    #[Route('/cahiers', name: 'app_cahiers')]
    public function cahiers(): Response
    {
        return $this->render('pages/placeholder.html.twig', ['title' => 'Cahiers Politiques']);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return new Response('<html><body><h1>Espace Administration</h1><p>Bienvenue, administrateur.</p></body></html>');
    }

    #[Route('/admin/article/new', name: 'admin_article_new')]
    public function adminArticleNew(): Response
    {
        return $this->render('admin/article/new.html.twig');
    }
}
