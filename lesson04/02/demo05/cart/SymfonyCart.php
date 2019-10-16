<?php

namespace lesson04\example02\demo05\cart;

use Symfony\Component\HttpFoundation\Session\Session;

class SymfonyCart extends Cart
{
    private $session;
    private $sessionKey;

    public function __construct(Session $session, $sessionKey = 'cart')
    {
        $this->session = $session;
        $this->sessionKey = $sessionKey;
    }
    
    protected function loadItems()
    {
        if ($this->items === null) {
            $this->items = $this->session->get($this->sessionKey, []);
        }
    }

    protected function saveItems()
    {
        $this->session->set($this->sessionKey, $this->items);
    }
} 