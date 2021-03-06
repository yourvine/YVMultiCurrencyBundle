<?php

namespace YV\MultiCurrencyBundle\Event;

use YV\MultiCurrencyBundle\Model\ModelInterface\CurrencyInterface;
use YV\MultiCurrencyBundle\Model\ModelInterface\UserInterface;

class PostChangeAmountEvent extends ChangeAmountEvent
{
    protected $success;
    
    public function __construct(CurrencyInterface $currency, UserInterface $user, $amount, $title, $options = array(), $success = false)
    {
        parent::__construct($currency, $user, $amount, $title, $options);
        
        $this->success = $success;
    }
    
    public function getSuccess()
    {
        return $this->success;
    }
}
