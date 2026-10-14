<?php

class ContaBancaria {
    public $titular;
    protected $saldo;

    public function __construct($titular, $saldo = 0) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        if ($valor <= 0) {
            echo "O deposito precisa ser maior que zero.<br>";
            return false;
        }
        $this->saldo += $valor;
        echo "Deposito de R$ " . number_format($valor, 2, ',', '.') . " realizado.<br>";
        return true;
    }

    public function sacar($valor) {
        if ($valor <= 0) {
            echo "O saque precisa ser maior que zero.<br>";
            return false;
        }
        if ($valor > $this->saldo) {
            echo "Saque recusado: saldo insuficiente.<br>";
            return false;
        }
        $this->saldo -= $valor;
        echo "Saque de R$ " . number_format($valor, 2, ',', '.') . " realizado.<br>";
        return true;
    }

    public function consultarSaldo() {
        echo "Saldo de {$this->titular}: R$ " . number_format($this->saldo, 2, ',', '.') . "<br>";
    }
}

class ContaCorrente extends ContaBancaria {
    public $limite;

    public function __construct($titular, $saldo, $limite) {
        parent::__construct($titular, $saldo);
        $this->limite = $limite;
    }

    public function usarLimite($valor) {
        if ($valor <= 0 || $valor > $this->limite) {
            echo "Valor fora do limite disponivel.<br>";
            return false;
        }
        $this->limite -= $valor;
        echo "Limite usado: R$ " . number_format($valor, 2, ',', '.') . ". Limite restante: R$ " .
             number_format($this->limite, 2, ',', '.') . "<br>";
        return true;
    }
}

class ContaPoupanca extends ContaBancaria {
    public $taxaRendimento;

    public function __construct($titular, $saldo, $taxaRendimento) {
        parent::__construct($titular, $saldo);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $rendimento = $this->saldo * ($this->taxaRendimento / 100);
        $this->saldo += $rendimento;
        echo "Rendimento aplicado: R$ " . number_format($rendimento, 2, ',', '.') . "<br>";
    }
}

$conta = new ContaCorrente("Carlos Silva", 1000, 500);
$conta->consultarSaldo();
$conta->depositar(500);
$conta->sacar(200);
$conta->consultarSaldo();

echo "<h3>Teste de saque inválido</h3>";
$conta->sacar(2000);
$conta->consultarSaldo(); 

echo "<h3>Exemplo de poupança</h3>";
$poupanca = new ContaPoupanca("Beatriz Alves", 1000, 0.5);
$poupanca->aplicarRendimento();
$poupanca->consultarSaldo();
