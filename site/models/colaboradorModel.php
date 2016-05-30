<?php

class colaboradorModel extends model {

    var $tabPadrao = 'prodColaborador';
    var $campo_chave = 'idColaborador';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idColaborador'] = NULL;
        $dados[0]['dsColaborador'] = NULL;
        return $dados;
    }
    
    public function getColaborador($where = null) {
        $tables = 'prodColaborador as a';
        $tables .= ' left join prodCargo as b on b.idCargo = a.idCargo';
        $tables .= ' left join prodSetor as c on c.idSetor = a.idSetor';
        $tables .= ' left join prodMaoObra as d on d.idMaoObra = a.idMaoObra';
       // echo $tables; die;
        return $this->read($tables, array('a.*', 'b.dsCargo', 'c.dsSetor', 'd.dsMaoObra'), $where, null, null, null, null);
    }
    
    public function getColaboradorMO($where = null) {
        $tables = 'prodColaborador as a';
        $tables .= ' left join prodCargo as b on b.idCargo = a.idCargo';
        $tables .= ' left join prodSetor as c on c.idSetor = a.idSetor';
        $tables .= ' left join prodMaoObra as d on d.idMaoObra = a.idMaoObra';
       // echo $tables; die;
        return $this->read($tables, array('a.idColaborador as idColaboradorMO', 'a.dsColaborador', 'b.dsCargo', 'c.dsSetor', 'd.dsMaoObra'), $where, null, null, null, null);
    }
    //Grava o perfil
    public function setColaborador($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updColaborador($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delColaborador($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
