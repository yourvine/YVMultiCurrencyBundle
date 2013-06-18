<?php

namespace YV\MultiCurrencyBundle\Event;

class PostChangeAmountEvent extends ChangeAmountEvent
{
    protected $success;
    
    public function __construct(CurrencyInterface $currency, UserInterface $user, $amount, $title, $success = false)
    {
        parent::__construct($currency, $user, $amount, $title);
        
        $this->success = $success;
    }
    
    public function getSuccess()
    {
        return $this->success;
    }
}
