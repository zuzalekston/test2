<?php
/**
 * Rate controller.
 */

namespace App\Controller;

use App\Repository\RateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RateController
 * @package App\Controller
 * @Route("/rate")
 */
class RateController extends AbstractController
{
    /**
     * @param Request $request
     * @param RateRepository $rateRepository
     * @return Response
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="rating_index",
     * )
     */
    public function index(Request $request, RateRepository $rateRepository): Response
    {
        return $this->render(
            'rating/index.html.twig',
        );
    }
}