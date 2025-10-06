<?php

class NumeroComplejo
{

public $real;
public $img;



function __constructor($valor1= 0,$valor2=0)
{
$this->real= $valor1;
$this->img = $valor2;

}

function getreal()
{
return $this->real;

}
function setvalor($numero)
{
    $this->real = $numero;
}

function getimg()
{
return $this->img;
}
function setimg($numero)
{
$this->img = $numero;
}

function resta(Complejo $z)
{

 setreal($this->getreal-$z->getreal());
 setimg($this->getimg-$z->getimg()); 

}
function suma(Complejo $z)
{

 setreal($this->getreal + $z->getreal());
 setimg($this->getimg + $z->getimg()); 

}
 function multiplicar(Complejo $otro) {
        $nuevoReal = $this->real * $otro->real - $this->imag * $otro->imag;
        $nuevoImag = $this->real * $otro->imag + $this->imag * $otro->real;
        $this->real = $nuevoReal;
        $this->imag = $nuevoImag;
    }
 function dividir(Complejo $otro) {
        $conj = new Complejo($otro->real, -$otro->imag);
        $den = $otro->real * $otro->real + $otro->imag * $otro->imag;

        
        $nuevoReal = $this->real * $conj->real - $this->imag * $conj->imag;
        $nuevoImag = $this->real * $conj->imag + $this->imag * $conj->real;

        $this->real = $nuevoReal / $den;
        $this->imag = $nuevoImag / $den;
    }

static public function add(Complejo $valor1, Complejo $valor2)
{
$valor1->suma($valor2);

return $valor1;

}

public function echo(Complejo $z)
{

echo $z;
}


}
echo "e";

$a = new Complejo(3,1);
$b = new Complejo(2,9)
$a->suma($b);



?>