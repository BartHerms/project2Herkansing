<?php
	class Klant{
		$voornaam = 'John';
		$achternaam = 'Smith';
		$woonplaats = 'City';
		$adres = 'street 1';
		$bedrijf = 'company';
		$telefoonnummer = '+31(0114)123456';

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