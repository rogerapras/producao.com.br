<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:13
         compiled from "/var/www/html/producao.com.br/public/views/templates/osfinalizadas/osinsumo.html" */ ?>
<?php /*%%SmartyHeaderCode:1902069557572380992a0616-41448378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05e7d913ef5ffec28d20092f36d01abe26d9a332' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/osfinalizadas/osinsumo.html',
      1 => 1459116135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1902069557572380992a0616-41448378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_ostarefainsumo' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572380992cd175_14309764',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572380992cd175_14309764')) {function content_572380992cd175_14309764($_smarty_tpl) {?>                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Insumo</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Observacao</th>
                            <th>Tarefa</th>
                            <th>Resumo Tarefa</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_ostarefainsumo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsInsumo'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtInsumo'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUnidade'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTarefa'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacaoTarefa'];?>
</td> 
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>

<?php }} ?>
