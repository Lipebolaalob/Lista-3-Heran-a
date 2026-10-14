<?php

class Entrega {
    public $codigo;
    public $destino;
    public $distancia;

    public function __construct($codigo, $destino, $distancia) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados() {
        echo "Entrega {$this->codigo} | Destino: {$this->destino} | Distância: {$this->distancia} km<br>";
    }
}

class EntregaMoto extends Entrega {
    public $placa;
    public $nomeEntregador;

    public function __construct($codigo, $destino, $distancia, $placa, $nomeEntregador) {
        parent::__construct($codigo, $destino, $distancia);
        $this->placa = $placa;
        $this->nomeEntregador = $nomeEntregador;
    }

    public function realizarEntrega() {
        echo "Entrega por moto iniciada. Entregador: {$this->nomeEntregador}, placa {$this->placa}.<br>";
    }
}

class EntregaDrone extends Entrega {
    public $modeloDrone;
    public $autonomiaKm;

    public function __construct($codigo, $destino, $distancia, $modeloDrone, $autonomiaKm) {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloDrone = $modeloDrone;
        $this->autonomiaKm = $autonomiaKm;
    }

    public function realizarEntrega() {
        if ($this->distancia > 20) {
            echo "Entrega recusada: o drone só pode fazer entregas de até 20 km.<br>";
            return false;
        }
        echo "Entrega por drone autorizada. Modelo: {$this->modeloDrone}, autonomia: {$this->autonomiaKm} km.<br>";
        return true;
    }
}

echo "<h2>Teste válido - 8 km</h2>";
$droneValido = new EntregaDrone("D001", "Centro", 8, "SkyMini", 25);
$droneValido->exibirDados();
$droneValido->realizarEntrega();

echo "<h2>Teste inválido - 25 km</h2>";
$droneInvalido = new EntregaDrone("D002", "Bairro distante", 25, "SkyMini", 25);
$droneInvalido->exibirDados();
$droneInvalido->realizarEntrega();

echo "<h2>Exemplo de moto</h2>";
$moto = new EntregaMoto("M001", "Vila Nova", 12, "ABC1D23", "Pedro");
$moto->exibirDados();
$moto->realizarEntrega();


echo "<h3>Hierarquia de classes</h3>";
echo "<pre>
             Entrega
             /    \\
    EntregaMoto  EntregaDrone
</pre>";
