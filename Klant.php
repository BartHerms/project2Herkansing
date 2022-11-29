<?php
	class Klant{
		private $voornaam = 'John';
		private $achternaam = 'Smith';
		private $woonplaats = 'City';
		private $adres = 'street 1';
		private $bedrijf = 'company';
		private $telefoonnummer = '+31(0114)123456';

		public function getVoornaam(){
			return $voornaam;
		}

		public function setVoornaam($input){
			$voornaam = $input;
		}

		public function getAchternaam(){
			return $achternaam;
		}

		public function setAchternaam($input){
			$achternaam = $input;
		}

		public function getWoonplaats(){
			return $woonplaats;
		}

		public function setWoonplaats($input){
			$woonplaats = $input;
		}

		public function getAdres(){
			return $adres;
		}

		public function setAdres($input){
			$adres = $input;
		}

		public function getBedrijf(){
			return $bedrijf;
		}

		public function setBedrijf($input){
			$bedrijf = $input;
		}

		public function getTelefoonnummer(){
			return $telefoonnummer;
		}

		public function setTelefoonnummer($input){
			$telefoonnummer = $input;
		}

	}
?>
