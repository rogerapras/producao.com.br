<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:42:52
         compiled from "/var/www/html/producao.com.br/public/views/templates/maoobra/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:484811637572380fcdaf9b3-00362333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec4efe55d30763acdd534c62b6e7bc464734ce2f' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/maoobra/lista.html',
      1 => 1456006999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '484811637572380fcdaf9b3-00362333',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'maoobra_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572380fce19295_47496663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572380fce19295_47496663')) {function content_572380fce19295_47496663($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Mao de Obra</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-maoobra" action="/maoobra/busca_maoobra" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/maoobra/novo_maoobra"> Nova Mao de Obra</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Mao de Obra</th>
                    <th>Tipo de Mao de Obra</th>
                    <th>Unidade</th>
                    <th>Valor Unitário</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maoobra_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/maoobra/novo_maoobra/idMaoObra/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaoObra'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaoObra'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaoObra'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoMaoObra'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUnidade'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlUnitario'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/maoobra/novo_maoobra/idMaoObra/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaoObra'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/maoobra/delmaoobra/idMaoObra/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaoObra'];?>
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
