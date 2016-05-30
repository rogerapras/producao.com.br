<?php
class usuario_projetoModel extends model {

    var $tabPadrao = 'prodProjetoUsuario';
    var $campo_chave = 'idProjeto';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idUsuario'] = NULL;
        $dados[0]['idProjeto'] = NULL;
        return $dados;
    }

    //Recupera o prodProjetoUsuario
    public function getprodProjetoUsuario($where = null) {
        $campos = array('UP.*, P.dsProjeto as projeto');
        return $this->read('prodProjetoUsuario UP '.
                'left join prodProjeto P on (UP.idProjeto = P.idProjeto and P.stStatus <> 0) '.
                'left join prodUsuarios U on  (UP.idUsuario = U.idUsuario and U.stStatus <> 0)', $campos, $where, null, null, null, null);
    }

    //Grava o prodProjetoUsuario
    public function setprodProjetoUsuario($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o prodProjetoUsuario
    public function updprodProjetoUsuario($array) {
        //Chave    
        $where = "idUsuario = " . $array['idUsuario'] . ' AND idProjeto =' . $array['idProjeto'];
        
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o prodProjetoUsuario
    // @ imput id do usuario e id do projeto

    public function delprodProjetoUsuario($array) {
        //Chave
        $where = "idUsuario = " . $array['idUsuario'] . ' AND idProjeto =' . $array['idProjeto'];

        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where));
        $this->commit();
        return true;
    }
    
    public function del_projetos_usuario($idUsuario) {
        //Chave
        $where = "idUsuario = " . $idUsuario ;

        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where));
        $this->commit();
        return true;
    }
    

}

?>
