<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:29:42
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/menu/menu_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:59769742756966d66980c20-46897561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95cf2934a44d403cfb00e30237f690e56b9b0669' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/menu/menu_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59769742756966d66980c20-46897561',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'menu_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56966d669c4cf7_00052293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56966d669c4cf7_00052293')) {function content_56966d669c4cf7_00052293($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->   
        <h1>Lista de Menus</h1>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-menu" action="/menu/busca_menu" method="POST" enctype="multipart/form-data">
                    Descrição:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscadescricao" name="buscadescricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button><br><br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>   
        <a href="/menu/novo_menu" class="btn btn-primary">Novo Menu</a>   
        <br><br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Cod.</th>                    
                    <th>Descrição</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                <tr>
                    <td><a href="/menu/novo_menu/idMenu/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMenu'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idMenu'];?>
</a></td>                                        
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
                    <td> <?php if ($_smarty_tpl->tpl_vars['linha']->value['status']==1) {?>
                        ATIVO
                        <?php } else { ?>
                        $linha.status
                        <?php }?></td>                    
                    <td> 
                        <a class="glyphicon glyphicon-pencil" href="/menu/novo_menu/idMenu/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMenu'];?>
">Editar</a> |
                        <a class="glyphicon glyphicon-trash" href="/menu/delmenu/idMenu/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMenu'];?>
">Excluir</a> </td>
                </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                <tr><td colspan="6">Nenhum menu encontrado</td></tr>
                <?php } ?>        
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/menu/menu_lista.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
