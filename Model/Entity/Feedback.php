<?php

namespace Model\Entity;

class Feedback
{
    private $id;

    private $email;

    private $name;

    private $message;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return Feedback
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Feedback
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Feedback
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Feedback
     */
    public function setMessage($message)
    {
        $this->message = $message;
        
        return $this;
    }
}