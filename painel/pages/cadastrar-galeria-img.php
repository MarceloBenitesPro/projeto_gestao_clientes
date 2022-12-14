<div class="box-content">
	<h2><i class="fa-solid fa-book"></i> Cadastrar imagem da galeria</h2>
	<form method="post" enctype="multipart/form-data">
		<?php

		   if(isset($_POST['acao'])){
             //Enviei o meu formulario
               $nome = $_POST['nome'];
               $imagem = $_FILES['imagem'];
               if($nome == ''){
                Painel::alert('erro','O campo nome está vazio!');
             }else{
              //Podemos cadastrar!
               if(Painel::imagemValida($imagem) == false){
                   Painel::alert('erro', 'O formato especificado não está correto!');
               }else{
                 // Apenas cadastrar no banco de dados!
                // include('../classes/lib/WideImage.php');
                 $imagem = Painel::uploadFile($imagem);
                 //WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);
                 $arr = ['nome'=>$nome,'card'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_galeria'];
                 Painel::insert($arr);
                 Painel::alert('sucesso', 'O cadastro do banner foi realizado com sucesso!');
               }
             }      
		   }
		?>
		<div class="form-group">
      <label>Nome do Slide:</label>
      <input type="text" name="nome" />
    </div><!--form-group-->
    
		<div class="form-group">
			<label>Imagem:</label>
			<input type="file" name="imagem" />
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!" />
		</div><!--form-group-->
	</form>
</div><!--box-content-->