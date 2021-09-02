<?php

namespace Alura\Solid\Model;

class AluraMais extends Video implements Pontuavel, Assistivel
{
    private $categoria;

    public function __construct(string $nome, string $categoria)
    {
        parent::__construct($nome);
        $this->categoria = $categoria;
    }

    public function recuperarUrl(): string
    {
        $slugCategoria = new Slug($this->categoria);
        $slugNome = new Slug($this->nome);
        return 'http://videos.alura.com.br/' . $slugCategoria->__toString() . '/' . $slugNome->__toString();
        // return 'http://videos.alura.com.br/' . str_replace(' ', '-', strtolower($this->categoria)) . '/' . str_replace(' ', '-', strtolower($this->nome));
    }

    public function recuperarPontuacao(): int
    {
        return $this->minutosDeDuracao() * 2;
    }
    
    
}
