<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ChessMatch;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(ChessMatch::class)->findAll();

        return $this->render('AppBundle:Default:main.html.twig', [
            'repository' => $repository
        ]);
    }
}
