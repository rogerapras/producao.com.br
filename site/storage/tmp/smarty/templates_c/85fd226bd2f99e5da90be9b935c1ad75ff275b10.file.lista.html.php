<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:44:08
         compiled from "/var/www/html/producao.com.br/public/views/templates/motivobaixa/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:32051267357238148903226-84576836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85fd226bd2f99e5da90be9b935c1ad75ff275b10' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/motivobaixa/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32051267357238148903226-84576836',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'motivobaixa_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723814892fb05_45719677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723814892fb05_45719677')) {function content_5723814892fb05_45719677($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Motivo de Baixa</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-motivobaixa" action="/motivo/busca_motivobaixa" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/motivobaixa/novo_motivobaixa"> Novo Motivo de Baixa</a>
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
 $_from = $_smarty_tpl->tpl_vars['motivobaixa_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/motivobaixa/novo_motivobaixa/idMotivoBaixa/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMotivoBaixa'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idMotivoBaixa'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMotivoBaixa'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/motivobaixa/novo_motivobaixa/idMotivoBaixa/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMotivoBaixa'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/motivobaixa/delmotivobaixa/idMotivoBaixa/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMotivoBaixa'];?>
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
