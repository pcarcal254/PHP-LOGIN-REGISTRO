<?php

    function arrayCadena($arrayGeneral) {
        $cadena = "";
        for ($i = 0; $i < count($arrayGeneral); $i++) {
            $arrayCadenas[$i] = implode(';',$arrayGeneral[$i]);
        }
        for ($i = 0; $i < count($arrayCadenas); $i++) {
            $cadena .= ($i !== count($arrayCadenas) - 1) ? $arrayCadenas[$i]."\n" : $arrayCadenas[$i];
        }

        return $cadena;
    }

?>