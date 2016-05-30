<?php

class servicoprojetoModel extends model {

    var $tabPadrao = 'prodProjetoServicos';
    var $campo_chave = 'idProjetoServico';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idProjetoServico'] = NULL;
        $dados[0]['idProjeto'] = NULL;
        $dados[0]['idServico'] = NULL;
        $dados[0]['idFase'] = NULL;
        $dados[0]['dsServicoProjeto'] = NULL;
        $dados[0]['dtInicioPrevista'] = NULL;
        $dados[0]['dtFimPrevista'] = NULL;
        $dados[0]['vlOrcado'] = NULL;
        $dados[0]['idStatusServicoProjeto'] = NULL;
        $dados[0]['idColaboradorResponsavel'] = NULL;
        $dados[0]['dsTermoAbertura'] = NULL;
        $dados[0]['dsTermoEncerramento'] = NULL;
        return $dados;
    }
    public function getServicoProjetoComboBox($where = null){
        $fields = array("p.idServicoProjeto","p.dsServicoProjeto");
        $table = "prodProjetoServicoProjetos p inner join prodServicoProjetoUsuario up on p.idServicoProjeto = up.idServicoProjeto";
        return $this->read($table, $fields, $where, null, null, null, "p.dsServicoProjeto");
    }
    //servicoprojeto por usuario
    public function getServicoProjetoUsuario($where = NULL, $orderby = "p.dsServicoProjeto") {
        $tables = "prodProjetoServicoProjetos f
            inner join prodProjeto p on p.idProjeto = f.idProjeto
            inner join prodProjetoUsuario up on p.idProjeto = up.idProjeto";
        return $this->read($tables, array("p.*"), $where, NULL, NULL, NULL, $orderby);
    }
    public function getServicoStatus($where = null) {
        $tables = 'prodServicoMudancaStatus f ';
        $tables .= ' left join prodStatusProjeto s on s.idStatusProjeto = f.idStatusServico';
        $tables .= ' left join prodUsuarios u on u.idUsuario = f.idUsuario';
        $tables .= ' left join prodOrigemInformacao o on o.idOrigemInformacao = f.idOrigemInformacao';
        $orderby = 'f.idServicoMudancaStatus';
        return $this->read($tables, array('f.*' , 'u.dsUsuario', 's.dsStatusProjeto', 'o.dsOrigemInformacao'), $where, null, null, null, $orderby);
    }
    
    public function getServicoProjeto($where = null) {
        $tables = 'prodProjetoServicos as ps';
        $tables .= ' left join prodProjetoFases as pf on pf.idFase = ps.idFase';
        $tables .= ' left join prodProjeto as p on p.idProjeto = ps.idProjeto';
        $tables .= ' left join prodColaborador as c on c.idColaborador = ps.idColaboradorResponsavel';
        $tables .= ' left join prodStatusProjeto as s on s.idStatusProjeto = ps.idStatusServico';
       // echo $tables; die;
        return $this->read($tables, array('ps.*', 'c.dsColaborador', 'p.dsProjeto as nomeprojeto', 's.dsStatusProjeto','p.idProjeto as cprojeto','pf.dsFase as nomefase'), $where, null, null, null, null);
    }
    public function getServicoProjetoServicos($where = null) {
        $tables = 'prodProjetoServicosServico as ps';
        $tables .= ' inner join prodServicos as s on s.idServico = ps.idServico';
        return $this->read($tables, array('ps.*', 's.dsServico'), $where, null, null, null, null);
    }

    public function getServicoProjetoFase($where = null) {
        $tables = 'prodProjetoServicos as ps '
                . ' inner join prodProjetoFases pf on ps.idFase = pf.idFase and ps.idProjeto = pf.idProjeto '
                . ' inner join prodProjeto p on ps.idProjeto = p.idProjeto';
        return $this->read($tables, array('ps.idFase', 'ps.idProjeto', 'p.vlOrcado as vlOrcadoProjeto', 'pf.vlOrcado as vlOrcadoFase'), $where, null, null, null, null);
    }

    public function getServicoProjetoServicosTotal($where = null) {
        $tables = 'prodProjetoServicosServico as ps';
        return $this->read($tables, array('sum(ps.vlTotal) as total'), $where, null, null, null, null);
    }

    public function getServicoProjetoProjeto($where = null) {
        $tables = 'prodProjeto as p';
        $tables .= ' inner join prodProjetoServicoProjetos as f on f.idProjeto = p.idProjeto';
        $tables .= ' left join prodColaborador as c on c.idColaborador = f.idColaboradorResponsavel';
        $tables .= ' left join prodStatusProjeto as s on s.idStatusProjeto = f.idStatusServicoProjeto';
       // echo $tables; die;
        return $this->read($tables, array('f.*', 'c.dsColaborador', 'p.dsProjeto', 's.dsStatusProjeto','p.idProjeto as cprojeto'), $where, null, null, null, null);
    }
    //Grava o perfil
    public function setServicoProjeto($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setServicoProjetoServico($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodProjetoServicosServico', $array, false));
        $this->commit();
        return $id;
    }
    public function setNovoStatusServicoProjeto($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodServicoMudancaStatus', $array, false));
        $this->commit();
        return $id;
    }

    public function updServicoProjeto($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }
    public function updServicoProjetoFase($array) {
        //Chave    
        $where = 'idFase = ' . $array['idFase'];
        $this->startTransaction();
        $this->transaction($this->update('prodProjetoFases', $array, $where));
        $this->commit();
        return true;
    }

    public function updServicoProjetoProjeto($array) {
        //Chave    
        $where = 'idProjeto = ' . $array['idProjeto'];
        $this->startTransaction();
        $this->transaction($this->update('prodProjeto', $array, $where));
        $this->commit();
        return true;
    }
    //Remove perfil    
    public function delServicoProjeto($where) {
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
    public function delServicoProjetoServicos($where) {
        $this->startTransaction();
        $this->transaction($this->delete('prodProjetoServicosServico', $where, true));
        $this->commit();
        return true;
    }
}
?>
