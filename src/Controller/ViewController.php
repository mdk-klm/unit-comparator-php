<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UnitService;
use App\Repository\UnitRepository;

class ViewController extends AbstractController
{


    private $unitService;
    private $unitRepository;
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
     * VoteController constructor.

     * @param UnitService $
     * 
     * @param UnitRepository $unitRepository
     */
    public function __construct(
        UnitService $unitService,
        UnitRepository $unitRepository)
    {
        $this->unitService = $unitService;
        $this->unitRepository = $unitRepository;
    }

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

     /**
     * @Route("/web/units", name="unitList")
     */
    public function displayUnitList()
    {
        return $this->render(
            'unitList.html.twig',
            [
                'links' => $this->links,
                'allUnits' => $this->unitService->displayUnits($this->unitRepository),
            ]
        );
    }
}
