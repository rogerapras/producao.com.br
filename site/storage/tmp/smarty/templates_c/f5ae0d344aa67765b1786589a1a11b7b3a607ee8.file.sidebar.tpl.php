<?php /* Smarty version Smarty-3.1.18, created on 2016-05-28 22:01:21
         compiled from "/var/www/html/producao.com.br/public/views/templates/comuns/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2093014679574a3f6109ffd8-71424234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5ae0d344aa67765b1786589a1a11b7b3a607ee8' => 
    array (
      0 => '/var/www/html/producao.com.br/public/views/templates/comuns/sidebar.tpl',
      1 => 1454718459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2093014679574a3f6109ffd8-71424234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574a3f610c2d44_94588821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574a3f610c2d44_94588821')) {function content_574a3f610c2d44_94588821($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/dashboard"><?php echo @constant('NOME_APLICACAO');?>
</a>            
        </div>        
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">   
        
        <?php if (isset($_SESSION['user']['nome'])) {?>
             <ul class="nav navbar-nav side-nav">     
                 <?php echo $_SESSION['user']['menu_sidebar'];?>
                
             </ul>        
             <ul class="nav navbar-nav navbar-right navbar-user">
                 <li><a href="/dashboard">Dashboard</a></li>
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if (isset($_SESSION['user']['nome'])) {?><?php echo $_SESSION['user']['nome'];?>
<?php }?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profile"><i class="fa fa-user"></i> Perfil</a></li>                                                
                        <li class="divider"></li>
                        <li><a href="/trocar_senha/troca_senha"><i class="fa fa-user"></i>Trocar Senha</a></li>
                        <li class="divider"></li>
                        <li><a href="/login/logout"><i class="fa fa-power-off"></i> Sair</a></li>
                    </ul>
                </li>
             </ul>
        <?php } else { ?>
             <ul class="nav navbar-nav side-nav">
                <li class="active"><a href="/login"><i class="fa fa-dashboard"></i> Login</a></li>
             </ul>
        <?php }?>
    </div><!-- /.navbar-collapse -->
</nav><?php }} ?>
