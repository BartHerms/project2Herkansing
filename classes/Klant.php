<?php
	class Klant
	{
		private $emailadress;
		private $voornaam;
		private $achternaam;
		private $woonplaats;
		private $adres;
		private $bedrijf;
		private $telefoonnummer;
		private $postcode;
		

		public function getEmailadress(){
			return $this->emailadress;
		}

		public function setEmailadress(string $input) {
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

		public function setKlant($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 8, 0);
            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
			$this->setWoonplaats($dbData[3]);
			$this->setAdres($dbData[4]);
			$this->setBedrijf($dbData[5]);
			$this->setTelefoonnummer($dbData[6]);
			$this->setPostcode($dbData[7]);
		}

		//get the customer data
		public function getKlantProcedure($Klant, $emailadressKlant){
			define("SERVER_IP", "localhost");
			$db = mysqli_connect(SERVER_IP, "root","root" , "project2");
			$result = $db->query("CALL getKlant('{$emailadressKlant}')");
			$db->close();
			$Klant->setKlant($result);
		}
	}
?>