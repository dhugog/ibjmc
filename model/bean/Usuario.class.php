<?php

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nasc;
    private $sexo;
    private $membro;
    
    public function __construct($nome, $email, $senha, $nasc, $sexo, $membro) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->nasc = $nasc;
        $this->sexo = $sexo;
        $this->membro = $membro;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNasc() {
        return $this->nasc;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getMembro() {
        return $this->membro;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNasc($nasc) {
        $this->nasc = $nasc;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setMembro($membro) {
        $this->membro = $membro;
    }
}
