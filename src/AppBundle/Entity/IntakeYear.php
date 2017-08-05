<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IntakeYear
 * 
 * @ORM\Table(name = "intake_year")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IntakeYearRepository")
 */
class IntakeYear {

    /**
     * @var int
     *    
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var bool
     * 
     * @ORM\Column(name="enabled", type="boolean")
     */
    protected $enabled = true;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="start_day", type="integer")
     */
    protected $startday;

    /**
     * @var int
     * 
     * @ORM\Column(name="start_month", type="integer")
     */
    protected $startmonth;
            
    /**
     * @var int
     * 
     * @ORM\Column(name="start_year", type="integer")
     */
    protected $startyear;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="end_day", type="integer")
     */
    protected $endday;

    /**
     * @var int
     * 
     * @ORM\Column(name="end_month", type="integer")
     */
    protected $endmonth;
            
    /**
     * @var int
     * 
     * @ORM\Column(name="end_year", type="integer")
     */
    protected $endyear;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="true_year", type="integer")
     */
    protected $trueyear;
            
    /**
     * @var int
     * 
     * @ORM\Column(name="false_year", type="integer")
     */
    protected $falseyear;

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
     * Set enabled
     *
     * @param boolean $enabled
     * @return IntakeYear
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
     * Set startday
     *
     * @param integer $startday
     * @return IntakeYear
     */
    public function setStartday($startday)
    {
        $this->startday = $startday;

        return $this;
    }

    /**
     * Get startday
     *
     * @return integer 
     */
    public function getStartday()
    {
        return $this->startday;
    }

    /**
     * Set startmonth
     *
     * @param integer $startmonth
     * @return IntakeYear
     */
    public function setStartmonth($startmonth)
    {
        $this->startmonth = $startmonth;

        return $this;
    }

    /**
     * Get startmonth
     *
     * @return integer 
     */
    public function getStartmonth()
    {
        return $this->startmonth;
    }

    /**
     * Set startyear
     *
     * @param integer $startyear
     * @return IntakeYear
     */
    public function setStartyear($startyear)
    {
        $this->startyear = $startyear;

        return $this;
    }

    /**
     * Get startyear
     *
     * @return integer 
     */
    public function getStartyear()
    {
        return $this->startyear;
    }

    /**
     * Set endday
     *
     * @param integer $endday
     * @return IntakeYear
     */
    public function setEndday($endday)
    {
        $this->endday = $endday;

        return $this;
    }

    /**
     * Get endday
     *
     * @return integer 
     */
    public function getEndday()
    {
        return $this->endday;
    }

    /**
     * Set endmonth
     *
     * @param integer $endmonth
     * @return IntakeYear
     */
    public function setEndmonth($endmonth)
    {
        $this->endmonth = $endmonth;

        return $this;
    }

    /**
     * Get endmonth
     *
     * @return integer 
     */
    public function getEndmonth()
    {
        return $this->endmonth;
    }

    /**
     * Set endyear
     *
     * @param integer $endyear
     * @return IntakeYear
     */
    public function setEndyear($endyear)
    {
        $this->endyear = $endyear;

        return $this;
    }

    /**
     * Get endyear
     *
     * @return integer 
     */
    public function getEndyear()
    {
        return $this->endyear;
    }

    /**
     * Set trueyear
     *
     * @param integer $trueyear
     * @return IntakeYear
     */
    public function setTrueyear($trueyear)
    {
        $this->trueyear = $trueyear;

        return $this;
    }

    /**
     * Get trueyear
     *
     * @return integer 
     */
    public function getTrueyear()
    {
        return $this->trueyear;
    }

    /**
     * Set falseyear
     *
     * @param integer $falseyear
     * @return IntakeYear
     */
    public function setFalseyear($falseyear)
    {
        $this->falseyear = $falseyear;

        return $this;
    }

    /**
     * Get falseyear
     *
     * @return integer 
     */
    public function getFalseyear()
    {
        return $this->falseyear;
    }
}
