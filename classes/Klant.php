<?php
	class Klant{
		private $emailadress = 'test@mail.com';
		private $voornaam = 'John';
		private $achternaam = 'Smith';
		private $woonplaats = 'City';
		private $adres = 'street 1';
		private $bedrijf = 'company';
		private $telefoonnummer = '+31(0114)123456';

		public function getEmailadress(){
			return $emailadress;
		}

		public function setEmailadress($input){
			$this->$emailadress = $input;
		}

		public function getVoornaam(){
			return $voornaam;
		}

		public function setVoornaam($input){
			$this->$voornaam = $input;
		}

		public function getAchternaam(){
			return $achternaam;
		}

		public function setAchternaam($input){
			$this->$achternaam = $input;
		}

		public function getWoonplaats(){
			return $woonplaats;
		}

		public function setWoonplaats($input){
			$this->$woonplaats = $input;
		}

		public function getAdres(){
			return $adres;
		}

		public function setAdres($input){
			$this->$adres = $input;
		}

		public function getBedrijf(){
			return $bedrijf;
		}

		public function setBedrijf($input){
			$this->$bedrijf = $input;
		}

		public function getTelefoonnummer(){
			return $telefoonnummer;
		}

		public function setTelefoonnummer($input){
			$this->$telefoonnummer = $input;
		}

		public function setKlant($queryResult){
			$dbData = $queryResult->fetch_row();
			var_dump($dbData);
			for ($counter = 0; $counter <= 6; $counter++){	
                switch ($counter) {
                    case 0:
						//$this->setEmailadress($dbData[$counter]);
						$this->$emailadress = $dbData[$counter];
						break;
                    case 1:
						$this->setVoornaam($dbData[$counter]);
						break;
                    case 2:
						$this->setAchternaam($dbData[$counter]);
						break;
                    case 3:
						$this->setWoonplaats($dbData[$counter]);
						break;
                    case 4:
						$this->setAdres($dbData[$counter]);
						break;
                    case 5:
						$this->setBedrijf($dbData[$counter]);
						break;
                    case 6:
						$this->setTelefoonnummer($dbData[$counter]);
						break;
                }
            }
		}
	}
?>