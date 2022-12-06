<?php

    class Medewerker
	{
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

        public function setAdmin($input){
             $this->administrator = $input;
        }

        public function setMedewerker($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 3, NULL);
            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
            $this->setadmin($dbData[3]);
        } 
		
		//get employee data
		public function getMedewerkerProcedure($Medewerker, $emailadressMedewerker){
			define("SERVER_IP", "localhost");
			$db = mysqli_connect(SERVER_IP, "root","root" , "project2");
			$result = $db->query("CALL getMedewerker('{$emailadressMedewerker}')");
			$db->close();
			$Medewerker->setMedewerker($result);
		}

    }

?>