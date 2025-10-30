<?php

require_once '../helpers/math_helpers.php';
require_once '../helpers/general_helpers.php';

interface Payable {
    public function pay(int $amount): void;
}

class BankAccount implements Payable {
	protected bool $allowOverdraft = false;

	public function __construct(
		private int $balance
	) {}
	
	public function deposit(int $amount): void{
		$this->balance+= $amount;
	}

	public function withdraw(int $amount): void{
		if (!$this->allowOverdraft && $amount > $this->balance) {
            echo "Ошибка: недостаточно средств";
            return;
		}

		$this->balance -= $amount;
	}

	public function getBalance(): int{
		return $this->balance;
	}

	protected function setBalance(int $amount): void {
		$this->balance = $amount;
	}

	public function pay(int $amount): void {
		$this->withdraw($amount);
		printLine("Баланс уменьшился на {$amount}");
	}
}

class SavingsAccount extends BankAccount {
	public function __construct(
		int $balance,
		private int $interest
	) {parent::__construct($balance);}

	public function applyInterest(): void{
		$this->setBalance(addTax($this->getBalance(), $this->interest));
	}
}

class CreditAccount extends BankAccount {
	protected bool $allowOverdraft = true;

	public function __construct(
		int $balance
	) {parent::__construct($balance);}
	
	// public function withdraw(int $amount): void{
	// 	$this->setBalance($this->getBalance()-$amount);
	// }

	public function pay(int $amount): void {
		$this->withdraw($amount);
		$this->getBalance()<0 ? printLine("Баланс ушел в {$this->getBalance()} (кредитный лимит)"):parent::pay($amount);
	}
}

?>