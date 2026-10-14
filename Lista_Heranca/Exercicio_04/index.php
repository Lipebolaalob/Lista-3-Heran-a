<?php

class Produto {
    public $nome;
    public $preco;
    public $codigo;

    public function __construct($nome, $preco, $codigo) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto() {
        echo "{$this->nome} (Código {$this->codigo}): R$ " .
             number_format($this->preco, 2, ',', '.') . "<br>";
    }

    public function aplicarDesconto($percentual) {
        if ($percentual < 0 || $percentual > 100) {
            echo "Desconto de {$percentual}% inválido. O preço não foi alterado.<br>";
            return false;
        }

        $this->preco -= $this->preco * ($percentual / 100);
        echo "Desconto de {$percentual}% aplicado.<br>";
        return true;
    }
}

class Livro extends Produto {
    public $autor;
    public $isbn;

    public function __construct($nome, $preco, $codigo, $autor, $isbn) {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }
}

class Eletronico extends Produto {
    public $marca;
    public $garantiaMeses;

    public function __construct($nome, $preco, $codigo, $marca, $garantiaMeses) {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }
}

$livro = new Livro("O Hobbit", 100, "L001", "J. R. R. Tolkien", "978000000001");
$eletronico = new Eletronico("Notebook", 2000, "E001", "Lenovo", 12);

echo "<h2>Livro</h2>Antes: ";
$livro->exibirProduto();
$livro->aplicarDesconto(10);
echo "Depois: ";
$livro->exibirProduto();

echo "<h2>Eletrônico</h2>Antes: ";
$eletronico->exibirProduto();
$eletronico->aplicarDesconto(15);
echo "Depois: ";
$eletronico->exibirProduto();

echo "<h2>Teste inválido</h2>";
$precoAntes = $livro->preco;
$livro->aplicarDesconto(-5);
echo "Preço mantido: ";
$livro->exibirProduto();
echo "Preço permaneceu igual? " . ($precoAntes === $livro->preco ? "Sim" : "Não");
