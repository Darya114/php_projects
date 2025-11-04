<?php

require_once '../helpers/math_helpers.php';
require_once '../helpers/general_helpers.php';

interface Payable {
    public function pay(float $amount): void;
}

class BankAccount implements Payable {
	protected bool $allowOverdraft = false;

	public function __construct(
		private float $balance
	) {}
	
	public function deposit(float $amount): void{
		$this->balance+= $amount;
	}

	public function withdraw(float $amount): void{
		if (!$this->allowOverdraft && $amount > $this->balance) {
            echo "Ошибка: недостаточно средств";
            return;
		}

		$this->balance -= $amount;
	}

	public function getBalance(): float{
		return $this->balance;
	}

	protected function setBalance(float $amount): void {
		$this->balance = $amount;
	}

	public function pay(float $amount): void {
		$this->withdraw($amount);
		printLine("Баланс уменьшился на {$amount}");
	}
}

class SavingsAccount extends BankAccount {
	public function __construct(
		float $balance,
		private int $interest
	) {parent::__construct($balance);}

	public function applyInterest(): void{
		$this->setBalance(addTax($this->getBalance(), $this->interest));
	}
}

class CreditAccount extends BankAccount {
	protected bool $allowOverdraft = true;

	public function __construct(
		float $balance
	) {parent::__construct($balance);}
	
	// public function withdraw(int $amount): void{
	// 	$this->setBalance($this->getBalance()-$amount);
	// }

	public function pay(float $amount): void {
		if ($this->getBalance() >= $amount) {
			parent::pay($amount);
			return;
		}

		$this->withdraw($amount);
		printLine("Баланс ушел в {$this->getBalance()} (кредитный лимит)");
	}
}

?>