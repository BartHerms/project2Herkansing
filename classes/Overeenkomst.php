<?php

include 'classes/Dienst.php';
include 'classes/Klant.php';

class Overeenkomst{
	private $id;
	private $Klant;
	private $Dienst;
	private $klantOpmerking;
	private $datum;
	private $status;
	private $contract;

	public function __construct(){
		$this->Dienst = new Dienst();
		$this->Klant = new Klant();
	}

	public function getId(){
		return $this->id;
	}

	public function setId($input){
		$this->id = $input;
	}

	public function getKlant(){
		return $this->Klant;
	}

	public function setKlant($input){
		$this->Klant = $input;
	}

	public function getDienst(){
		return $this->Dienst;
	}

	public function getKlantOpmerking(){
		return $this->klantOpmerking;
	}

	public function setKlantOpmerking($input){
		$this->klantOpmerking = $input;
	}

	public function getDatum(){
		return $this->datum;
	}

	public function setDatum($input){
		$this->datum = $input;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($input){
		$this->status = $input;
	}

	public function getContract(){
		return $this->contract;
	}

	public function setContract($input){
		$this->contract = $input;
	}

	public function error($check){
		if(!$check){
			header("Location: error.php"); 
			die();
		}
	}

	public function setOvereenkomst($queryResult){
		$dbData = $queryResult->fetch_row();
		$dbData = array_pad($dbData, 7, NULL);

		$this->setId($dbData[0]);
		$this->getKlant->setEmailadress($dbData[1]);
		$this->getDienst->setId($dbData[2]);
		$this->setKlantOpmerking($dbData[3]);
		$this->setDatum($dbData[4]);
		$this->setStatus($dbData[5]);
		$this->setContract($dbData[6]);	
	}

	//takes the input from the form and pushes it towards the database
	function pushRequest($requestComment, $selectedDienst){
		$dienstenArray = Array();
		$dienstenArray = $this->getKlant()->getDienstenNotOfKlantProcedure();
		foreach ($dienstenArray as $TempDienst){
			if ($selectedDienst == $TempDienst->getNaam()){
				$db = mysqli_connect(SERVER_IP, "root", null, "project2");
				$this->error($db);
				$result = $db->query("CALL makeNewOvereenkomst('{$this->getKlant()->getEmailadress()}', '{$TempDienst->getId()}', '{$requestComment}')");
				$this->error($result);
				$db->close();
			}
		}
	}

	//takes the input form the form and validates it
	public function processForm(){
		if (isset($_POST['submitRequest'])){
			$selectedDienst = filter_input(INPUT_POST, 'selectedDienst', FILTER_SANITIZE_STRING);
			$requestComment = filter_input(INPUT_POST, 'requestComment', FILTER_SANITIZE_STRING);
			if (!empty($requestComment) && !empty($selectedDienst)){
				$this->pushRequest($requestComment, $selectedDienst);
			}
		}
	}
}
?>