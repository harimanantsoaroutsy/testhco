<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>testhco</title>
	<link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
	<div class="container">
		<div class="row" id="titre">
			<h1>Wiki-Webo-Facto-Search</h1>
		</div>
		<div class="row-fluid" id="formulaire">
			<form class="form-inline" method="post" action="/search">
				<div class="form-group">
					<input type="text" class="form-control" id="searchval" name="searchval" placeholder="Rechercher">
					<button type="submit" class="btn btn-danger" id="search"><span class="glyphicon glyphicon-search"></span></button>
				</div>				
			</form>
		</div>
		<div class="row-fluid" id="result">
			<?php		   
			if(isset($datares)) {
				if(count($datares)==0)
				{
					echo '<h2>Aucun résultat trouvé pour"'.$critere.'"</h2>';
				}
				else{
					echo '<h2>Résultat de la recherche pour"'.$critere.'"</h2>';
					foreach ($datares as $value) {
						echo "<h5>".$value["resultname"] ."<h5><a href='http://wiki.webo-facto.com".$value['link']."' onclick='window.open(this.href); return false;''>"."http://wiki.webo-facto.com/".$value['link']."</a></br>";
					}
				}
			}
			?>
		</div>
	</div>	
</body>
</html>
