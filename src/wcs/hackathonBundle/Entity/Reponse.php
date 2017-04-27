<?php

namespace wcs\hackathonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="wcs\hackathonBundle\Repository\ReponseRepository")
 */
class Reponse
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
     * @var string
     *
     * @ORM\Column(name="answer", type="string", length=255)
     */
    private $answer;
    /**
     * @var string
     *
     * @ORM\Column(name="choice", type="string", length=255)
     */
    private $choice;

    /**
     * @return mixed
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * @param mixed $choice
     */
    public function setChoice($choice)
    {

        $this->choice = $choice;

    }

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="reponses")
     */

    private $question;


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
     * Set answer
     *
     * @param string $answer
     *
     * @return Reponse
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set question
     *
     * @param \wcs\hackathonBundle\Entity\Question $question
     *
     * @return Reponse
     */
    public function setQuestion(\wcs\hackathonBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \wcs\hackathonBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
