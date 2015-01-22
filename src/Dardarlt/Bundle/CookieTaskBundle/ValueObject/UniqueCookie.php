<?php

namespace Dardarlt\Bundle\CookieTaskBundle\ValueObject;

class UniqueCookie
{
    protected $name;
    
    protected $value;

    protected $lifetime = 3600;

    protected $prefix;

    function __construct($value)
    {
        $this->name = $this->createName($value);
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        if (!empty($this->prefix)) {
            $this->name = sprintf("%s-%s", $this->prefix, $this->name);
        }
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

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @param mixed $lifetime
     */
    public function setLifetime($lifetime)
    {
        $this->lifetime = $lifetime;
    }

    /**
     * @return mixed
     */
    public function getLifetime()
    {
        return $this->lifetime;
    }
}
