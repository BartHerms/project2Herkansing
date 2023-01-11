<?php
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
			$this->emailadres = $input;
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
            return $this->administrator;
        }

        public function setAdmin($input){
             $this->administrator = $input;
        }

        public function setMedewerker($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 4, 0);

            $this->setEmailadress($dbData[0]);
			$this->setVoornaam($dbData[1]);
			$this->setAchternaam($dbData[2]);
            $this->setadmin($dbData[3]);
        } 
		
		//get employee data
		public function getMedewerkerProcedure($emailadresMedewerker){
			$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
			$result = $db->query("CALL getMedewerker('{$emailadresMedewerker}')");
			$db->close();
			$this->setMedewerker($result);
		}

		//Takes the Employee part of an Ticket and shows it's info, if there is no employee, it can be assigned to yourself
		function showMedewerkerNaam(){
			if(!empty($this){
				echo "{$this->getVoornaam()} {$this->getAchternaam()}";
			}
			else{
				echo "<form action='singleTicketAction.php?TicketId={$_GET['TicketId']}' method='POST'><input type='submit' name='assignSelf' value='Behandelen'></form>";
			}
		}

		//Turns an array of Medewerkers into an option list for a <select> element
		function makeMedewerkerOptionList($array){
			if (!empty($array)){
				foreach ($array as $tempMedewerker){
					$value = $tempMedewerker->getEmailadress();
					echo "<option value='{$value}'>{$value}</option>";
				}
			}
		}

		//Let's an admin assign a ticket to another employee
		function medewerkerAssignment($ticketMedewerker, $array){
			if($this->getAdmin() == (int)1){
				echo "{$ticketMedewerker->getVoornaam()} {$ticketMedewerker->getAchternaam()}";
				echo "<p>Medewerker toewijzen:</p>";
				echo "<form action='singleTicketAction.php?TicketId={$_GET['TicketId']}' method='POST'><select class='employeeAssign' name='selectedMedewerker'>";
				$this->makeMedewerkerOptionList($array);
				echo "<input type='submit' name='assignMedewerker' value='Toewijzen'></select></form>";
			}else{
				$ticketMedewerker->showMedewerkerNaam();
			}
		}
    }

?>