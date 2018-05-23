<?php

namespace Framework;

class Request
{
    private $get = []; // $_GET
    
    private $post = []; // $_POST
    
    private $server = []; // $_SERVER
    
    public function __construct(array $get = [], array $post = [], array $server = [])
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }
    
    public function get($key, $default = null)
    {
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }
    
    public function post($key, $default = null)
    {
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }
    
    public function server($key, $default = null)
    {
        return isset($this->server[$key]) ? $this->server[$key] : $default;
    }
    
    public function getUrl()
    {
        $url = $this->server('REQUEST_URI');
        
        if (!$url) {
            return null;
        }
        $url = explode('?', $url);
        
        return $url[0];
    }
    
    public function isPost()
    {
        return (bool) $this->post;
    }
    
    public function mergeGetWithArray(array $arr)
    {
        $_GET += $arr;
        $this->get += $arr;
    }
}