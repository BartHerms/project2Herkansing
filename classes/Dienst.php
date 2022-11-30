<?php
	class Dienst{
		private $id;
		private $naam;
		private $omschrijving;
		private $beschikbaar;

		public function getId(){
			return $this->id;
		}

		public function setId($input){
			$this->id = $input;
		}

		public function getNaam(){
			return $this->naam;
		}

		public function setNaam($input){
			$this->naam = $input;
		}

		public function getOmschrijving(){
			return $this->omschrijving;
		}

		public function setOmschrijving($input){
			$this->omschrijving = $input;
		}

		public function getBeschikbaar(){
			return $this->beschikbaar;
		}

		public function setBeschikbaar($input){
			$this->beschikbaar = $input;
		}
	}
?>