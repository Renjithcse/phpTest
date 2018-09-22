<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        $this->balance =$this->balance->value() + $amount->value();
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        if((int)(string)$this->balance>$amount->value())
        {
            $this->balance =(int)(string)$this->balance - $amount->value();
            $account->balance =(int)(string)$account->balance + $amount->value();
        }
        else
        {
            throw new Exception("Withdrawl amount larger than balance");
        }
    }
    public function withdraw(Money $amount)
    {
        if((int)(string)$this->balance>(int)(string)$amount)
        {
            $this->balance =(int)(string)$this->balance - (int)(string)$amount;
        }
        else
        {
            throw new Exception("Withdrawl amount larger than balance");
        }
    }
}