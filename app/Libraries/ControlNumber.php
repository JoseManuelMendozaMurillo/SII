<?php

namespace App\Libraries;

class ControlNumber
{
    // Format   -> 19630314
    // where    -> 19 -> year
    //          -> 63 -> campus number
    //          -> 0314 -> student number, consecutive

    private $year;
    private $campus;
    private $number;

    public function __construct($number = 0)
    {
        $this->year = substr(date('Y'), 2);
        $this->campus = '63';
        $this->number = $number;
    }

    public function next()
    {
        $this->number++;
        $num = strval($this->number);

        for ($i = 0; $i < (4 - strlen(strval($this->number))); $i++) {
            $num = '0' . $num;
        }

        return $this->year . $this->campus . $num;
    }

    public function resetNumber($number = 0)
    {
        $this->number = $number;
    }

    public function returnOne()
    {
        $this->number--;
    }
}
