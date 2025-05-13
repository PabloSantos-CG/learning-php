<?php

/** Promoção de Propriedades
 * 
 * PHP 8 permite definir propriedades direto no construtor,
 * reduzindo códigos repetidos,
 * é possível ter propriedades definidas do jeito convencional misturado com o jeito do php moderno..
 */

class Foo
{
    public function __construct(
        public string $subText,
        public string $text,
    ) {}
}

$foo = new Foo('subtexto', 'texto');


var_dump($foo);

echo '<br />';

/** 
 * Métodos de criação estáticos
 * 
 * Usamos o new static() para permitir criar instâncias através de métodos,
 * ele cria uma instância da classe atual
 */
class Bar
{
    private function __construct(public int $id, public string $name) {}

    /**
     * Ligação Estática Tardia
     * 
     * Mesmo que haja herança, isso irá retornar uma instância de quem estiver chamando o método
     */
    public static function createInstance(int $id, string $name)
    {
        $new = new static($id, $name);
        return $new;
    }
}

// isso gera um fatal error
// $bar = new Bar(22, 'bar');

$bar = Bar::createInstance(22, 'bar');
var_dump($bar);
