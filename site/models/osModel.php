<?php

class osModel extends model {

    var $tabPadrao = 'prodOS';
    var $campo_chave = 'idOS';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idOS'] = NULL;
        $dados[0]['dsOS'] = NULL;
        return $dados;
    }
    
    public function getOS($where = null) {
        $tables = 'prodOS as a';
        $tables .= ' left join prodColaborador d on d.idColaborador = a.idColaboradorSolicitante';
        $tables .= ' left join prodColaborador e on e.idColaborador = a.idColaboradorResponsavel';
        $tables .= ' left join prodColaborador g on g.idColaborador = a.idColaboradorAprovado';
        $tables .= ' left join prodSetor m on m.idSetor = a.idSetor';
        $tables .= ' left join prodSetor ms on ms.idSetor = d.idSetor';
        $tables .= ' left join prodStatusOS f on f.idStatusOS = a.idStatusOS';
        $tables .= ' left join prodTipoManutencao as t on t.idTipoManutencao = a.idTipoManutencao';
        $tables .= ' left join prodOS p on p.idOS = a.idOS';
        $tables .= ' left join prodTipoFalha r on r.idTipoFalha = a.idTipoFalha';
        $tables .= ' left join prodUsuarios u on u.idUsuario = a.idUsuarioAprovado';
        $tables .= ' left join prodMotivo x on x.idMotivo = a.idMotivo ';
        $orderby = 'a.nrOS';
        return $this->read($tables, array('a.*','m.dsSetor as dsSetor','ms.dsSetor as SetorSolicitante','t.dsTipoManutencao','d.dsColaborador as dsSolicitante','f.dsStatusOS'), $where, null, null, null, $orderby);
    }
    public function getUltimaOS() {
        $tables = 'prodOS';
        return $this->read($tables, array('max(nrOS) as UltimaOS'), null, null, null, null, null);
    }
    public function getTotalOS($where) {
        $tables = 'prodOS';
        return $this->read($tables, array('count(nrOS) as total'), $where, null, null, null, null);
    }
    public function getUltimoStatus() {
        $tables = 'prodOS';
        return $this->read($tables, array('idStatusOS'), null, null, null, null, null);
    }
    public function getOSStatus($where = null) {
        $tables = 'prodOSMudancaStatus m ';
        $tables .= ' left join prodOS a on m.idOS = a.idOS';
        $tables .= ' left join prodStatusOS s on s.idStatusOS = m.idStatusOS';
        $tables .= ' left join prodUsuarios u on u.idUsuario = m.idUsuario';
        $tables .= ' left join prodOrigemInformacao o on o.idOrigemInformacao = m.idOrigemInformacao';
        $orderby = 'm.idOSMudancaStatus';
        return $this->read($tables, array('m.*' , 'u.dsUsuario', 's.dsStatusOS', 'o.dsOrigemInformacao'), $where, null, null, null, $orderby);
    }
    public function getOSTarefas($where = null) {
        $tables = 'prodOSTarefa ost ';
        $tables .= ' left join prodOS a on a.idOS = ost.idOS';
        $tables .= ' left join prodTarefa t on t.idTarefa = ost.idTarefa';
        $tables .= ' left join prodUsuarios u on u.idUsuario = ost.idUsuarioDigitado';
        $orderby = 'ost.dtInicio';
        return $this->read($tables, array('ost.*' , 't.dsTarefa', 'u.dsUsuario', 'ost.dsObservacaoTarefa as dsOSTarefa'), $where, null, null, null, $orderby);
    }
    public function getOSMaquinaParada($where = null) {
        $tables = 'prodOSMaquinaParada ost ';
        $tables .= ' left join prodOS a on a.idOS = ost.idOS';
        $tables .= ' left join prodMaquinaParada t on t.idMaquinaParada = ost.idMaquinaParada';
        $tables .= ' left join prodOSTarefa osta on osta.idOStarefa = ost.idOStarefa';
        $tables .= ' left join prodUsuarios u on u.idUsuario = ost.idUsuarioDigitado';
        $tables .= ' left join prodMaquina m on m.idMaquina = ost.idMaquina';
        $orderby = 'ost.dtInicio';
        return $this->read($tables, array('ost.*', 'm.dsMaquina',  't.dsMaquinaParada', 'u.dsUsuario', 'osta.dsObservacaoTarefa as dsTarefa'), $where, null, null, null, $orderby);
    }
    public function getOSColaboradores($where = null, $dtInicio = null, $dtFim = null) {
        
        $where .= " and (('" . $dtInicio . "' <= oc.dtInicio and '" . $dtInicio . "' >= oc.dtFim)";
        $where .= " or ('" . $dtInicio . "' <= oc.dtFim and '" . $dtFim . "' <= oc.dtFim)";
        $where .= " or ('" . $dtInicio . "' >= oc.dtInicio and '" . $dtFim . "' >= oc.dtFim)";
        $where .= " or ('" . $dtInicio . "' <= oc.dtInicio and '" . $dtFim . "' >= oc.dtFim))";
        $tables = 'prodOSColaboradores oc ';
        $tables .= ' left join prodOS a on oc.idOS = a.idOS';
        $tables .= ' left join prodColaborador c on c.idColaborador = oc.idColaborador';
        $tables .= ' left join prodStatusOS s on s.idStatusOS = a.idStatusOS';
        $orderby = 'c.dsColaborador';
        return $this->read($tables, array('a.nrOS' , 'a.dtInicio', 'a.dtFim', 'a.dtOS', 'c.dsColaborador','c.idColaborador','oc.dtInicio as dtInicioC','oc.dtFim as dtFimC','s.dsStatusOS','a.idOS'), $where, null, null, null, $orderby);
    }
    public function getOSTarefaInsumo($where = null) {
        $tables = 'prodOSTarefaInsumo as a';
        $tables .= ' left join prodInsumo as i on i.idInsumo = a.idInsumo';
        $tables .= ' left join prodUnidade as u on u.idUnidade = i.idUnidade';
        $tables .= ' left join prodOSTarefa as t on t.idOsTarefa = a.idOsTarefa';
        $tables .= ' left join prodTarefa as tar on tar.idTarefa = t.idTarefa';
        $orderby = 'i.dsInsumo';
        return $this->read($tables, array('a.*', 'i.dsInsumo', 'u.dsUnidade', 'tar.dsTarefa', 't.dsObservacaoTarefa'), $where, null, null, null, $orderby);
    }
    public function getOSTarefaMaquina($where = null) {
        $tables = 'prodOSTarefaMaquina as a';
        $tables .= ' left join prodMaquina as i on i.idMaquina = a.idMaquina';
        $tables .= ' left join prodUnidade as u on u.idUnidade = i.idUnidade';
        $tables .= ' left join prodOSTarefa as t on t.idOsTarefa = a.idOsTarefa';
        $tables .= ' left join prodTarefa as tar on tar.idTarefa = t.idTarefa';
        $orderby = 'i.dsMaquina';
        return $this->read($tables, array('a.*', 'i.dsMaquina', 'u.dsUnidade', 'tar.dsTarefa', 't.dsObservacaoTarefa'), $where, null, null, null, $orderby);
    }

    public function getOSTarefaMaoObra($where = null) {
        $tables = 'prodOSTarefaMaoObra as a';
        $tables .= ' left join prodMaoObra as i on i.idMaoObra = a.idMaoObra';
        $tables .= ' left join prodUnidade as u on u.idUnidade = i.idUnidade';
        $tables .= ' left join prodOSTarefa as t on t.idOsTarefa = a.idOsTarefa';
        $tables .= ' left join prodTarefa as tar on tar.idTarefa = t.idTarefa';
        $orderby = 'i.dsMaoObra';
        return $this->read($tables, array('a.*', 'i.dsMaoObra', 'u.dsUnidade', 'tar.dsTarefa', 't.dsObservacaoTarefa'), $where, null, null, null, $orderby);
    }
    public function setOSTarefaInsumo($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSTarefaInsumo', $array, false));
        $this->commit();
        return $id;
    }
    
    public function setOSMaquinaParada($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSMaquinaParada', $array, false));
        $this->commit();
        return $id;
    }
    public function setOSTarefaMaoObra($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSTarefaMaoObra', $array, false));
        $this->commit();
        return $id;
    }
    public function setOSTarefaMaquina($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSTarefaMaquina', $array, false));
        $this->commit();
        return $id;
    }

    //Grava o perfil
    public function setOS($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setOSTarefa($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSTarefa', $array, false));
        $this->commit();
        return $id;
    }
    
    public function setOSColaborador($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSColaboradores', $array, false));
        $this->commit();
        return $id;
    }

    public function setNovoStatusOS($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodOSMudancaStatus', $array, false));
        $this->commit();
        return $id;
    }
    //Atualiza o Log
    public function updOS($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delOS($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
    public function delOSColaborador($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodOSColaboradores', $where, true));
        $this->commit();
        return true;
    }
    public function delOSTarefa($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodOSTarefa', $where, true));
        $this->commit();
        return true;
    }
    public function delOSTarefaInsumo($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodOSTarefaInsumo', $where, true));
        $this->commit();
        return true;
    }
    public function delOSTarefaMaoObra($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodOSTarefaMaoObra', $where, true));
        $this->commit();
        return true;
    }
    public function delOSTarefaMaquina($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodOSTarefaMaquina', $where, true));
        $this->commit();
        return true;
    }
    public function delOSMaquinaParada($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodOSMaquinaParada', $where, true));
        $this->commit();
        return true;
    }
}
?>
