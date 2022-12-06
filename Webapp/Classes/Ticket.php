<?php
	class Ticket{
		private $id;
		private $idOvereenkomst;
		private $emailMedewerker;
		private $status;
		private $datum;
		private $logfile;
		private $onderwerp;

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

		public function getEmailMedewerker(){
			return $this->emailMedewerker;
		}

		public function setEmailMedewerker($input){
			$this->emailMedewerker = $input;
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

		public function setTicket($queryResult){
			$dbData = $queryResult->fetch_row();
			$dbData = array_pad($dbData, 6, NULL);

			$this->setId($dbData[0]);
			$this->setIdOvereenkomst($dbData[1]);
			$this->setEmailMedewerker($dbData[2]);
			$this->setStatus($dbData[3]);
			$this->setDatum($dbData[4]);
			$this->setLogFile($dbData[5]);
			$this->setOnderwerp($dbData[6]);
		}

		public function getSingleTicket(){
			$db = mysqli_connect(SERVER_IP, "root", null, "project2");
		    $result = $db->query("CALL getSingleTicket({$this->getId()})");
		    $db->close();

			$this->setTicket($result);
		}
	}
?>