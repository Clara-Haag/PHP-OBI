<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Maior Valor</title>
</head>
<body>
	<h1>Maior Valor</h1>
	<p><a href="index.php">Voltar</a></p>
	<p>Nesta tarefa, dados três números inteiros N , M e S você deve escrever um programa para determinar o maior número inteiro I tal que</p>
	<ul>
		<li>I está dentro do intervalo [N, M] (ou seja, I ≥ N e I ≤ M ).</li>
		<li>A soma dos dígitos de I é igual a S</li>
	</ul>
	<h2>Entradas</h2>
	<form action='maior_valor.php' method='POST'>
		Menor valor: <input type='number' name='N'/> <br/>
		Maior valor: <input type='number' name='M'/> <br/>
		Soma dos dígitos: <input type='number' name='S'/> <br/>
		<input type='submit'/>
	<form>
	<h2>Saídas</h2>
	<?php
		require 'funcs.php';
		if (have_warning($_POST,'M','N','S')){
			$M = $_POST['M'];
			$N = $_POST["N"];
			$S = $_POST['S'];
			$sum = 0;
			$res = [-1];
			
			for ($I = $N; $I <= $M; $I++) {
				$I_str = (string)$I;
				global $sum;
				$sum = 0;
				foreach (str_split($I_str) as $digito) {
					global $sum, $I_str;
					$sum += (int) $digito;
				};
				if ($sum == $S){
					global $res;
					array_push($res,$I);
				};
			};
			$res = array_reverse($res);
			echo "<p><strong>Maior número em que os dígitos somam $S:</strong> $res[0]</p>";
		};
	?>
</body>
</html>
