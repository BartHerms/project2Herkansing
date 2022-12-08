<?php

class LoginKlant{
    private $emailAdress;
    private $password;

    public function getEmailAdress(){
        return $this->emailAdress;
    }
    public function setEmailAdress($emailAdress){
        $this->emailAdress = $emailAdress;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function setLoginKlant($result){
        $dbData = $result->fetch_row();
        array_pad($dbData, 1, NULL);
        $this->setPassword($dbData[0]);
    }
}


?>