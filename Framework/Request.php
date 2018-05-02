<?php

namespace Framework;

class Request
{
    private $get = []; // $_GET
    
    private $post = []; // $_POST
    
    public function __construct(array $get = [], array $post = [])
    {
        $this->get = $get;
        $this->post = $post;
    }
    
    public function get($key, $default = null)
    {
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }
    
    public function post($key, $default = null)
    {
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }
    
    public function isPost()
    {
        return (bool) $this->post;
    }
}