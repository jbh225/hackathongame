<?php

namespace wcs\hackathonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="wcs\hackathonBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="content", type="text")
     */



    private $content;

    /**
     * @var string
     *

     * @ORM\Column(name="choice", type="text", nullable=true)
     */
    private $choice;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="questions")
     */
    private $category;
    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="question")
     */
    private $reponses;

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
     * Set content
     *
     * @param string $content
     *
     * @return Question
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set choice
     *
     * @param string $choice
     *
     * @return Question
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return string
     */
    public function getChoice()
    {
        return $this->choice;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set category
     *
     * @param \wcs\hackathonBundle\Entity\Category $category
     *
     * @return Question
     */
    public function setCategory(\wcs\hackathonBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \wcs\hackathonBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add reponse
     *
     * @param \wcs\hackathonBundle\Entity\Reponse $reponse
     *
     * @return Question
     */
    public function addReponse(\wcs\hackathonBundle\Entity\Reponse $reponse)
    {
        $this->reponses[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \wcs\hackathonBundle\Entity\Reponse $reponse
     */
    public function removeReponse(\wcs\hackathonBundle\Entity\Reponse $reponse)
    {
        $this->reponses->removeElement($reponse);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponses()
    {
        return $this->reponses;
    }
}
