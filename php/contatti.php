<?php require_once "php-funzioni/check_sessione.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../css/contattaci.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../css/style_mobile.css" media=" screen and (max-width: 945px), only screen and (max-width: 945px)"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil" media="screen"/>
		<link rel='shortcut icon' type='image/x-icon' href='../images/logo.ico' />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="../JavaScript/hamburgermenu.js"></script>
        <script src="../JavaScript/checkPass.js"></script>

		<title>Contatti - Autosecurity</title>
	</head> 
	<body onresize="reset()">
		<?php require_once "header.php"; ?>

		<div id="breadcrumb">
			<?php require_once "hamburger_search.php"; ?>
			

			<ul class="nav" role="menubar">
			  <li id="home" class="link" role="menuitem"><a class="main" href="index.php">Home</a></li>
			  <li id="art" class="link" role="menuitem"><a class="main" href="articoli.php?p=0">Articoli</a></li>
			  <li id="args" class="link" role="menuitem">
					<a class="main">Argomenti</a>
					<ul id="dropdown-content" role="menu">
						<li><a href="articoli.php?p=0&r=Alfa_Romeo">Alfa</a></li>
						<li><a href="articoli.php?p=0&r=Audi">Audi</a></li>
						<li><a href="articoli.php?p=0&r=BMW">BMW</a></li>
						<li><a href="articoli.php?p=0&r=Fiat">Fiat</a></li>
					</ul>
			  </li>
			  <li id="sec" class="link" role="menuitem"><a class="main" href="sicurezza.php">Sicurezza</a></li>
			  <!-- solo per la versione mobile -->
			  <?php
					if($conLog==true){
						if($opendDBConnection == true)
								echo '<li id="scrivi" class="link" role="menuitem"><a class="main" >Scrivi articolo</a></li>'.
									'<li id="esci" class="link" role="menuitem"><a class="main" href="php-funzioni/uscita.php">Esci</a></li>';
					}
					else
						echo '<li id="acc" class="link" role="menuitem"><a class="main" href="../html/iscrizione.html">Accedi o Registrati</a></li>';
				?>
			</ul>
			
		</div>

		<div id="content_menu"> 
			<div id="menu" class="w3-allerta">
				<p id="location">Ti trovi in: Contatti
					<?php require_once "php-funzioni/check_benvenuto.php"; ?>
				</p>

				<?php require_once "accesso_tag.php"; ?>
			</div>

			<div id="content">
				<?php require_once "mobile.php"; ?>
				<div id="contattaci">
                    <h2> CONTATTACI </h2>
                    <p> Hai riscontrato problemi con il sito oppure vuoi metterti in contatto con uno dei responsabili? Inviaci un'email ed uno di loro ti risponderà il prima possibile</p>
				
                    <form id="invia_email" name="invia_email" action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" onsubmit="return CheckContatti()">
						<br>
	                    <label for="email">Email:</label><br>
	                    <input type="text" name="email" id="email" placeholder="inserisci qui la mail"><br><br>
	                    
	                    <label for="oggetto">Oggetto:</label><br>
	                    <textarea rows="1" cols="50" id="oggetto" name="oggetto" placeholder="inserisci qui l'oggetto"></textarea><br><br>

	                    <label for="contenuto">Contenuto dell'email:</label><br>
	                    <textarea rows="4" cols="50" id="contenuto" name="contenuto" placeholder="inserisci qui il contenuto dell'email"></textarea><br><br>

	                    <p>
	                		<label>Data di oggi: </label><label id="data_corrente"></label>  
	                	</p>
	                	<input type="hidden" name="data" id="data_corrente2" value=""/>
						<script>
							var d = new Date();
						    var day = d.getDate();
						  	var month = d.getMonth()+1;
						  	var year = d.getFullYear();
						    document.getElementById("data_corrente").innerHTML = day + '-' + month + '-' + year;
						    document.getElementById("data_corrente2").value = year + '-' +  month + '-' + day;
						</script>

	                    <input type="submit" name="submit" id="invia" value="Contattaci">

	                    <?php require_once 'php-funzioni/contattaci.php' ?>

            		</form><br><br>
                    
                    <p>In alternativa, se preferisci scrivere ad un specifico responsabile puoi contattarlo ad una delle seguenti email: </p><br>
                <ul>
                    <li>Matteo: pellandamatteo@autosecurity.it</li>
                    <li>Nicola: carlessonicola@autosecurity.it</li>
                    <li>Enrico: trincoenrico@autosecurity.it</li>
                </ul>
                    
            	</div>    
			</div>
		</div>

		<?php require_once "footer.php"; ?>
	</body>
</html>