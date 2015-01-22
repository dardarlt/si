<?php


class UniqueCookie
{
    protected $name;
    
    protected $value;

    function __construct($value)
    {
        $this->value = $value;
        $this->name = $this->createName($value);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    private function createName($value)
    {
       return md5($value);
    }
}
