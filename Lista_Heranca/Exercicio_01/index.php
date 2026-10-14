<?php
// O Carro e a Moto aproveitam os dados que ja existem em Veiculo.

class Veiculo {
    public $marca;
    public $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados() {
        echo "Marca: {$this->marca}<br>";
        echo "Modelo: {$this->modelo}<br>";
        echo "Ano: {$this->ano}<br>";
    }
}

class Carro extends Veiculo {
    public $quantidadePortas;

    public function __construct($marca, $modelo, $ano, $quantidadePortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->quantidadePortas = $quantidadePortas;
    }
}

class Moto extends Veiculo {
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }
}

$carro = new Carro("Volkswagen", "Gol", 2018, 4);
$moto = new Moto("Honda", "CG 160", 2022, 160);

echo "<h2>Carro</h2>";
$carro->exibirDados();
echo "Portas: {$carro->quantidadePortas}<br>";

echo "<h2>Moto</h2>";
$moto->exibirDados();
echo "Cilindradas: {$moto->cilindradas} cc<br>";

// Marca, modelo e ano sao herdados de Veiculo.
// quantidadePortas pertence ao Carro; cilindradas pertence a Moto.
