<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Home</title>
</head>
<body>

	<h1>Olá Universo!</h1>

	<?php
		echo "<h2>OBI</h2>";
		$paginas = ['hotel','bombom','maior valor','chuva'];
		echo "<ul>";
		foreach ($paginas as $pag) {
			$link = str_replace(' ','_',$pag) . '.php';
			echo "<li><a href='$link'>$pag<a></li>";
		};
		echo "</ul>";
	?>
	
	<h2>Echo</h2>
	<form action='index.php' method='POST'>
		Teste: <input type='text' name='teste'/>
		<input type='submit'/>
	</form>
	<br/>
	<?php
		require('funcs.php');
		// printa só se tiver o form
		if (have_warning($_POST,'teste')) {
			echo $_POST['teste'];
		};
	?>

</body>
</html>
