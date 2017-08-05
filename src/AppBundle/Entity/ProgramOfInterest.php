<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Candidate;

/**
 * ProgramOfInterest
 * 
 * @ORM\Table(name = "program_of_interest")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgramOfInterestRepository")
 */
class ProgramOfInterest {

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
     * @ORM\Column(name="description", type="string")
     */
    protected $description;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    protected $value;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="enabled", type="boolean")
     */
    protected $enabled = true;
    
    /**
     * One ProgramOfInterest has Many Candidates.
     * @ORM\OneToMany(targetEntity="Candidate", mappedBy="programofinterest")
     */
    private $candidates;
    
    /**
     * One ProgramOfInterest has Many ProgramTypeChoiceRules.
     * @ORM\OneToMany(targetEntity="ProgramTypeChoiceRule", mappedBy="programofinterest")
     */
    private $programtypechoicerules;

    public function __construct() {
        $this->candidates = new ArrayCollection();
        $this->programtypechoicerules = new ArrayCollection();
    }

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
     * Set description
     *
     * @param string $description
     * @return ProgramOfInterest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return ProgramOfInterest
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Add candidates
     *
     * @param \AppBundle\Entity\Candidate $candidates
     * @return ProgramOfInterest
     */
    public function addCandidate(\AppBundle\Entity\Candidate $candidates)
    {
        $this->candidates[] = $candidates;

        return $this;
    }

    /**
     * Remove candidates
     *
     * @param \AppBundle\Entity\Candidate $candidates
     */
    public function removeCandidate(\AppBundle\Entity\Candidate $candidates)
    {
        $this->candidates->removeElement($candidates);
    }

    /**
     * Get candidates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCandidates()
    {
        return $this->candidates;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return ProgramOfInterest
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Add programtypechoicerules
     *
     * @param \AppBundle\Entity\ProgramTypeChoiceRule $programtypechoicerules
     * @return ProgramOfInterest
     */
    public function addProgramtypechoicerule(\AppBundle\Entity\ProgramTypeChoiceRule $programtypechoicerules)
    {
        $this->programtypechoicerules[] = $programtypechoicerules;

        return $this;
    }

    /**
     * Remove programtypechoicerules
     *
     * @param \AppBundle\Entity\ProgramTypeChoiceRule $programtypechoicerules
     */
    public function removeProgramtypechoicerule(\AppBundle\Entity\ProgramTypeChoiceRule $programtypechoicerules)
    {
        $this->programtypechoicerules->removeElement($programtypechoicerules);
    }

    /**
     * Get programtypechoicerules
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgramtypechoicerules()
    {
        return $this->programtypechoicerules;
    }
}
