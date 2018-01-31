<?php
	class dbconnection{
		const var_server = "localhost";
		const var_username = "root";
		const var_password = "";
		const var_dbname = "techweb";
		public $connessione;

		public function opendDBConnection(){
			// restituisce un oggetto connessione che servira' per fare le query 
			$this->connessione = mysqli_connect(static::var_server, static::var_username, static::var_password, static::var_dbname);
			if(!$this->connessione)
				return false;
			else
				return true; 
			}

		public function getConnessione(){
				return $this->connessione;
		}

		public function runQuery($query){
			$result = mysqli_query($this->connessione,$query);
	        return $result;
		}

		public function canLog($mail, $pass){
			$result = mysqli_query($this->connessione,"SELECT * FROM utente WHERE mail = '$mail' AND password = '$pass'");
	        $row = mysqli_fetch_array($result);
	        $num_rows = $result->num_rows;
	        if($num_rows == 1)
	        	return true;
	        else
	        	return false;
		}

		public function getRegistration($mail, $pass, $user, $nome, $cognome){
			$result = mysqli_query($this->connessione,"INSERT INTO utente(mail,password,username,nome,cognome) VALUES ('$mail','$pass', '$user', '$nome', '$cognome')");
	        if($result) 
	        	return true;
	        else
	        	return false;
		}

		public function isAlreadyRegistered($mail){
			$result = mysqli_query($this->connessione,"SELECT * FROM utente WHERE mail = '$mail'");
	        $row = mysqli_fetch_array($result);
	        $num_rows = $result->num_rows;
	        if($num_rows == 1)
	        	return true;
	        else
	        	return false;
		}

		public function getArticoliRecenti(){
			$result = mysqli_query($this->connessione,"SELECT * FROM articolo A JOIN articolo_media AM ON (A.mail = AM.mail AND A.titolo = AM.titolo) JOIN media M ON (AM.id = M.id) order by A.data DESC limit 6");
	        mysqli_close($this->connessione);
	        $num_rows = $result->num_rows;
	        if($num_rows >= 1)
	        	return $result;
	        else
	        	return false;
		}

		public function getDatiUser($mail){	
			$result = mysqli_query($this->connessione,"SELECT * FROM utente WHERE mail = '$mail'");
	        mysqli_close($this->connessione);
	        $num_rows = $result->num_rows;
	        if($num_rows == 1)
	        	return $result;
	        else
	        	return false;
		}

	}
?>