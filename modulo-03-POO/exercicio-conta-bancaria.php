<?php

/**
 * Classe de conta bancária onde:
 * o saldo é privado;
 * possui limite de até 3 saques;
 * cheque especial de 200;
 * deve guardar todas as informações de operações que foram realizadas.
 */

class Operation
{
    public function __construct(
        public float $value,
        public string $typeOperation,
        public float $specialCheckUsedValue,
    ) {}
}

class Account
{
    public int $withdrawalOperationsLimit = 3;
    protected float $specialCheck = 200;
    private array $operations = [];

    public function __construct(private float $balance = 0) {}

    public function getBalance()
    {
        return $this->balance;
    }

    public function makeWithdrawal(float $amount)
    {
        $totalBalance = $this->balance + $this->specialCheck;
        $amountIsValid = $amount <= $totalBalance;

        if (!$amountIsValid || $this->withdrawalOperationsLimit <= 0) {
            return '<br/>' . 'Operação inválida!' . '<br/>';
        }

        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $this->withdrawalOperationsLimit--;

            $newOperation = new Operation($amount, 'Saque', 0);
            array_push($this->operations, $newOperation);

            return '<br/>' . "Você sacou: $amount" . '<br/>';
        }

        $pendingAmount = $amount - $this->balance;

        $this->specialCheck -= $pendingAmount;
        $this->balance = 0;
        $this->withdrawalOperationsLimit--;

        $newOperation = new Operation($amount, 'Saque', $pendingAmount);
        array_push($this->operations, $newOperation);

        return '<br/>' . "Você sacou: $amount e usou: $pendingAmount do cheque especial." . '<br/>';
    }

    public function makeDeposit(float $amount)
    {
        $this->balance += $amount;
        return  '<br />' . "Você depositou: $amount" . '<br />';
    }

    public function getOperations()
    {
        return $this->operations;
    }

    public function getSpecialCheck()
    {
        return $this->specialCheck;
    }
}

function printBaseInformations(Account $obj)
{
    echo '<br/>Saldo: ' . $obj->getBalance();
    echo '<br/>Cheque Especial: ' . $obj->getSpecialCheck();
    echo '<br/>Operações Disponíveis: ' . $obj->withdrawalOperationsLimit;
    echo '<hr />';
}

$account = new Account(1400);
echo '<pre>';
print_r($account);
echo '<pre/>.<hr/>';

printBaseInformations($account);

echo '<br />' . $account->makeWithdrawal(250);
printBaseInformations($account);

echo '<br />' . $account->makeWithdrawal(1300);
printBaseInformations($account);

echo '<br />' . $account->makeWithdrawal(50);
printBaseInformations($account);


echo '<br />' . $account->makeWithdrawal(1);
printBaseInformations($account);

foreach ($account->getOperations() as $operation) {
    echo '<pre>';
    print_r($operation);
    echo '<pre/>';
}
