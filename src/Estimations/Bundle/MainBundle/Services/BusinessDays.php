<?php

namespace Estimations\Bundle\MainBundle\Services;

use \DateTime;

class BusinessDays
{
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    const SUNDAY = 7;

    public function __construct()
    {

    }


    /**
     * TODO: przesunąć do parameters
     **/

    public function getEndDate($startDate, $numberOfDays)
    {
        $nonBusinessDays = array(
            $this::SATURDAY,
            $this::SUNDAY
        );
        $holidays = array(
            "2015/01/01",
            "2015/01/06",
            "2015/05/01",
            "2015/05/03",
            "2015/08/15",
            "2015/11/01",
            "2015/11/11",
            "2015/12/25",
            "2015/12/26",
            "2016/01/01",
            "2016/01/06",
            "2016/05/01",
            "2016/05/03",
            "2016/08/15",
            "2016/11/01",
            "2016/11/11",
            "2016/12/25",
            "2016/12/26"
        );

        $endDate = $this->addBusinessDays($startDate, $numberOfDays, $holidays, $nonBusinessDays);

        return $endDate;
    }

    protected function addBusinessDays($startDate, $numberOfDays, $holidays, $nonBusinessDays)
    {
        $date = date_create_from_format('Y/m/d', $startDate);
        $i = 0;
        while ($i < $numberOfDays) {
            $date->modify("+1 day");
            if ($this->isBusinessDay($date, $holidays, $nonBusinessDays)) {
                $i++;
            }
        }
        return $date;
    }

    protected function isBusinessDay(DateTime $date, $holidays, $nonBusinessDays)
    {
        if (in_array((int)$date->format('N'), $nonBusinessDays)) {
            return false; //Date is a nonBusinessDay.
        }
        foreach ($holidays as $day) {
            $timeStamp = date_create_from_format('Y/m/d', $day);
            if ($date->format('Y/m/d') == $timeStamp->format('Y/m/d')) {
                return false; //Date is a holiday.
            }
        }
        return true; //Date is a business day.
    }
}