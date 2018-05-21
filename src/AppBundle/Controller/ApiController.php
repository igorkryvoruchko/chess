<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 28.04.18
 * Time: 22:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\ChessMatch;
use AppBundle\Entity\Players;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends FOSRestController
{
    /**
     * @Get("/api/list/")
     */
    public function listAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(ChessMatch::class)->findAll();

        return $repository;
    }

    /**
     * @Get("/api/list/id/")
     */
    public function listIdAction(Request $request)
    {
        $id = $request->query->get('id');
        $repository = $this->getDoctrine()->getRepository(ChessMatch::class)->find($id);

        return $repository;
    }

    /**
     * @Post("/api/set/match/")
     */
    public function setMatchAction(Request $request)
    {
        $player = $request->request->get('player');
        $winner = $request->request->get('winner');
        $log = $request->request->get('log');
        $start = new \DateTime($request->get('start'));
        $finish = new \DateTime($request->get('finish'));

        $match = new ChessMatch();
        $match->setPlayer($player);
        $match->setWinner($winner);
        $match->setLog($log);
        $match->setStart($start);
        $match->setFinish($finish);


        $em = $this->getDoctrine()->getManager();
        $em->persist($match);
        $em->flush();
        return "Match is set successfully! Great gob!";
    }


    /**
     * @Delete("/api/delete_match/")
     */
    public function deleteMatchAction(Request $request)
    {
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $match = $em->getRepository(ChessMatch::class)->find($id);

        $em->remove($match);
        $em->flush();

        return "Match $id is deleted!";
    }

    /**
     * @Get("/api/get_player_rating")
     */
    public function getPlayerRatingAction(Request $request)
    {
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $rating = $em->getRepository(Players::class)->find($id);
        return $rating->getRating();
    }

    /**
     * @Get("/api/matches_by_player")
     */
    public function getMatchesByPlayerAction(Request $request)
    {
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository(ChessMatch::class)->findMatchesByPlayer($id);

        return $result;
    }


}