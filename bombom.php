<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Bombom</title>
</head>
<body>
	<h1>Bombom</h1>
	<p><a href="index.php">Voltar</a></p>
	<p>Bombom é um jogo de cartas para duas pessoas, jogado com apenas dezesseis cartas: Ás, Valete, Dama e Rei, nos quatro naipes (Copas, Espadas, Ouros e Paus). Cada carta tem um valor, que depende da figura e do naipe</p>
	<p>A cada partida, as cartas são embaralhadas e colocadas em um monte. Inicialmente uma carta do monte é virada e mostrada aos dois jogadores: o naipe dessa carta é chamado de naipe dominante da partida.</p>
	<p>Então cada jogador recebe três cartas do monte. Ganha a partida o jogador que tem as cartas cuja soma dos valores é maior.</p>
	<p>O valor das cartas é dado na tabela abaixo:</p>
	<table>
		<tr>
			<th>Figura</th>
			<th>Naipe não dominante</th>
			<th>Naipe Dominante</th>
		</tr>
		<tr>
			<td>Ás</td>
			<td>10</td>
			<td>14</td>
		</tr>
		<tr>
			<td>Valete</td>
			<td>11</td>
			<td>15</td>
		</tr>
		<tr>
			<td>Dama</td>
			<td>12</td>
			<td>16</td>
		</tr>
		<tr>
			<td>Rei</td>
			<td>13</td>
			<td>17</td>
		</tr>
	</table>
	<p>Luana e Edu estão jogando Bombom e querem sua ajuda para determinar o vencedor da partida, ou se há empate.</p>
	<h2>Entradas</h2>
	<form action='bombom.php' method='POST'>
		<p>Cartas tiradas:</p> <textarea name='cartas_entrada' rows='7' cols='2' wrap='hard'></textarea> <br/>
		<input type='submit'/>
	<form>
	<h2>Saídas</h2>
	<?php
		require 'funcs.php';
		if (have_warning($_POST,'cartas_entrada')){
			// 1ª - Dominante | 2-4 Luana | 5-7 Edu
			$cartas = explode("\n", $_POST["cartas_entrada"]);
			$carta_dom = $cartas[0];
			$naipe_dom = $carta_dom[1];
			$val_norm = ["A" => 10, "J" => 11, "Q" => 12, "K" => 13];
			$val_dom = ["A" => 14, "J" => 15, "Q" => 16, "K" => 17];
			
			$cartas_lu = [$cartas[1],$cartas[2],$cartas[3]];
			$cartas_edu = [$cartas[4],$cartas[5],$cartas[6]];
			$pontos_lu = 0;
			$pontos_edu = 0;
			
			foreach ($cartas_lu as $carta){  
				global $val_dom, $val_norm, $naipe_dom, $pontos_lu;
				
				if ($carta[1] == $naipe_dom){
					$pontos_lu += $val_dom[$carta[0]] ;
				} else {
					$pontos_lu += $val_norm[$carta[0]];
				};
			};
			foreach ($cartas_edu as $carta){  
				global $val_dom, $val_norm, $naipe_dom, $pontos_edu;
				
				if ($carta[1] == $naipe_dom){
					$pontos_edu += $val_dom[$carta[0]] ;
				} else {
					$pontos_edu += $val_norm[$carta[0]];
				};
			};
			
			if ($pontos_lu > $pontos_edu){
				echo "<p><strong>Luana é a vencedora!</strong></p>";
			} elseif ($pontos_lu < $pontos_edu) {
				echo "<p><strong>Edu é o vencedor!</strong></p>";
			} else {
				echo "<p><strong>Ocorreu um empate!</strong></p>";
			};
			echo "<p>Pontos da Luana: $pontos_lu</p><p>Pontos do Edu: $pontos_edu</p>";
		};
	?>
</body>
</html>
