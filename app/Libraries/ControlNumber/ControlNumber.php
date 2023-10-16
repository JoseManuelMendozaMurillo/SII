<?php

namespace App\Libraries\ControlNumber;

class ControlNumber
{
    // Format   -> 19630314
    // where    -> 19 -> year
    //          -> 63 -> campus number
    //          -> 0314 -> student number, consecutive

    private $year;
    private $campus;
    private $number;
    private static $instances = [];

    public function __construct($number = 0)
    {
        $this->year = substr(date('Y'), 2);
        $this->campus = '63';

        $db = \Config\Database::connect();
        $query = $db->query('SELECT id, username FROM users where username like "' . $this->year . $this->campus . '%"');
        $results = $query->getResult();

        $last = end($results);
        $str = substr($last->username, 4);
        $inte = (int) $str;

        $this->number = $inte;
    }

    public function currentNumber()
    {
        return $this->number;
    }

    protected function __clone()
    {
    }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception('Cannot unserialize a singleton.');
    }

    public static function getInstance(): ControlNumber
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
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
