<?php /* Smarty version Smarty-3.1.18, created on 2016-03-06 09:17:45
         compiled from "/var/www/html/producao.com.br/public/views/templates/tipomovimento/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:57012926456dc1fe94ca060-42150511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf14813d2b7d5207efbe3c2ee72886bfdf1ff29' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/tipomovimento/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57012926456dc1fe94ca060-42150511',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'tipomovimento_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56dc1fe9561477_40404927',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dc1fe9561477_40404927')) {function content_56dc1fe9561477_40404927($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Tipos de Movimento</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-tipomovimento" action="/tipomovimento/busca_tipomovimento" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/tipomovimento/novo_tipomovimento"> Novo Tipo</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>E/S</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipomovimento_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/tipomovimento/novo_tipomovimento/idTipoMovimento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoMovimento'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoMovimento'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoMovimento'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['stDC'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/tipomovimento/novo_tipomovimento/idTipoMovimento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoMovimento'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/tipomovimento/deltipomovimento/idTipoMovimento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoMovimento'];?>
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
