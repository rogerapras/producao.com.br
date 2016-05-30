<?php

class dashboard extends controller {

    public function index_action() {
        $tipo = $this->getParam('tipoos');
        
        $modelFinanceiro = new pedidoModel();
        $where = 'parc.stSituacao = 1';
        $registros = $modelFinanceiro->getFinanceiroParcelasEmAberto($where);
        $this->smarty->assign("registrosfinanceiro", $registros);

        $where = 'parc.stSituacao = 1';
        $registros = $modelFinanceiro->getFinanceiroParcelasEmAbertoMes($where);
        $this->smarty->assign("registrosfinanceiromes", $registros);

        $model = new osModel;
        $totalos = $model->getTotalOS("stStatus != 0");
        $this->smarty->assign("totalos", $totalos[0]['total']);
        $totalemandamento = $model->getTotalOS("idStatusOS = 3");
        $this->smarty->assign("totalemandamento", $totalemandamento[0]['total']);
        $totalpausada = $model->getTotalOS("idStatusOS = 6");
        $this->smarty->assign("totalpausada", $totalpausada[0]['total']);
        $totalparaaprovar = $model->getTotalOS("idStatusOS = 5");
        $this->smarty->assign("totalparaaprovar", $totalparaaprovar[0]['total']);

        switch ($tipo) {
            case 2:
                $where = 'a.idStatusOS = 3';
                $this->smarty->assign("classea",'fa-tasks');
                break;
            case 3:
                $where = 'a.idStatusOS = 6';
                $this->smarty->assign("classea",'fa-pause');
                break;
            case 4:
                $where = 'a.idStatusOS = 5';
                $this->smarty->assign("classea",'fa-pencil');
                break;
            default:
                $where = 'a.stStatus = 1';                
                $this->smarty->assign("classea",'fa-comments');
                break;
        }
        $registro = $model->getOS($where);
        $this->smarty->assign('os', $registro);
        
        $this->smarty->assign("id_idTipoUsuario", $_SESSION["user"]["tipousuario"]);
        $this->smarty->assign("idPerfil", $_SESSION["user"]["perfil"][0]["idPerfil"]);
        $this->smarty->assign("title", "Dashboard");
        $this->smarty->display("dashboard/dashboard.tpl");
    }
}
