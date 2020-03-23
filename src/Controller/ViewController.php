<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    private $links = [
        [
            'route' => '/',
            'name' => 'Home',
        ],
        [
            'route' => '/web/units',
            'name' => 'Units',
        ],
        [
            'route' => '/web/convert',
            'name' => 'Convert',
        ],
    ];
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render(
            'index.html.twig',
            [
                'links' => $this->links,
            ]
        );
    }

    /**
     * @Route("/web/convert", name="convert")
     */
    public function convert()
    {
        return $this->render(
            'convert.html.twig',
            [
                'links' => $this->links,
            ]
        );
    }
}
