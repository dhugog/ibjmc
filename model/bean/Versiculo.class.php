<?php

class Versiculo {
    private $id;
    private $versiculo;
    private $referencia;
    private $dataExibicao;
    
    public function __construct($versiculo, $referencia, $dataExibicao) {
        $this->versiculo = $versiculo;
        $this->referencia = $referencia;
        $this->dataExibicao = $dataExibicao;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getVersiculo() {
        return $this->versiculo;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function getDataExibicao() {
        return $this->dataExibicao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setVersiculo($versiculo) {
        $this->versiculo = $versiculo;
    }

    public function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    public function setDataExibicao($dataExibicao) {
        $this->dataExibicao = $dataExibicao;
    }
}

