<?php
/**
 * This is
 * Rate controller.
 */

namespace App\Controller;

use App\Repository\RateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RateController.
 *
 * @Route("/rate")
 */
class RateController extends AbstractController
{
    /**
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
