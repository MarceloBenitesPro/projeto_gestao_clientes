<?php
	if(isset($_GET['excluir'])){
        $idExcluir = (int)$_GET['excluir'];
        $selectImagem = MySql::conectar()->prepare("SELECT 'card' FROM `tb_site.slides` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));
        $imagem = $selectImagem->fetch()['card'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_galeria',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-galeria');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
       Painel::orderItem('tb_galeria',$_GET['order'],$_GET['id']);
  }
   $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
   $porPagina = 4;
   $card = Painel::selectAll('tb_galeria',($paginaAtual - 1 )* $porPagina,$porPagina);
   
?>
<div class="box-content">
	<h2><i class="fa-solid fa-file-pen"></i> Cards Inseridos</h2>
	<div class="wraper-table">
   <table>
   	  <tr>
   	  	<td><i class="fa-solid fa-id-card"></i> Nome:</td>
   	  	<td><i class="fa-solid fa-calendar-pen"></i> Imagem:</td>
   	  	<td><i class="fa-solid fa-pencil"></i> Editar:</td>
   	  	<td><i class="fa-solid fa-circle-xmark"></i> Deletar:</td>
        <td><i class="fa-solid fa-arrow-up"></i></td>
        <td><i class="fa-solid fa-arrow-down"></i></td>

   	  </tr>
   	     <?php
   	       foreach ($card as $key => $value) {   
   	     ?>
   	  <tr>
   	  	<td><?php echo $value['nome']; ?></td>

   	  	<td><img style="width:50px; height:50px; "src="<?php echo INCLUDE_PATH_PAINEL ?>/uploads/<?php echo $value['card']; ?>" /></td>
   	  	<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-foto-galeria?id=<?php echo $value['id']; ?>"><i class="fa-solid fa-pencil"></i></a></td>
   	  	<td><a actionBtn ="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-galeria?excluir=<?php echo $value['id']; ?>"><i class="fa-solid fa-circle-xmark"></i></a></td>
        <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-galeria?order=up&id=<?php echo $value['id']?>"><i class="fa-solid fa-arrow-up"></i></a></td>
        <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-galeria?order=down&id=<?php echo $value['id']?>"><i class="fa-solid fa-arrow-down"></i></a></td>
   	  </tr>
   	<?php } ?>
   </table>
</div><!--wraper-table-->

<div class="paginacao">
	<?php
	  $totalPaginas = ceil(count(Painel::selectAll('tb_site.slides')) / $porPagina);
     
     for($i = 1 ; $i <= $totalPaginas; $i++){
     	if($i == $paginaAtual)
        echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
        else
        echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
     }

	?>
</div><!--paginacao-->

</div><!--box-content-->

