<?php

namespace AppBundle\Library;

/**
 * This class is a utility function which calculates intake year 
 */
class GetIntakeYear {

    public function __construct() {
        
    }

    /**
     * This function returns the Intake year based on $intakeyear id.
     * @param type $intakeyear
     * @return date object $year
     */
    public function getIntakeYear($intakeyear) {

        $currentdate = date('Y-m-d');
        $currentyear = date('Y');
        $nextyear = date('Y', strtotime('+1 year'));

        $startday = $intakeyear->getStartday();
        $startmonth = $intakeyear->getStartmonth();
        $startyear = $this->getYearbyNumber($intakeyear->getStartyear(), $currentyear, $nextyear);
        $startdate = date('Y-m-d', strtotime($startyear . '-' . $startmonth . '-' . $startday));

        $endday = $intakeyear->getEndday();
        $endmonth = $intakeyear->getEndmonth();
        $endyear = $this->getYearbyNumber($intakeyear->getEndyear(), $currentyear, $nextyear);
        $enddate = date('Y-m-d', strtotime($endyear . '-' . $endmonth . '-' . $endday));

        if ($currentdate >= $startdate && $currentdate <= $enddate) {
            $year = $this->getYearByNumber($intakeyear->getTrueyear(), $currentyear, $nextyear);
        } else {
            $year = $this->getYearByNumber($intakeyear->getFalseyear(), $currentyear, $nextyear);
        }
        return $year;
    }

    /**
     * This function returns the Intake year based on the passed number $num
     * @param integer $num
     * @param Date Object $currentyear
     * @param Date Object $nextyear
     * @return Date Object $startyear
     */
    public function getYearByNumber($num, $currentyear, $nextyear) {

        if ($num == 1) {
            $startyear = $currentyear;
        } else if ($num == 2) {
            $startyear = $nextyear;
        }
        return $startyear;
    }

}
