<?php

function stmtExecute(string $sql, int $code = 0, ?string $ParamChars = NULL, ...$BindParamVars) : array| bool {

require "../utils/dbconnect.php";
// Check if the statement can be prepared
if($stmt = mysqli_prepare($conn, $sql)) {

    // If true
    // Check if the statement needs to bind
    if(substr_count($sql, "?")) {
        
        // If true
        // Check if the bind param chars are set
        if(!empty($ParamChars)) {

            // Check if the given chars are valid
            for ($i=0; $i<strlen($ParamChars); $i++) {
                switch($ParamChars[$i]) {
                    case 's':
                    case 'i':
                    case 'd':
                    case 'b':
                        // Valid, set $continue to true
                        // Break the inner loop and continue the loop
                        $continue = 1;
                        break 1;
                    default:
                        // Not valid, set $continue to false
                        // Break the outer loop
                        $continue = 0;
                        break 2;
                }
            }
            
           

    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0) {

            $sql = str_replace("DISTINCT ", "", $sql);
            $totalFROMKey = substr_count($sql, "FROM");
            $totalENDKey = substr_count($sql, ")");
            $totalOPENKey = substr_count($sql, "(");
            
            // Check FROM
            for($i = 0; $i < $totalFROMKey; $i++) {
                if($i === 0) {
                    $posFROMKey[$i] = strpos($sql, "FROM");
                } else {
                    $posFROMKey[$i] = strpos($sql, "FROM", $posFROMKey[$i - 1] + 1);
                    if($i - 1 >= 0 && $posFROMKey[$i] == $posFROMKey[$i - 1]) {
                        $posFROMKey[$i] = strpos($sql, "FROM", $posFROMKey[$i - 1] + 1);
                    }
                }
            }

            // Check nested query open sign
            for($i = 0; $i < $totalOPENKey; $i++) {
                if($i === 0) {
                    $posOPENKey[$i] = strpos($sql, "(");
                } else {
                    $posOPENKey[$i] = strpos($sql, "(", $posOPENKey[$i - 1] + 1);
                    if($i - 1 >= 0 && $posOPENKey[$i] == $posOPENKey[$i - 1]) {
                        $posOPENKey[$i] = strpos($sql, "(", $posOPENKey[$i - 1] + 1);
                    }
                }
            }

            // Check nested query end sign
            for($i = 0; $i < $totalENDKey; $i++) {
                if($i === 0) {
                    $posENDKey[$i] = strpos($sql, ")");
                } else {
                    $posENDKey[$i] = strpos($sql, ")", $posENDKey[$i - 1] + 1);
                    if($i - 1 >= 0 && $posENDKey[$i] == $posENDKey[$i - 1]) {
                        $posENDKey[$i] = strpos($sql, ")", $posENDKey[$i - 1] + 1);
                    }
                }
            }

            // debug($posOPENKey);
            // debug($posENDKey);
            // debug($posFROMKey);
            
            // Get Right positions in nested queries and form for array values
            for($k = 0; $k < count($posFROMKey); $k++) {
                $posFrom = $posFROMKey[$k];
                if(!empty($posENDKey) && !empty($posOPENKey)) {

                    if($posOPENKey[0] > $posFROMKey[0]) {
                        goto finish;
                    }
                   
                    for($i = 0; $i < count($posOPENKey); $i++) {
                        $posOpen = $posOPENKey[$i];
                        $posEnd = $posENDKey[$i];
                        // echo "$i, $posOpen, $posEnd, $posFrom<br>";
                        if($posFrom > $posEnd && $posEnd > $posOpen) {
                            if($i + 1 < $totalOPENKey && $posOPENKey[$i + 1] > $posFrom && $posENDKey[$i + 1] > $posOPENKey[$i + 1]) {
                                goto finish;
                            } else if($i + 1 == $totalOPENKey) {
                                goto finish;
                            }
                        } else {
                            $posFrom = 0;
                        }
                    }
                } 
            }
            finish:
            // echo $posFrom;
            if($posFrom != 0) {
                $SelectResults = substr($sql, 7, $posFrom - 8);
            } else {
                $SelectResults = substr($sql, 7);
            }
            // echo "$SelectResults<br>";
            
            $SelectResults = explode(",", $SelectResults);
            // debug($SelectResults);

            for($i = 0; $i < count($SelectResults); $i++) {
                if(str_contains($SelectResults[$i], " AS ")) {
                    $SelectResults[$i] = substr($SelectResults[$i], strpos($SelectResults[$i], " AS ") + 4);
                }
                $SelectResults[$i] = str_replace('\s', '', $SelectResults[$i]);
                $SelectResults[$i] = trim($SelectResults[$i]);
                $BindResults[] = $SelectResults[$i];
            }

            // echo $sql;
            // debug($SelectResults);
            // debug($BindResults);
            if(mysqli_stmt_bind_result($stmt, ...$BindResults)) {
                $i = 0;
                while(mysqli_stmt_fetch($stmt)) {
                    $j = 0;
                    foreach($BindResults as $Result) {
                        $results[$SelectResults[$j]][] = $Result;
                        $j++;
                    }
                    $i++;
                }
                mysqli_stmt_close($stmt);
                // echo "####<br>";
                return $results;
            } else {
                fail("DB".$code."2", mysqli_error($conn));
                return false;
            }
        } else {
            return true;
        }
    } else {
        fail("DB".$code."1", mysqli_error($conn));
        return false;
    }

} else {
    fail("DB00", mysqli_error($conn));
    return false;
}
mysqli_close($conn);
}

// $type:   1 for print_r(), 0 or empty for var_dump()
function debug($var, int $type = 0) {
echo "<pre>";
if($type) {
    print_r($var);
} else {
    var_dump($var);
}
echo "</pre>";
}


?>