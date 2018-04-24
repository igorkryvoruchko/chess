<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChessMatch
 *
 * @ORM\Table(name="chess_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChessMatchRepository")
 */
class ChessMatch
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finish", type="datetime")
     */
    private $finish;

    /**
     * @var string
     *
     * @ORM\Column(name="playears", type="string", length=255)
     */
    private $playears;

    /**
     * @var string
     *
     * @ORM\Column(name="winner", type="string", length=255)
     */
    private $winner;

    /**
     * @var string
     *
     * @ORM\Column(name="log", type="text")
     */
    private $log;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return ChessMatch
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set finish
     *
     * @param \DateTime $finish
     *
     * @return ChessMatch
     */
    public function setFinish($finish)
    {
        $this->finish = $finish;

        return $this;
    }

    /**
     * Get finish
     *
     * @return \DateTime
     */
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * Set playears
     *
     * @param string $playears
     *
     * @return ChessMatch
     */
    public function setPlayears($playears)
    {
        $this->playears = $playears;

        return $this;
    }

    /**
     * Get playears
     *
     * @return string
     */
    public function getPlayears()
    {
        return $this->playears;
    }

    /**
     * Set winner
     *
     * @param string $winner
     *
     * @return ChessMatch
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return string
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set log
     *
     * @param string $log
     *
     * @return ChessMatch
     */
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log
     *
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }
}

