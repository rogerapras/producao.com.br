<?php /* Smarty version Smarty-3.1.18, created on 2016-05-26 19:01:23
         compiled from "/var/www/html/producao.com.br/public/views/templates/menu/menu_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:1155374189574772330e1f80-67554364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bad6ebbccbbb07dcd3c847f949d193301e80dad3' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/menu/menu_lista.html',
      1 => 1455413280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1155374189574772330e1f80-67554364',
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
  'unifunc' => 'content_57477233144251_72588735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57477233144251_72588735')) {function content_57477233144251_72588735($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <br>
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
                    <th>Grupo</th>
                    <th>Descrição</th>
                    <th>Ordem</th>
                    <th>Status</th>
                    <th>Ação</th>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao_pai'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['ordem'];?>
</td>
                    <td> <?php if ($_smarty_tpl->tpl_vars['linha']->value['status']==1) {?>
                        ATIVO
                        <?php } else { ?>
                        $linha.stStatus
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
