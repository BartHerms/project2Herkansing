<?php

require_once '../classes/Medewerker.php';	

class Ticket{
		private $id;
		private $idOvereenkomst;
		public $MedewerkerKlant;
		private $status;
		private $datum;
		private $logfile;
		private $onderwerp;
		private $geopendOp;

		public function __construct(){
			$this->MedewerkerKlant = new Medewerker();
		}

		public function getId(){
			return $this->id;
		}

		public function setId($input){
			$this->id = $input;
		}

		public function getIdOvereenkomst(){
			return $this->idOvereenkomst;
		}

		public function setIdOvereenkomst($input){
			$this->idOvereenkomst = $input;
		}

		public function getMedewerker(){
			return $this->MedewerkerKlant;
		}

		public function setMedewerker($MedewerkerKlant, $emailadressMedewerker){
			$this->MedewerkerKlant->getMedewerkerProcedure($emailadressMedewerker);
		}
		public function getStatus(){
			return $this->status;
		}

		public function setStatus($input){
			$this->status = $input;
		}

		public function getDatum(){
			return $this->datum;
		}

		public function setDatum($input){
			$this->datum = $input;
		}

		public function getLogFile(){
			return $this->logfile;
		}

		public function setLogFile($input){
			$this->logfile = $input;
		}

		public function getOnderwerp(){
			return $this->onderwerp;
		}

		public function setOnderwerp($input){
			$this->onderwerp = $input;
		}

		public function getGeopendOp(){
			return $this->geopendOp;
		}

		public function setGeopendOp($input){
			$this->geopendOp = $input;
		}

		//redirects to error page when something goes wrong
		public function error($check){
			if(!$check){
				header("Location: error.php"); 
				die();
			}
		}

		public function setTicket($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 8, 0);

			$this->setId($dbData[0]);
			$this->setIdOvereenkomst($dbData[1]);
			$this->getMedewerker()->setEmailadress($dbData[2]);
			$this->setStatus($dbData[3]);
			$this->setDatum($dbData[4]);
			$this->setLogFile($dbData[5]);
			$this->setOnderwerp($dbData[6]);
			$this->setGeopendOp($dbData[7]);
		}

		//this function returns a single ticket from the database and sets it self accordingly
		public function getSingleTicket(){
			$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
			$this->error($db);
		    $result = $db->query("CALL getSingleTicket('{$this->getId()}')");
			$this->error($result);
		    $db->close();

			$this->setTicket($result);
		}

		//updates this ticket with addition ticket Text
		function pushTicket($ticketText){
			$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
			$this->error($db);
			$result = $db->query("CALL ticketUpdate('{$ticketText}', '{$this->getId()}')");
			$this->error($result);
			$db->close();
		}

		//gets and verifies data from form and calls pushTicket
		public function processForm(){
			if (isset($_POST['submitTicket'])){
				$ticketText = filter_input(INPUT_POST, 'ticketText', FILTER_SANITIZE_STRING);;
				if (!empty($ticketText)){
					$ticketText = "{$ticketText} \n ================================================================ \n";
					$this->pushTicket($ticketText);
				}
			}
		}

		//get a medewerker and add it too the ticket
		public function addMedewerkerToTicket($emailMedewerker){
			if (isset($_POST['assignMedewerker'])){
				$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
				$this->error($db);
                $result = $db->query("CALL setMedewerkerToTicket('{$emailMedewerker}', '{$this->getId()}')");
				$this->error($result);
                $db->close();
			}
		}

		//changes the status of the ticket according to the data from a form
		public function updateStatus(){
			if (isset($_POST['setStatusGreen'])){
				$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
				$this->error($db);
                $result = $db->query("CALL setTicketStatus('1', '{$this->getId()}')");
				$this->error($result);
                $db->close();
			}
			elseif (isset($_POST['setStatusOrange'])){
				$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
				$this->error($db);
                $result = $db->query("CALL setTicketStatus('2', '{$this->getId()}')");
				$this->error($result);
                $db->close();
			}
			elseif (isset($_POST['setStatusRed'])){
				$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
				$this->error($db);
                $result = $db->query("CALL setTicketStatus('3', '{$this->getId()}')");
				$this->error($result);
                $db->close();
			}
		}

		//returns the name of the Medewerker assigned to the ticket
		public function getNaamMedewerker(){
			$this->MederwerkerKlant->getVoornaam();
		}

		//updates a ticket geopendOp to today
		public function setTicketGeopendOp(){
			if(!checkGeopendOp()){
				$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
				$this->error($db);
				$result = $db->query("CALL setTicketGeopendOp('{$this->getId()}')");
				$this->error($result);
				$db->close();
			}
		}

		//checks if the geopendOp variable is already set, if so it display said variable
		public function checkGeopendOp(){
			$tempGeopendOp = $this->getGeopendOp();
			if($tempGeopendOp != NULL){
				echo "<p>{$tempGeopendOp}</p>";
				return true;
			}
			else{
				return false;
			}
		}
	}
?>