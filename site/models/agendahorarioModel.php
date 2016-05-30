<?php

class agendahorarioModel extends model {

    var $tabPadrao = 'prodAgendaHorario';
    var $campo_chave = 'idAgendaHorario';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idAgendaHorario'] = NULL;
        $dados[0]['dsAgendaHorario'] = NULL;
        $dados[0]['idAno'] = NULL;
        return $dados;
    }
    
    public function getAgendaHorario($where = null) {
        $tables = 'prodAgendaHorario';
        return $this->read($tables, array('prodAgendaHorario.*','mid(idAno,1,4) as soano' ), $where, null, null, null, null);
    }

    public function getAgendaHorarioColaboradores($where = null) {
        $campos = array('c.dsColaborador, cc.dsCargo, tm.dsMaoObra, s.dsSetor, ah.idAgendaHorario, ah.idAno, ac.idColaborador, ai.idAgendaHorarioItens, ac.id');
        $tables = ' producao.prodAgendaHorarioItensColaborador ac
            inner join prodAgendaHorarioItens ai on ac.idAgendaHorarioItens = ai.idAgendaHorarioItens
            inner join prodAgendaHorario ah on ah.idAgendaHorario = ai.idAgendaHorario
            inner join prodColaborador c on c.idColaborador = ac.idColaborador
            left join prodSetor s on s.idSetor = c.idSetor
            left join prodCargo cc on cc.idCargo = c.idCargo
            left join prodMaoObra tm on tm.idMaoObra = c.idMaoObra';
        $groupby = 'c.dsColaborador, cc.dsCargo, tm.dsMaoObra, s.dsSetor';        
        $orderby = 'c.dsColaborador';
        return $this->read($tables, $campos, $where, $groupby, null, null, $orderby);
    }
    public function getAgendaColaboradores($where = null) {
        $tables = 'prodColaborador as a';
        $orderby = 'dsColaborador';
        return $this->read($tables, array('a.*'), $where, null, null, null, $orderby);
    }

    public function getAgendaHorarioItensA($where = null) {
        $query = "SELECT ahi.idAgendaHorario, ahi.idAgendaHorarioItens, ahi.dtAgenda
            FROM  prodAgendaHorarioItens ahi 
            where {$where} 
            group by ahi.idAgendaHorarioItens";
        return $this->readLivre($query);
    }
    public function getAgendaHorarioItens($where = null) {
        $query = "SELECT hc.idColaborador, ahi.idAgendaHorario, ahi.idAgendaHorarioItens, ahi.dtAgenda, ta.idTipoAgenda, ta.dsTipoAgenda, ta.dsResumida, ta.dsCor
            FROM prodAgendaHorarioItensColaborador hc 
            inner join prodAgendaHorarioItens ahi  on ahi.idAgendaHorarioItens = hc.idAgendaHorarioItens
            inner join prodTipoAgenda ta on ta.idTipoAgenda = hc.idTipoAgenda
            where {$where} 
            group by hc.idColaborador, ahi.idAgendaHorarioItens  order by hc.idColaborador, ahi.dtAgenda";
        return $this->readLivre($query);
    }
    public function getAgendaHorarioOS($where = null) {
        $query = "select c.idColaborador, c.dsColaborador from prodAgendaHorarioItensColaborador ac
            inner join prodAgendaHorarioItens ai on ai.idAgendaHorarioItens = ac.idAgendaHorarioItens 
            inner join prodColaborador c on c.idColaborador = ac.idColaborador
            inner join prodTipoAgenda ta on ta.idTipoAgenda = ac.idTipoAgenda
            where {$where} group by c.idColaborador, c.dsColaborador order by ac.idTipoAgenda, c.dsColaborador";        
        return $this->readLivre($query);
    }
    public function getAgendaHorarioOSSoma($where = null) {
        $expression = "Select ta.idTipoAgenda, ta.dsCor, ta.dsResumida, ta.dsTipoAgenda, count(ta.idTipoAgenda) as qtosta, sum(c.qtHorasDia) as totalHoras  
            from prodAgendaHorarioItensColaborador ac
            inner join prodAgendaHorarioItens ai on ai.idAgendaHorarioItens = ac.idAgendaHorarioItens and ai.idAgendaHorario = ac.idAgendaHorario
            inner join prodColaborador c on c.idColaborador = ac.idColaborador
            inner join prodTipoAgenda ta on ta.idTipoAgenda = ac.idTipoAgenda
            where {$where} group by ta.idTipoAgenda order by ac.idTipoAgenda;";   
        return $this->readLivre($expression);
    }
    
    public function getAgendaHorarioOSStatus($where = null) {
        $query = "select ai.idAgendaHorarioItens, c.idColaborador, c.dsColaborador from prodAgendaHorarioItensColaborador ac
            inner join prodAgendaHorarioItens ai on ai.idAgendaHorarioItens = ac.idAgendaHorarioItens 
            inner join prodColaborador c on c.idColaborador = ac.idColaborador
            inner join prodTipoAgenda ta on ta.idTipoAgenda = ac.idTipoAgenda
            where {$where} 
            group by c.idColaborador, c.dsColaborador";        
        return $this->readLivre($query);
    }

    public function getAgendaHorarioItensAnalitico($where = null) {
        $query = "SELECT hc.idColaborador, ahi.idAgendaHorario, ahi.idAgendaHorarioItens, c.dsColaborador, ta.idTipoAgenda, ta.dsTipoAgenda, ta.dsResumida, ta.dsCor, ahi.dtAgenda 
                FROM prodAgendaHorarioItensColaborador hc 
                inner join prodAgendaHorarioItens ahi on ahi.idAgendaHorarioItens = hc.idAgendaHorarioItens 
                inner join prodColaborador c on c.idColaborador = hc.idColaborador  
                inner join prodTipoAgenda ta on ta.idTipoAgenda = hc.idTipoAgenda Where
   
                {$where} group by hc.idColaborador Order By c.dsColaborador";
        return $this->readLivre($query);
    }
    
    public function getColaboradorSemAgenda($idAgendaHorario) {
        $mysql = "Select c.idColaborador, c.dsColaborador from prodColaborador as c
                Where c.idColaborador not in (SELECT hc.idColaborador FROM prodAgendaHorarioItensColaborador hc 
                inner join prodAgendaHorarioItens ahi on ahi.idAgendaHorarioItens = hc.idAgendaHorarioItens
                where ahi.idAgendaHorario = {$idAgendaHorario}
                group by hc.idColaborador) and c.stFazParteAgenda = 1";
    //    var_dump($mysql); die;
        return $this->readLivre($mysql);
    }
    
    //Grava o perfil
    public function setAgendaHorario($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setAgendaHorarioItens($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodAgendaHorarioItens', $array, false));
        $this->commit();
        return $id;
    }

    public function setAgendaHorarioColaborador($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodAgendaHorarioItensColaborador', $array, false));
        $this->commit();
        return $id;
    }
    public function setAgendaHorarioItensStatus($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodAgendaHorarioItensStatus', $array, false));
        $this->commit();
        return $id;
    }
    
    public function setAgendaHorarioMaoObra($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodAgendaHorarioMaoObra', $array, false));
        $this->commit();
        return $id;
    }
    public function setAgendaHorarioMaquina($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('prodAgendaHorarioMaquinas', $array, false));
        $this->commit();
        return $id;
    }
    //Atualiza o Log
    public function updAgendaHorario($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }
    public function updAgendaHorarioColaborador($mysql) {
        //Chave    
        $this->startTransaction();
        $this->transaction($this->updateLivre($mysql));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delAgendaHorario($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
    public function delAgendaHorarioColaborador($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodAgendaHorarioItensColaborador', $where, true));
        $this->commit();
        return true;
    }
    public function delAgendaHorarioItens($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodAgendaHorarioItens', $where, true));
        $this->commit();
        return true;
    }
    public function delAgendaHorarioStatus($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('prodAgendaHorarioItensStatus', $where, true));
        $this->commit();
        return true;
    }
}
?>
