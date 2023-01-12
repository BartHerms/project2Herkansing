<?php
	#[AllowDynamicProperties] //dit laat de dynamische creatie van een mederwerker in de ticket class toe in php 8.2 en hoger zie https://php.watch/versions/8.2/dynamic-properties-deprecated
    class Medewerker
	{
        private $emailadres;
        private $voornaam;
        private $achternaam;
        private $administrator;

        public function getEmailadress(){
			return $this->emailadres;
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

        public function getAdmin(){
            return $this->$administrator;
        }

        public function setAdmin($input){
             $this->administrator = $input;
        }

        public function setMedewerker($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 4, NULL);
            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
            $this->setadmin($dbData[3]);
        } 
		
		//get employee data
		public function getMedewerkerProcedure($Medewerker, $emailadressMedewerker){
			define("SERVER_IP", "localhost");
			$db = mysqli_connect(SERVER_IP, "root","root","project2");
			$result = $db->query("CALL getMedewerker('{$emailadressMedewerker}')");
			$db->close();
			$Medewerker->setMedewerker($result);
		}

    }

?>