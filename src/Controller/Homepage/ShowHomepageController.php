<?php

namespace App\Controller\Homepage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Routing\Annotation\Route;

class ShowHomepageController extends AbstractController
{
    public function index()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../../.env');

        $version = $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));
        return $this->render('homepage/show_homepage/index.html.twig', [
            'controller_name' => 'ShowHomepageController',
            'app_version' => version,
        ]);
    }
}
