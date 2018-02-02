<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml", lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" media="handheld, screen"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="handheld, screen"/>
        <link rel="stylesheet" type="text/css" href="../css/chisiamo.css" media="handheld, screen"/>
        <link rel="stylesheet" type="text/css" href="../css/style_mobile.css" media=" screen and (max-width: 480px), only screen and (max-device-width: 480px)"/><link rel="stylesheet" type="text/css" href="../css/style_print.css" media="print"> 

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil" media="handheld, screen"/>

		<link rel='shortcut icon' type='image/x-icon' href='../images/logo.ico' />

     	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script type="text/javascript" src="../JavaScript/hamburgermenu.js"></script>

		<title>Chi siamo - Autosecurity</title>
	</head>
	<body onresize="reset()">
		<div id="header">
			<!-- testa (logo) -->
			<a href="../php/index.php"><img id="logo" src="../images/logo.png" alt="logo auto security"></a>
		</div>

		<!-- -------------------------------------------------------------------------- -->


		<div id="breadcrumb">
			<header>
				<button id="hamburger" onclick="dropdown()">&#9776;</button>
	    		<button id="cross" onclick="dropup()">&#735;</button>
	    	</header>

	    	<div id="div_search">
					<p id="search_bar">
						<input id="text_search" type="text" name="search" placeholder="cerca"/>
						<input type="button" id="button_search" value="Cerca"/>
					</p>
			</div>

			<ul class="nav" role="menubar">
			  <li id="home" class="link" role="menuitem"><a class="main" href="../php/index.php">Home</a></li>
			  <li id="art" class="link" role="menuitem"><a class="main" href="#">Articoli</a></li>
			  <li id="args" class="link" role="menuitem">
					<a class="main" href="#">Argomenti</a>
					<ul id="dropdown-content" role="menu">
						<li role="menuitem"><a href="#">Alfa</a></li>
						<li role="menuitem"><a href="#">Audi</a></li>
						<li role="menuitem"><a href="#">BMW</a></li>
						<li role="menuitem"><a href="#">Fiat</a></li>
					</ul>
			  </li>
			  <li id="sec" class="link" role="menuitem"><a class="main" href="../html/logout_sicurezza.php">Sicurezza</a></li>
			  <!-- solo per la versione mobile -->
			  <li id="acc" class="link" role="menuitem"><a class="main" href="../html/iscrizione.html">Accedi o Registrati</a></li>
			</ul>
			
		</div>

		<!-- -------------------------------------------------------------------------- -->

		<div id="content_menu"> 
			<div id="menu" class="w3-allerta">
				<!-- menu laterale -->
				<p id="location" class="w3-large">Ti trovi in: Chi siamo<br/>
					Benvenuto: 
					<?php
						session_start();
						require_once 'dbconnection.php';
						$dbaccess = new dbconnection();
						$opendDBConnection = $dbaccess->opendDBConnection();
						if($opendDBConnection == true){
							$dati = $dbaccess->getDatiUser($_SESSION['email']);
							if($dati != false){
								$row = mysqli_fetch_array($dati);
								echo $row['username'];
							}
							else
								echo "Ops! Qualcosa e' andato storto";
						}
					?>
				</p>

				<form action="uscita.php" method="post">
					<p id="id_button_form">
						<input type="submit" id="button_form_accedi" name="submit" value="Esci"/>
					</p>		
				</form>

				<div id="form2">

					<div class="form3">
						<p class="location1" class="w3-large">Tag Frequenti</p>
					</div>

					<p>
						<ul class="nav">
						  <li><a href="#">Abarth</a></li>
						  <li><a href="#">Acura</a></li>
						  <li><a href="#">Alfa Romeo</a></li>
						  <li><a href="#">Alpina</a></li>
						  <li><a href="#">Aston</a></li>
						  <li><a href="#">Martin</a></li>
						  <li><a href="#">Audi</a></li>
						</ul>			
					</p>
				</div>
			</div>

		<!-- -------------------------------------------------------------------------- -->

			<div id="content">
				<div id="weare">	
					<div id="generalita_sito">
						<h2>Il sito</h2>
						<p> Nato come progetto per il corso "Tecnologie Web 17-18" questo sito ha lo scopo di essere un punto di riferimento per gli automobilisti, fornendo articoli sulle ultime novit&agrave; in campo automobilistico e sulla sicurezza stradale.</p>
					</div>
					
					<div id="respons">
						<h2>Responsabili</h2>
						<div id="mat">
							<h3>PELO </h3>
							<img id="pelo" src="../images/pelo.jpg">
							<p> Matteo Pellanda meglio conosciuto come "Pelo" o "Picci", &egrave; il responsabile della parte PHP, Database e della homepage: insomma della parte noiosa<br/>
		                    Siccome non so cosa scrivere, inizier&ograve; a scrivere cose a caso per riempire un po' lo spazio senza dover ricorrere al lorem ipsum perch&egrave; sono di mente superiore rispetto al web designe medio: Tastiera meccanica, snowboard, DOGEN, Mokey mouse</p>
						</div>
						
		                <div id="doge">
							<h3>DOGE(N)</h3>
							<img id="dog" src="../images/doge.jpg">
							<p> Enrico "DogeN" Trinco, l'elemento del gruppo che mostra curiosit&agrave; ma non si applica. I suoi compiti sarebbero la creazione di pagine html e file Javascript ma in realt&agrave; il suo scopo &egrave; la creazione e promozione dello stato "Doggonalia" <br/>
		                    Si distingue dagli altri doge (oltre che per la N finale) dal fatto che vuole diventare un pro di Quake ma con risultati scarsi. Nonostante ci&ograve; meriterebbe lo stesso un bel biscotto di consolazione</p>
						</div>
		                
						<div id="nico">
							<h3>ZAR NIKOLA </h3>
							<img id="nic" src="../images/nico.jpg">
							<p> Nicola Carlesso &egrave; un'ex zar della Russia degli anni d'oro. Subito dopo le sue dimissioni a causa di un colpo di stato ha dichiarato vendetta alla russia e ha deciso di unirsi al gruppo italiano per far vedere che non &egrave; lui ad aver bisgono della Russia, ma &egrave; lei ad aver bisogno di lui. <br/>
							La sua vendetta &egrave; pianificata a colpi di CSS, HTML e sicurezza che scuole guida levatevi proprio che noi abbiamo lo zar di Ruzzia!</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<!-- -------------------------------------------------------------------------- -->

		<div id="footer">
			<!-- fine pagina -->
			<ul class="nav">
				<!-- <li><a href="#">Home</a></li>
				<li><a href="#">Articoli</a></li>
				<li><a href="#">Sicurezza</a></li> -->
				<li id="chisiamo"><a>Chi Siamo</a></li>
				<li id="contacts"><a href="#">Contatti</a></li>
			</ul>		
		</div>

	</body>
</html>