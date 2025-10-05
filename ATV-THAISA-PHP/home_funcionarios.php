<html>
<title> CADASTRO DE FUNCIONÁRIOS </title>
<head>
<link rel="stylesheet" href="styles/home_style.css">
</head>

<body>

<div class="main">
	
	<div class = "TITTLE">
		<form name="form1" method="post" >
		<legend> <h1> CADASTRO DE FUNCIONÁRIOS </h1> <legend>
	</div>
	
	<fieldset>
	
	<div>
		<b>DADOS DO FUNCIONÁRIO:  <br> <br> </b>
	</div>

	<div class="registro">
		N° REGISTRO <br>
		<input type="text" name="txt_registro" size="30"> 
	</div>

	<div class="nome_data">
		
		<div>
			<br> NOME DO FUNCIONÁRIO: <br>
			<input class="inpute" type="text" name="txt_nome" size="30"> <br>
		</div>

		<div>
			<br> DATA DE ADMISSÃO: <br>
			<input class="inpute" type="date" name="dt_data" size="30"> <br>
		</div>
	
	</div>

	<div class="cargo_qnt_salario_min">

		<div> CARGO: <br>	
			<?php
				$cargos = [
					"Desenvolvedor Backend",
					"Desenvolvedor Frontend",
					"Designer UX/UI",
					"Gerente de Projetos",
					"Analista de QA",
					"DevOps"
				];
			?>

			<select name="cargo" id="cargo">
				<option value="">Selecione seu cargo...</option>
				
				<?php
					foreach ($cargos as $cargo) {
						echo '<option value="' . htmlspecialchars($cargo) . '">' . htmlspecialchars($cargo) . '</option>';
					}
				?>
			</select>
		</div>

		<div>
			<br> QUANTIDADE DE SALÁRIOS MINIMOS: <br>
			<input type="text" name="txt_qnt_salario_min" size="30"> <br>
		</div>

	</div>
	
	</fieldset>

	<div class="bnt_enviar_listar">
		
		<br> <br> <br> 
		<INPUT class="button" TYPE="submit" name="bt_incluir" VALUE="CADASTRAR" onClick="document.form1.action='gravar.php'"> 
	
		
		<div class="bnt_listar">
			<a href="listagem.php"> VISUALIZAR DEMONSTRATIVOS DE PAGAMENTOS </a>	
		</div>
	
	</div>
	

	</form>
</div>

</body>
</html>

