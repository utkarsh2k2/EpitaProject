<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Candidate;

/**
 * DesiredIntake
 * 
 * @ORM\Table(name = "desired_intake")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DesiredIntakeRepository")
 */
class DesiredIntake {

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
     * @var string
     * 
     * @ORM\Column(name="comments", type="string", nullable=true)
     */
    protected $comments;
    
    /**
     * One DesiredIntake has Many Candidates.
     * @ORM\OneToMany(targetEntity="Candidate", mappedBy="desiredintake")
     */
    private $candidates;
    
    /**
     * One DesiredIntake has Many ProgramTypeChoiceRules.
     * @ORM\OneToMany(targetEntity="ProgramTypeChoiceRule", mappedBy="desiredintake")
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
     * @return ProgramType
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
     * @return ProgramType
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
     * @return ProgramType
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
     * @return ProgramType
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
     * Set comments
     *
     * @param string $comments
     * @return DesiredIntake
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add programtypechoicerules
     *
     * @param \AppBundle\Entity\ProgramTypeChoiceRule $programtypechoicerules
     * @return DesiredIntake
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
