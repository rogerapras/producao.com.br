<?php /* Smarty version Smarty-3.1.18, created on 2016-03-31 20:11:58
         compiled from "/var/www/html/producao.com.br/public/views/templates/manutprevincluir/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:67688501156fdaebe2873e8-40578668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cf43066d2be8cdbb626bb0f611d00fab26be8ea' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/manutprevincluir/lista.html',
      1 => 1459285102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67688501156fdaebe2873e8-40578668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'maquina_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56fdaebe2f28c6_07459912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56fdaebe2f28c6_07459912')) {function content_56fdaebe2f28c6_07459912($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Maquinas - Incluir agendamento para Manutenção Preventiva</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-maquina" action="/manutprevincluir/busca_maquina" method="POST" enctype="multipart/form-data">
                    Descrição:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscadescricao" name="buscadescricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <br>
                            <br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Maquina</th>
                    <th>Grupo de Custo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Numero Série</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maquina_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/manutprevincluir/novo_manutprevincluir/idMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquina'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsGrupoCusto'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMarca'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsModelo'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nrSerie'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusMaquina'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/manutprevincluir/novo_manutprevincluir/idMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/manutprevincluir/delmanutprevincluir/idMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
">  Excluir</a></td>
                </tr>
                <?php } ?>        
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
    </div>
</div>
<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
