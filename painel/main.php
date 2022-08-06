<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="<?php echo INCLUDE_PATH; ?>https://fonts.googleapis.com/css2?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style2.css" />
   <script href="<?php echo INCLUDE_PATH; ?>"src="https://kit.fontawesome.com/f456eda14a.js" crossorigin="anonymous"></script>
</head>
<body>
	<base base = "<?php echo INCLUDE_PATH_PAINEL; ?>">
	<div class="menu">
		<div class="menu-wraper">
	    <div class="box-usuario">
	    	<?php
	    	   if($_SESSION['img'] == ''){ 
	    	?>
	    	<div class="avatar-usuario">
	    		<i class="fa fa-user"></i>
	    	</div><!--avatar-usuario-->
	    <?php }else{?>
	    	 <div class="imagem-usuario">
	    	    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
	    	</div><!--avatar-usuario-->
	    <?php } ?>
	    	<div class="nome-usuario">
	    		<p><?php echo $_SESSION['nome']; ?></p>
	    		<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
	    	</div><!--nome-usuario-->
	    </div><!--box-usuario-->
	    <div class="items-menu">

	    	<h2>Admintração do Painel</h2>
	    	<a <?php selecionadoMenu('editar-usuario'); ?>href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario"><i class="fa-solid fa-pencil"></i>  Editar Usuario</a>
	    	<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario"><i class="fa-solid fa-user"></i>  Adicionar Usuários</a>
	    
	    	
			<h2>Gestão de Clientes</h2> 
			<a <?php selecionadoMenu('cadastrar-clientes'); ?>href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-clientes">Cadastrar Clientes</a>
			<a <?php selecionadoMenu('gerenciar-clientes'); ?>href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-clientes">Gerenciar Clientes</a>
	    </div><!--itens-menu-->
	</div><!--menu-wraper-->
	</div><!--menu-->
	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa-solid fa-bars"></i>
			</div><!--menu-btn-->
			<div class="loggout">
				<a <?php selecionadoMenuPrincipal('home'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>home"><i class="fa-solid fa-home"></i><span> Página Inicial</span></a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa-solid fa-arrow-right-from-bracket"></i><span style="color: white;"> Sair</span></a>
			</div><!--loggout-->
			<div class="clear"></div>
		</div><!--center-->
	</header>
	<div class="content">
		<?php Painel::carregarPagina(); ?>
	</div><!--content-->
	<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.mask.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	  <script>
	  tinymce.init({ 
	  	selector:'.tinymce',
	  	plugins: ['image','link','media'],
	  	height:300
	   });
	  </script>
	 <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/helperMask.js"></script>
	 <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.ajaxform.js"></script>
	 <script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
	 <?php Painel::loadJS(array('ajax.js'),'gerenciar-clientes'); ?>
	 <?php Painel::loadJS(array('ajax.js'),'cadastrar-clientes'); ?>
	 <?php Painel::loadJS(array('ajax.js'),'editar-cliente'); ?>
</body>
</html>