<?php /* Smarty version Smarty-3.1.18, created on 2016-05-28 21:57:37
         compiled from "/var/www/html/producao.com.br/public/views/templates/tipoagenda/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:2001370116574a3e816025d5-40226604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49de0d3ca2a2e7f23059d5ec36fa140b8f30dfb6' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/tipoagenda/lista.html',
      1 => 1457040036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2001370116574a3e816025d5-40226604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'tipoagenda_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574a3e816a4d71_92770524',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574a3e816a4d71_92770524')) {function content_574a3e816a4d71_92770524($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Status de Horário de Agenda</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-tipoagenda" action="/tipoagenda/busca_tipoagenda" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/tipoagenda/novo_tipoagenda">Novo Tipo</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipoagenda_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/tipoagenda/novo_tipoagenda/idTipoAgenda/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoAgenda'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoAgenda'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoAgenda'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/tipoagenda/novo_tipoagenda/idTipoAgenda/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoAgenda'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/tipoagenda/deltipoagenda/idTipoAgenda/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoAgenda'];?>
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
