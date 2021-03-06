<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\ProgramOfInterest;
use AppBundle\Entity\ProgramType;
use AppBundle\Entity\DesiredIntake;

/**
 * Candidate
 * 
 * @ORM\Table(name = "candidate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CandidateRepository")
 */
class Candidate {

    /**
     * @var int
     *    
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string")
     */
    protected $name;
    
    /** 
     * Many Candidates have One ProgramOfInterest.
     * @ORM\ManyToOne(targetEntity="ProgramOfInterest", inversedBy="candidates")
     * @ORM\JoinColumn(name="program_of_interest", referencedColumnName="id")
     */
    protected $programofinterest;
    
    /**
     * Many Candidates have One ProgramType.
     * @ORM\ManyToOne(targetEntity="ProgramType", inversedBy="candidates")
     * @ORM\JoinColumn(name="program_type", referencedColumnName="id")
     */
    protected $programtype;
    
    /**
     * Many Candidates have One DesiredIntake.
     * @ORM\ManyToOne(targetEntity="DesiredIntake", inversedBy="candidates")
     * @ORM\JoinColumn(name="desired_intake", referencedColumnName="id")
     */
    protected $desiredintake;

    /**
     * @var int
     * 
     * @ORM\Column(name="intake_year", type="integer")
     */
    protected $intakeyear;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Candidate
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set programofinterest
     *
     * @param \AppBundle\Entity\ProgramOfInterest $programofinterest
     * @return Candidate
     */
    public function setProgramofinterest(\AppBundle\Entity\ProgramOfInterest $programofinterest = null)
    {
        $this->programofinterest = $programofinterest;

        return $this;
    }

    /**
     * Get programofinterest
     *
     * @return \AppBundle\Entity\ProgramOfInterest 
     */
    public function getProgramofinterest()
    {
        return $this->programofinterest;
    }

    /**
     * Set programtype
     *
     * @param \AppBundle\Entity\ProgramType $programtype
     * @return Candidate
     */
    public function setProgramtype(\AppBundle\Entity\ProgramType $programtype = null)
    {
        $this->programtype = $programtype;

        return $this;
    }

    /**
     * Get programtype
     *
     * @return \AppBundle\Entity\ProgramType 
     */
    public function getProgramtype()
    {
        return $this->programtype;
    }

    /**
     * Set desiredintake
     *
     * @param \AppBundle\Entity\DesiredIntake $desiredintake
     * @return Candidate
     */
    public function setDesiredintake(\AppBundle\Entity\DesiredIntake $desiredintake = null)
    {
        $this->desiredintake = $desiredintake;

        return $this;
    }

    /**
     * Get desiredintake
     *
     * @return \AppBundle\Entity\DesiredIntake 
     */
    public function getDesiredintake()
    {
        return $this->desiredintake;
    }

    /**
     * Set intakeyear
     *
     * @param integer $intakeyear
     * @return Candidate
     */
    public function setIntakeyear($intakeyear)
    {
        $this->intakeyear = $intakeyear;

        return $this;
    }

    /**
     * Get intakeyear
     *
     * @return integer 
     */
    public function getIntakeyear()
    {
        return $this->intakeyear;
    }
}
