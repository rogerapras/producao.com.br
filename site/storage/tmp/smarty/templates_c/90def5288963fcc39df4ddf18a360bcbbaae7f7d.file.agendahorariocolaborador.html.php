<?php /* Smarty version Smarty-3.1.18, created on 2016-05-28 22:01:21
         compiled from "/var/www/html/producao.com.br/public/views/templates/agendahorario/agendahorariocolaborador.html" */ ?>
<?php /*%%SmartyHeaderCode:477477958574a3f610c5602-66124559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90def5288963fcc39df4ddf18a360bcbbaae7f7d' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/agendahorario/agendahorariocolaborador.html',
      1 => 1457267590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '477477958574a3f610c5602-66124559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_agendacolaboradores' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574a3f610d8816_21158059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574a3f610d8816_21158059')) {function content_574a3f610d8816_21158059($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Colaborador</th>
                            <th>Setor</th>
                            <th>Cargo</th>
                            <th>Mão de Obra</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_agendacolaboradores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsColaborador'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsSetor'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCargo'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaoObra'];?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="delcolaborador(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
);" > Excluir </a>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>

<?php }} ?>
