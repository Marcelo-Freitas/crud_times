<?php 

class Campeonato implements JsonSerializable {
    private ?int $id;
    private ?string $nome;
    private ?int $premiacao;

    private ?Estado $estado;

    public function __construct($id=0) {
        $this->id = $id;
        $this->estado = null;
    }

    public function __toString() {
        return $this->nome . 
            " (R$" . $this->premiacao . "M)"; 
    }

    public function jsonSerialize(): array {
        $dados = array("id" => $this->id,
            "nome" => $this->nome,
            "premiacao" => $this->premiacao,
            "estado" => $this->id);
        return $dados;
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

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): void
    {
        $this->estado = $estado;
    }

}