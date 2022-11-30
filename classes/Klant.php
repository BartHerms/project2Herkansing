<?php
	class Klant{
		private $emailadress = 'test@mail.com';
		private $voornaam = 'John';
		private $achternaam = 'Smith';
		private $woonplaats = 'City';
		private $adres = 'street 1';
		private $bedrijf;
		private $telefoonnummer;

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

		public function setKlant($queryResult){
			$dbData = $queryResult->fetch_row();

            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
			$this->setWoonplaats($dbData[3]);
			$this->setAdres($dbData[4]);
			$this->setBedrijf($dbData[5]);
			$this->setTelefoonnummer($dbData[6]);
		}
	}
?>