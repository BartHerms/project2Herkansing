<?php
    class Medewerker{
        private $emailadres;
        private $voornaam;
        private $achternaam;
        private $administrator;

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

        public function getAdmin($input){
            return $this->$administrator;
        }

        public function serAdmin($input){
             $this->$administrator = $input;
        }

        public function setMedewerker($queryResult){
			$dbData = $queryResult->fetch_row();

            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
            $this->setadmin($dbData[3]);
        }    
    }

?>