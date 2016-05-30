<?php

class empresaModel extends model {

    var $tabPadrao = 'prodEmpresa';
    var $campo_chave = 'idEmpresa';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idEmpresa'] = NULL;
        $dados[0]['dsEmpresa'] = NULL;
        return $dados;
    }

    public function getEmpresa($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);         
    }

    //Grava o perfil
    public function setEmpresa($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updEmpresa($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delEmpresa($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }

}

?>
