<?php /* Smarty version Smarty-3.1.18, created on 2016-01-11 11:12:46
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tentativa_motivo/tentativa_motivo_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:5306052615693aa4e1a17c0-54059703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d8b29204f3d7f156d9980c652d8c48d6aa69f77' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tentativa_motivo/tentativa_motivo_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5306052615693aa4e1a17c0-54059703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'tentativa_motivo_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5693aa4e206969_33700703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5693aa4e206969_33700703')) {function content_5693aa4e206969_33700703($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
      <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
      <h1>Lista de Tentativa Motivo</h1>  
       <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-tentativa_motivo" action="/tentativa_motivo/busca_tentativa_motivo" method="POST" enctype="multipart/form-data">
                    <b>Descrição:</b>
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
     <a class="btn btn-primary" href="/tentativa_motivo/novo_tentativa_motivo">Nova Tentativa Motivo</a>   <br><br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tentativa_motivo_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
        <tr>
            <td><a href="/tentativa_motivo/novo_tentativa_motivo/id_tentativa_motivo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_tentativa_motivo'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_tentativa_motivo'];?>
</a></td>
            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
            <td> <a class="glyphicon glyphicon-pencil" href="/tentativa_motivo/novo_tentativa_motivo/id_tentativa_motivo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_tentativa_motivo'];?>
">Editar</a> |
                 <a class="glyphicon glyphicon-trash" href="#" onclick="confirma_excluir_item(<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_tentativa_motivo'];?>
)">Excluir</a> </td>

        </tr>
        <?php } ?>        
    </tbody>
</table>
          
     

<!--Altere daqui pra cima-->
    </div>
</div>

<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/bootbox.min.js"></script>
<script src="/files/js/util.js"></script>
<script src="/files/js/tentativa_motivo/tentativa_motivo_lista.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
