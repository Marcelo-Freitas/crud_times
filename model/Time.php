<?php 
require __DIR__.'/Campeonato.php';
require __DIR__.'/Estado.php';

class Time
{
    private ?int $id;
    private ?string $nome;
    private ?int $classificacao;
    private ?int $anoFundacacao;
    private ?Estado $estado;
    private ?Campeonato $campeonato;

    

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
     * Get the value of classificacao
     */ 
    public function getClassificacao()
    {
        return $this->classificacao;
    }

    /**
     * Set the value of classificacao
     *
     * @return  self
     */ 
    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;

        return $this;
    }

    /**
     * Get the value of anoFundacacao
     */ 
    public function getAnoFundacacao()
    {
        return $this->anoFundacacao;
    }

    /**
     * Set the value of anoFundacacao
     *
     * @return  self
     */ 
    public function setAnoFundacacao($anoFundacacao)
    {
        $this->anoFundacacao = $anoFundacacao;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of campeonato
     */ 
    public function getCampeonato()
    {
        return $this->campeonato;
    }

    /**
     * Set the value of campeonato
     *
     * @return  self
     */ 
    public function setCampeonato($campeonato)
    {
        $this->campeonato = $campeonato;

        return $this;
    }
}