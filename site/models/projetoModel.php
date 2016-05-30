<?php

class projetoModel extends model {

    var $tabPadrao = 'prodProjeto';
    var $campo_chave = 'idProjeto';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idProjeto'] = NULL;
        $dados[0]['dsProjeto'] = NULL;
        return $dados;
    }
    public function getProjetoComboBox($where = null){
        $fields = array("p.idProjeto","p.dsProjeto");
        $table = "prodProjeto p inner join prodProjetoUsuario up on p.idProjeto = up.idProjeto";
        return $this->read($table, $fields, $where, null, null, null, "p.dsProjeto");
    }
    //projeto por usuario
    public function getProjetoUsuario($where = NULL, $orderby = "p.dsProjeto") {
        $tables = "prodProjeto p
            inner join prodProjetoUsuario up on p.idProjeto = up.idProjeto";
        return $this->read($tables, array("p.*"), $where, NULL, NULL, NULL, $orderby);
    }
    
    public function getProjeto($where = null) {
        $tables = 'prodProjeto as a';
        $tables .= ' left join prodColaborador as b on b.idColaborador = a.idColaborador';
        $tables .= ' left join prodEmpresa as c on c.idEmpresa = a.idEmpresa';
        $tables .= ' left join prodStatusProjeto as s on s.idStatusProjeto = a.idStatusProjeto';
       // echo $tables; die;
        return $this->read($tables, array('a.*', 'b.dsColaborador', 'c.dsEmpresa', 's.dsStatusProjeto'), $where, null, null, null, null);
    }
    
    public function getProjetoStatus($where = null) {
        $tables = 'prodProjetoMudancaStatus m ';
        $tables .= ' left join prodProjeto a on m.idProjeto = a.idProjeto';
        $tables .= ' left join prodStatusProjeto s on s.idStatusProjeto = m.idStatusProjeto';
        $tables .= ' left join prodUsuarios u on u.idUsuario = m.idUsuario';
        $tables .= ' left join prodOrigemInformacao o on o.idOrigemInformacao = m.idOrigemInformacao';
        $orderby = 'm.idProjetoMudancaStatus';
        return $this->read($tables, array('m.*' , 'u.dsUsuario', 's.dsStatusProjeto', 'o.dsOrigemInformacao'), $where, null, null, null, $orderby);
    }

    //Grava o perfil
    public function setProjeto($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setNovoStatusProjeto($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodProjetoMudancaStatus', $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updProjeto($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delProjeto($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
