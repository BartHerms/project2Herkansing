<?php
<<<<<<< HEAD
	#[AllowDynamicProperties] //dit laat de dynamische creatie van een mederwerker in de ticket class toe in php 8.2 en hoger zie https://php.watch/versions/8.2/dynamic-properties-deprecated
=======

    #[AllowDynamicProperties] //dit laat de dynamische creatie van een mederwerker in de ticket class toe in php 8.2 en hoger zie https://php.watch/versions/8.2/dynamic-properties-deprecated	

>>>>>>> 32cf75558f5bfa199bde0514f9d0ebf5b1409835
    class Dienst
	{
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

		public function setDienst($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 4, 0);

			$this->setId($dbData[0]);
			$this->setNaam($dbData[1]);
			$this->setOmschrijving($dbData[2]);
			$this->setBeschikbaar($dbData[3]);
		}
    }


?>
