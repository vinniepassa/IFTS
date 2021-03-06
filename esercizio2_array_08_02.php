<?php
    /**
     * https://classroom.google.com/c/NDUyMDM2NjY0MTgx/a/NDYwNzg1MzgwNzIz/details
     */
    $partita = ['squadra1'=>"", 'squadra2'=>"", 'risultato'=>""];
    $partita1 = ['squadra1' => "Inter", 'squadra2' => "Bologna", 'risultato' => '1'];
    $partita2 = ['squadra1' => "Juventus", 'squadra2' => "Inter", 'risultato' => 'X'];
    $partita3 = ['squadra1' => "Torino", 'squadra2' => "Sampdoria", 'risultato' => '2'];
    $schedina = [$partita1, $partita2, $partita3];
    //2.5
	function build_table($array){
        $html = '<table>';
        $html .= '<tr>';
        foreach ($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
            }
        $html .= '</tr>';

        $flag = 0;
        foreach($array as $key=>$value){
            switch($flag){
                case 0:
                    $html .= '<tr>';
                    $flag += 1;
                    break;
                case 1:
                    $html .= "<tr style='background-color:red'>";
                    $flag -= 1;
                    break;
            }
            foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }
    
        $html .= '</table>';
        return $html;
    }       
    echo build_table($schedina);
    //2.6
    function count_draws($array){
        $counter = 0;
        for($i = 0; $i < count($array); $i++){
            if($array[$i]["risultato"] == "X"){
                $counter++;
            }
        }
        return $counter;
    }
    echo "<hr>Numero di pareggi: " . count_draws($schedina) . "<hr>";
    //2.7
    $last_sunday = date('d/m/Y', strtotime('last sunday'));
    for($i = 0; $i < count($schedina); $i++){
        $schedina[$i]["domenica_prec"] = $last_sunday;
    }
    //2.8
    $mia_schedina = [];
    $possible_value = ["1", "2", "X"];
    for($i = 0; $i < count($schedina); $i++){
        $partita["risultato"] = $possible_value[rand(0, 2)];
        array_push($mia_schedina, $partita);
    }

    $is_match = 0;
    for($i = 0; $i < count($mia_schedina); $i++){
        if($mia_schedina[$i]["risultato"] == $schedina[$i]["risultato"]){
            $is_match += 1;
        }
    }
    echo "Punteggio: $is_match<hr>";
    //2.9
    echo build_table($mia_schedina);
?>
