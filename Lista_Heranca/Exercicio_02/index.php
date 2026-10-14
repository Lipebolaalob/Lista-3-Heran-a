<?php

class Funcionario {
    public $nome;
    public $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario() {
        echo "Nome: {$this->nome}<br>CPF: {$this->cpf}<br>Salario: R$ " .
             number_format($this->salario, 2, ',', '.') . "<br>";
    }
}

class Gerente extends Funcionario {
    public $setor;

    public function __construct($nome, $cpf, $salario, $setor) {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao() {
        echo "{$this->nome} está realizando uma reuniao do setor {$this->setor}.<br>";
    }
}

class Desenvolvedor extends Funcionario {
    public $linguagem;

    public function __construct($nome, $cpf, $salario, $linguagem) {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar() {
        echo "{$this->nome} está programando em {$this->linguagem}.<br>";
    }
}

$gerente = new Gerente("Marina Souza", "111.222.333-44", 6500, "Tecnologia");
$dev = new Desenvolvedor("Caio Lima", "555.666.777-88", 4800, "PHP");

echo "<h2>Gerente</h2>";
$gerente->exibirFuncionario();
$gerente->realizarReuniao();

echo "<h2>Desenvolvedor</h2>";
$dev->exibirFuncionario();
$dev->programar();
