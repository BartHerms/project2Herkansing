<?php

	class Klant{
		private $emailadress;
		private $voornaam;
		private $achternaam;
		private $woonplaats;
		private $adres;
		private $bedrijf;
		private $telefoonnummer;
		private $postcode;
		private $password;


		public function getEmailadress(){
			return $this->emailadress;
		}

		public function setEmailadress($input) {

			$this->emailadress = $input;
		}

		public function getVoornaam(){
			return $this->voornaam;
		}

		public function setVoornaam($input){
			$this->voornaam = $input;
		}

		public function getAchternaam(){
			return $this->achternaam;
		}

		public function setAchternaam($input){
			$this->achternaam = $input;
		}

		public function getWoonplaats(){
			return $this->woonplaats;
		}

		public function setWoonplaats($input){
			$this->woonplaats = $input;
		}

		public function getAdres(){
			return $this->adres;
		}

		public function setAdres($input){
			$this->adres = $input;
		}

		public function getBedrijf(){
			return $this->bedrijf;
		}

		public function setBedrijf($input){
			$this->bedrijf = $input;
		}

		public function getTelefoonnummer(){
			return $this->telefoonnummer;
		}

		public function setTelefoonnummer($input){
			$this->telefoonnummer = $input;
		}

		public function getPostcode(){
			return $this->postcode;
		}

		public function setPostcode($input){
			$this->postcode = $input;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($input){
			$this->password = $input;
		}

		public function setKlant($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 9, 0);
            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
			$this->setWoonplaats($dbData[3]);
			$this->setAdres($dbData[4]);
			$this->setBedrijf($dbData[5]);
			$this->setTelefoonnummer($dbData[6]);
			$this->setPostcode($dbData[7]);
			$this->setPassword($dbData[8]);
		}
		
		//a function that executes the getKlant stored procedure.
        //it fills a Klant instance with info form the database
        function getKlantProcedure($Klant, $emailadressKlant){
			define("SERVER_IP", "localhost");
            $db = mysqli_connect(SERVER_IP, "root", "root", "project2");
            $result = $db->query("CALL getKlant('{$emailadressKlant}')");
            $db->close();
            $Klant->setKlant($result);
         }

		 //a function that executes teh getDienstenOfKlantProcedur
		//it fills an array of Dienst instances with Diensten that the Klant has.
		function getDienstOfKlantProcedure(){
			$dienstenArray = array();
			define("SERVER_IP", "localhost");
			$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
			$result = $db->query("CALL getDienstenOfKlant('{$this->getEmailadress()}')");
			$db->close();
			$rowCount = $result->num_rows;
			for ($counter = 1; $counter <= $rowCount; $counter++){
				$DienstOfKlant = new Dienst();
				$DienstOfKlant->setDienst($result);
				array_push($dienstenArray, $DienstOfKlant);
			}
			return $dienstenArray;
		}

		//puts tickets in the database
		function pushTicket($selectedDienst, $ticketText){
			$dienstOfKlantArray = array();
			$dienstOfKlantArray = $this->getDienstOfKlantProcedure();
			foreach ($dienstOfKlantArray as $DienstOfKlant){
				if ($selectedDienst == $DienstOfKlant->getNaam()){
					$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
					$result = $db->query("CALL ticketSubmit({$DienstOfKlant->getId()}, '{$ticketText}')");
					$db->close();
				}
			}
		}

		//checks validity of form data and runs pushTicket
		function processForm(){
			if (isset($_POST['submitTicket'])){
				$selectedDienst = filter_input(INPUT_POST, 'selectedDienst', FILTER_SANITIZE_STRING);
				$ticketText = filter_input(INPUT_POST, 'ticketText', FILTER_SANITIZE_STRING);

				if (!empty($selectedDienst) && !empty($ticketText)){
					$this->pushTicket($selectedDienst, $ticketText);
				}
			}

		}

		//get the Diensten that the Klant doesn't have yet'
		function getDienstenNotOfKlantProcedure(){
			$dienstenArray = array();
			$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
			$this->error($db);
			$result = $db->query("CALL getDienstenNotOfKlant('{$this->getEmailadress()}')");
			$this->error($result);
			$db->close();
			$rowCount = $result->num_rows;
			for ($counter = 1; $counter <= $rowCount; $counter++){
				$DienstOfKlant = new Dienst();
				$DienstOfKlant->setDienst($result);
				array_push($dienstenArray, $DienstOfKlant);
			}
			return $dienstenArray;
		}
    


		public function error($check){
			if(!$check){
				header("Location: error.php"); 
				die();
			}
		}

	}
?>