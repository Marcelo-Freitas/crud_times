<?php 

class Campeonato {
    private ?int $id;
    private ?string $nome;
    private ?int $premiacao;

    public function __toString() {
        return $this->nome . 
            " (" . $this->id . ")"; 
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of premiacao
     */ 
    public function getPremiacao()
    {
        return $this->premiacao;
    }

    /**
     * Set the value of premiacao
     *
     * @return  self
     */ 
    public function setPremiacao($premiacao)
    {
        $this->premiacao = $premiacao;

        return $this;
    }
}