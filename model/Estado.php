<?php 

class Estado
{
    private ?int $id;
    private ?string $nome;
    private ?string $sigla;


    public function __toString() {
        return $this->nome . 
            " (" . $this->sigla . ")"; 
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
     * Get the value of sigla
     */ 
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set the value of sigla
     *
     * @return  self
     */ 
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }
}