<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:53:11
         compiled from "/var/www/html/producao.com.br/public/views/templates/saidaestoque/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:91671591657238367b46776-89958614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '384a460e0b56f76cde4ff0792dc7a1535ae3d412' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/saidaestoque/lista.html',
      1 => 1454531350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91671591657238367b46776-89958614',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'movimentoitens' => 0,
    'linha' => 0,
    'totalmovimento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238367b79057_44162169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238367b79057_44162169')) {function content_57238367b79057_44162169($_smarty_tpl) {?>        <!--Altere daqui pra baixo-->
        <h3>Lista de insumos digitados nesta saida de estoque:</h3>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
<!--                    <th>Sequencia</th>-->
                    <th>Código</th>
                    <th>Nome do Insumo</th>
                    <th>Grupo</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
<!--                    <th>Ação</th>-->
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['movimentoitens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
<!--                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idMovimentoItem'])===null||$tmp==='' ? '' : $tmp);?>
</td>-->
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idInsumo'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsInsumo'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsGrupo'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['qtMovimento'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlUnitario'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlMovimento'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
<!--                    <td>
                        <a class="glyphicon glyphicon-trash" onclick="saidaestoque.delmovimentoitem(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMovimentoItem'];?>
);">  Excluir</a>
                    </td>-->
                </tr>
                <?php } ?>        
            </tbody>
            <tfoot>
                <tr>
<!--                    <td></td>-->
                    <td></td>
                    <td><strong>Valor Total desta Entrada:</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalmovimento']->value)===null||$tmp==='' ? '' : $tmp);?>
 </strong></td>
                </tr>
            </tfoot>
        </table>
        <!--Altere daqui pra cima-->
<?php }} ?>
