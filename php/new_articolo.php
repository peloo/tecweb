<?php require_once "php-funzioni/check_sessione.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" media="handheld, screen"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="handheld, screen"/>
		<link rel="stylesheet" type="text/css" href="../css/style_mobile.css" media=" screen and (max-width: 480px), only screen and (max-device-width: 480px)"/>
		<link rel="stylesheet" type="text/css" href="../css/style_print.css" media="print"/>
		<link rel="stylesheet" type="text/css" href="../css/add_articolo.css" media="handheld, screen"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil" media="handheld, screen"/>
		<link rel='shortcut icon' type='image/x-icon' href='../images/logo.ico' />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="../JavaScript/hamburgermenu.js"></script>
    	<script src="../JavaScript/checkPass.js"></script>

		<title>Nuovo articolo - Autosecurity</title>
	</head> 
	<body onresize="reset()">
		<div id="header">
			<a href="index.php"><img id="logo" src="../images/logo.png" alt="logo auto security"/></a>
		</div>

		<div id="breadcrumb">
			<div id="hamburger_menu">
				<button id="hamburger" onclick="dropdown()">&#9776;</button>
	    		<button id="cross" onclick="dropup()">&#735;</button>
	    	</div>

			
			<form id="search_bar" method="get" action="articoli.php?p=0">
				<input id="text_search" type="text" name="search" placeholder="cerca"/>
				<input type="submit" name="submit" id="button_search" value="Cerca"/>
				<input type="hidden" name="p" value="0"/>
			</form>
			

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
								echo '<li id="scrivi" class="link" role="menuitem"><a class="main" href="new_articolo.php">Scrivi articolo</a></li>'.
									'<li id="esci" class="link" role="menuitem"><a class="main" href="php-funzioni/uscita.php">Esci</a></li>';
					}
					else
						echo '<li id="acc" class="link" role="menuitem"><a class="main" href="../html/iscrizione.html">Accedi o Registrati</a></li>';
				?>
			</ul>
			
		</div>

		<div id="content_menu"> 
			<div id="menu" class="w3-allerta">
				<!-- menu laterale -->
				<p id="location">Ti trovi in: Aggiungi articolo
					<?php require_once "php-funzioni/check_benvenuto.php"; ?>
				</p>

				<div id="form" <?php if($conLog==true) echo "style='border:0;'"?>>
					<?php require_once "php-funzioni/check_accesso.php"; ?>
				</div>

				<div id="form2">

					<div class="form3">
						<p class="location1">Tag Frequenti</p>
					</div>

					<?php require_once "php-funzioni/tag_frequenti.php"; ?>
				</div>
			</div>

			<div id="content">
				<div id="mobile">
					<?php
						if($conLog == true && $opendDBConnection == true){
							if(!$isAdmin)
								echo "<b>Benvenuto: " .$username."</b>";
							else
								echo "<b>Benvenuto admin: ".$username."</b>";
						}
					?>
				</div>
				<div id="form_add_articolo">
					<form name="add_articolo" action="php-funzioni/add_articolo.php" method="post" enctype="multipart/form-data" onsubmit="return checkArticolo()">
	                    Email:<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>
	                    
	                    <label for="titolo">Titolo del articolo:</label><br>
	                    <textarea rows="1" cols="40" id="titolo" name="titolo" placeholder="inserisci qui un titolo"></textarea><br><br>
	                    <label for="contenuto">Contenuto del articolo:</label><br>
	                    <textarea rows="4" cols="40" id="contenuto" name="contenuto" placeholder="inserisci qui il contenuto del articolo"></textarea><br><br>

	                	<p><label>Data corrente del articolo: </label><label id="data_corrente"></label></p> 
	                	<p><input type="file" name="myimage" accept="image/x-png,image/gif,image/jpeg"></p>

	                	<input type="hidden" name="data" id="data_corrente2" value=""/>
						<script>
							var d = new Date();
						    var day = d.getDate();
						  	var month = d.getMonth()+1;
						  	var year = d.getFullYear();
						    document.getElementById("data_corrente").innerHTML = day + '-' + month + '-' + year;
						    document.getElementById("data_corrente2").value = year + '-' +  month + '-' + day;
						</script>

						<br>
						<p><label for="titolo">Scegli i tag:</label></p>
						<div id=form_tag>
							<?php
								require_once 'php-funzioni/dbconnection.php';
								$dbaccess = new dbconnection();

								$visualizza = $dbaccess->getTag(0);
								if($visualizza != false){
									while($row = mysqli_fetch_assoc($visualizza)){
										$nome=$row['nome'];
										$link_nome=str_replace(" ", "_", $nome);
										?>
										<label for="<?php echo $link_nome;?>">
											<input type="checkbox" name="tag_scelto[]" id="<?php echo $link_nome;?>" value="<?php echo $nome;?>">
											<?php echo $nome;?></label>
										<?php
									}
								} 
							?>
							<input type="checkbox" name="tag_scelto[]" style="display: none" value="NA" checked="checked">
						</div>
						<div id=form_bottoni>
							<p id="scrivi_i_miei_articoli">
			                    <input type="submit" name="submit" id="button_form_scrivi" value="Scrivi">
			                    <input type="button" id="i_miei_articoli" value="I miei articoli" onclick="window.location.href='../php/miei_articoli.php'" />
	                    	</p>
	                    	<p id="form_da_aprovare">
	                    		<?php
	                    		$dbaccess = new dbconnection();
								$visualizza = $dbaccess->isAdmin($_SESSION['email']);
								if($visualizza)
	                    			echo "<a class='da_approvare' href='../php/articoli_da_approvare.php?p=0'>Articoli da approvare</a>";
	                    		?>
	                    	</p>
						</div>
						
	            	</form>
            	</div>
			</div>
		</div>

		<div id="footer"> 
			<ul class="nav">
				<li id="chisiamo"><a href="weare.php">Chi Siamo</a></li>
				<li id="contacts"><a href="../php/contatti.php">Contatti</a></li>
			</ul>
		</div>
	</body>
</html>