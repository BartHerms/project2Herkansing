<?php

include 'classes/Medewerker.php';	

class Ticket{
		private $id;
		private $idOvereenkomst;
		private $Medewerker;
		private $status;
		private $datum;
		private $logfile;
		private $onderwerp;

		public function __construct(){
			$this->Medewerker = new Medewerker();
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
			return $this->Medewerker;
		}

		public function setMedewerker(){
			$this->Medewerker->getMedewerkerProcedure();
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

		public function error($check){
			if(!$check){
				header("Location: error.php"); 
				die();
			}
		}

		public function setTicket($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 6, NULL);

			$this->setId($dbData[0]);
			$this->setIdOvereenkomst($dbData[1]);
			$this->Medewerker->setEmailadress($dbData[2]);
			$this->setStatus($dbData[3]);
			$this->setDatum($dbData[4]);
			$this->setLogFile($dbData[5]);
			$this->setOnderwerp($dbData[6]);
		}

		public function getSingleTicket(){
			$db = mysqli_connect(SERVER_IP, "root", null, "project2");
			$this->error($db);
		    $result = $db->query("CALL getSingleTicket({$this->getId()})");
			$this->error($result);
		    $db->close();

			$this->setTicket($result);
		}

		function pushTicket($ticketText){
					$db = mysqli_connect(SERVER_IP, "root", null, "project2");
					$this->error($db);
					$result = $db->query("CALL ticketUpdate('{$ticketText}', '{$this->getId()}')");
					$this->error($result);
					$db->close();
		}

		public function processForm(){
			if (isset($_POST['submitTicket'])){
				$ticketText = filter_input(INPUT_POST, 'ticketText', FILTER_SANITIZE_STRING);;
				if (!empty($ticketText)){
					$ticketText = "{$ticketText} \n ================================================================ \n";
					$this->pushTicket($ticketText);
				}
			}
		}

		public function addMedewerkerToTicket($emailMedewerker){
			if (isset($_POST['assignMedewerker'])){
				$db = mysqli_connect(SERVER_IP, "root", null, "project2");
				$this->error($db);
                $result = $db->query("CALL setMedewerkerToTicket('{$emailMedewerker}', '{$this->getId()}')");
				$this->error($result);
                $db->close();
			}
		}

		public function updateStatus(){
			if (isset($_POST['setStatusGreen'])){
				$db = mysqli_connect(SERVER_IP, "root", null, "project2");
				$this->error($db);
                $result = $db->query("CALL setTicketStatus('1', '{$this->getID()}')");
				$this->error($result);
                $db->close();
			}
			elseif (isset($_POST['setStatusOrange'])){
				$db = mysqli_connect(SERVER_IP, "root", null, "project2");
				$this->error($db);
                $result = $db->query("CALL setTicketStatus('2', '{$this->getID()}')");
				$this->error($result);
                $db->close();
			}
			elseif (isset($_POST['setStatusRed'])){
				$db = mysqli_connect(SERVER_IP, "root", null, "project2");
				$this->error($db);
                $result = $db->query("CALL setTicketStatus('3', '{$this->getID()}')");
				$this->error($result);
                $db->close();
			}

		}
	}
?>