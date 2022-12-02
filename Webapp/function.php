<?php
	//ticketPage functions! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //please keep in order

    //takes an array filled with Diensten and makes <option>'s for a <select> from them
    function makeOptionList($array){
        if (!empty($array)){
            foreach ($array as $DienstOfKlant){
                $value = $DienstOfKlant->getNaam();
                echo "<option value='{$value}'>{$value}</option>";
            }
        }
        else{
            echo "<option value='null'>Dienst vereist</option>";
        }
    }

    //End ticketPage Functions! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
?>