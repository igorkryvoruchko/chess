<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 28.04.18
 * Time: 22:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\ChessMatch;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController
{
    /**
     * @Get("/api/list/")
     */
    public function getAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(ChessMatch::class)->findAll();

        return $repository;
    }

    /**
     * @Post("/api/set/")
     */
    public function setMatchAction(Request $request)
    {
        $playears = $request->query->get('playears');
        $winner = $request->query->get('winner');
        $log = $request->query->get('log');
        $start = $request->query->get('start');
        $finish = $request->query->get('finish');

        $match = new ChessMatch();
        $match->setPlayears($playears);
        $match->setWinner($winner);
        $match->setLog($log);
        $match->setStart($start);
        $match->setFinish($finish);


        $em = $this->getDoctrine()->getManager();
        $em->persist($match);
        $em->flush();
    }
}