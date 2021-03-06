<?php

namespace YV\MultiCurrencyBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

use YV\MultiCurrencyBundle\Model\ModelInterface\CurrencyAccountInterface;
use YV\MultiCurrencyBundle\Model\ModelInterface\CurrencyInterface;
use YV\MultiCurrencyBundle\Model\ModelInterface\AccountInterface;
use YV\MultiCurrencyBundle\Model\ModelInterface\TransactionInterface;

/**
 * 
 * @ORM\MappedSuperclass
 */
abstract class CurrencyAccount implements CurrencyAccountInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var integer $amount
     *
     * @ORM\Column(name="amount", type="integer")
     */
    protected $amount;
        
    /**
     * The account related to this currency account
     * 
     * @ORM\ManyToOne(targetEntity="Account", cascade={"all"})
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $account;
        
    /**
     * The currency related to this currency account
     * 
     * @ORM\ManyToOne(targetEntity="Currency", cascade={"all"})
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $currency;    
    
    /**
     * The transactions related to this currency account
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="currencyAccount")
     */
    protected $transactions;    
    
    /**
     * @var DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;     
    
    /**
     * Constructs a new instance of Account
     */
    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CurrencyAccount
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return CurrencyAccount
     */
    public function setAmount($amount = 0)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set account
     *
     * @param AccountInterface $account
     * @return CurrencyAccount
     */
    public function setAccount(AccountInterface $account)
    {
        $this->account = $account;
    
        return $this;
    }

    /**
     * Get account
     *
     * @return AccountInterface
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set currency
     *
     * @param CurrencyInterface $currency
     * @return CurrencyAccount
     */
    public function setCurrency(CurrencyInterface $currency)
    {
        $this->currency = $currency;
    
        return $this;
    }

    /**
     * Get currency
     *
     * @return CurrencyInterface
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Add transaction
     *
     * @param TransactionInterface $transaction
     * @return CurrencyAccount
     */
    public function addTransaction(TransactionInterface $transaction)
    {
        $this->transactions[] = $transaction;
    
        return $this;
    }

    /**
     * Get transactions
     *
     * @return ArrayCollection
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}