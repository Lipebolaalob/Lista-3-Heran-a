<?php

class Pessoa {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Meu nome é {$this->nome} e meu email é {$this->email}.<br>";
    }
}

class Funcionario extends Pessoa {
    public $salario;
    public $matricula;

    public function __construct($nome, $email, $salario, $matricula) {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    public function trabalhar() {
        echo "{$this->nome} está trabalhando. Matrícula: {$this->matricula}.<br>";
    }
}

class Programador extends Funcionario {
    public $linguagemPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $linguagemPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function programar() {
        echo "{$this->nome} está programando em {$this->linguagemPrincipal}.<br>";
    }
}

class Designer extends Funcionario {
    public $ferramentaPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $ferramentaPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    public function criarLayout() {
        echo "{$this->nome} está criando um layout usando {$this->ferramentaPrincipal}.<br>";
    }
}

$programador = new Programador("Rafael Costa", "rafael@email.com", 5000, "F102", "PHP");
$designer = new Designer("Luiza Rocha", "luiza@email.com", 4200, "F103", "Figma");

echo "<h2>Programador</h2>";
$programador->apresentar(); // Declarado em Pessoa.
$programador->trabalhar();  // Declarado em Funcionario.
$programador->programar();  // Declarado em Programador.

echo "<h2>Designer</h2>";
$designer->apresentar(); // Declarado em Pessoa.
$designer->trabalhar();  // Declarado em Funcionario.
$designer->criarLayout(); // Declarado em Designer.

// Hierarquia: Pessoa -> Funcionario -> Programador.
// Hierarquia: Pessoa -> Funcionario -> Designer.
