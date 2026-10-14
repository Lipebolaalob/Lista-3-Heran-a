<?php

class Pessoa {
    public $nome;
    public $idade;
    public $email;

    public function __construct($nome, $idade, $email) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Sou {$this->nome}, tenho {$this->idade} anos e meu email é {$this->email}.<br>";
    }
}

class Aluno extends Pessoa {
    public $matricula;
    public $curso;

    public function __construct($nome, $idade, $email, $matricula, $curso) {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar() {
        echo "{$this->nome} está estudando {$this->curso}.<br>";
    }
}

class Professor extends Pessoa {
    public $especialidade;
    public $salario;

    public function __construct($nome, $idade, $email, $especialidade, $salario) {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula() {
        echo "{$this->nome} está dando aula de {$this->especialidade}.<br>";
    }
}

$aluno1 = new Aluno("João Pedro", 20, "joao@email.com", "2026001", "ADS");
$aluno2 = new Aluno("Ana Clara", 22, "ana@email.com", "2026002", "Engenharia de Software");
$professor = new Professor("Paulo Mendes", 41, "paulo@email.com", "Programação", 5200);

echo "<h2>Aluno 1</h2>";
$aluno1->apresentar();
$aluno1->estudar();
echo "Matrícula: {$aluno1->matricula}<br>";

echo "<h2>Aluno 2</h2>";
$aluno2->apresentar();
$aluno2->estudar();
echo "Matrícula: {$aluno2->matricula}<br>";

echo "<h2>Professor</h2>";
$professor->apresentar();
$professor->ministrarAula();

// apresentar() funciona porque Aluno e Professor herdam de Pessoa usando extends.
