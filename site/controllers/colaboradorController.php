<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class colaborador extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new colaboradorModel();
        $colaborador_lista = $model->getColaborador();

        $this->smarty->assign('colaborador_lista', $colaborador_lista);
        $this->smarty->display('colaborador/lista.html');
    }

//Funcao de Busca
    public function busca_colaborador() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new colaboradorModel();
        $sql = "stStatus <> 0 and upper(dsColaborador) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getColaborador($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('colaborador_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'colaborador');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('colaborador/lista.html');
        } else {
            $this->smarty->assign('colaborador_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'colaborador');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('colaborador/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_colaborador() {

        $idColaborador = $this->getParam('idColaborador');

        $model = new colaboradorModel();

        if ($idColaborador > 0) {
            $registro = $model->getColaborador('idColaborador=' . $idColaborador);
            $registro = $registro[0]; //Passando Colaborador
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelSetor = new setorModel();
        $lista_setor = array('' => 'SELECIONE');
        foreach ($modelSetor->getSetor("stStatus <> 0") as $value) {
            $lista_setor[$value['idSetor']] = $value['dsSetor'];
        }
        $modelCargo = new cargoModel();
        $lista_cargo = array('' => 'SELECIONE');
        foreach ($modelCargo->getCargo() as $value) {
            $lista_cargo[$value['idCargo']] = $value['dsCargo'];
        }
        $modelTipoMO = new maoobraModel();
        $lista_maoobra = array('' => 'SELECIONE');
        foreach ($modelTipoMO->getMaoObra() as $value) {
            $lista_maoobra[$value['idMaoObra']] = $value['dsMaoObra'];
        }
        $lista_fazparte = array('' => 'SELECIONE', '1' => 'SIM', '2' => 'NÃO');
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_maoobra', $lista_maoobra);
        $this->smarty->assign('lista_fazparte', $lista_fazparte);
        $this->smarty->assign('lista_cargo', $lista_cargo);
        $this->smarty->assign('lista_setor', $lista_setor);
        $this->smarty->assign('title', 'Novo Colaboradores');
        $this->smarty->display('colaborador/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_colaborador() {
        $model = new colaboradorModel();

        $data = $this->trataPost($_POST);

        if ($data['idColaborador'] == NULL)
            $model->setcolaborador($data);
        else
            $model->updcolaborador($data); //update
        
        header('Location: /colaborador');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idColaborador'] = ($post['idColaborador'] != '') ? $post['idColaborador'] : null;
        $data['dsColaborador'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idCargo'] = ($post['idCargo'] != '') ? $post['idCargo'] : null;
        $data['idSetor'] = ($post['idSetor'] != '') ? $post['idSetor'] : null;
        $data['stFazParteAgenda'] = ($post['stFazParteAgenda'] != '') ? $post['stFazParteAgenda'] : null;
        $data['idMaoObra'] = ($post['idMaoObra'] != '') ? $post['idMaoObra'] : null;
        $data['qtHorasDia'] = ($post['qtHorasDia'] != '') ? $post['qtHorasDia'] : null;
        $data['dsEmail'] = ($post['dsEmail'] != '') ? $post['dsEmail'] : null;
        return $data;
    }

    // Remove Padrao
    public function delcolaborador() {
                
        $idColaborador = $this->getParam('idColaborador');
        
        $colaborador = $idColaborador;
        
        if (!is_null($colaborador)) {    
            $model = new colaboradorModel();
            $dados['idColaborador'] = $colaborador;             
            $model->delColaborador($dados);
        }

        header('Location: /colaborador');
    }

    public function relatoriocolaborador_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Colaboradores');
        $this->smarty->display('colaborador/relatorio_pre.html');
    }

    public function relatoriocolaborador() {
        $this->template->run();

        $model = new colaboradorModel();
        $colaborador_lista = $model->getColaborador();
        //Passa a lista de registros
        $this->smarty->assign('colaborador_lista', $colaborador_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Colaboradores');
        $this->smarty->display('colaborador/relatorio.html');
    }

}

?>