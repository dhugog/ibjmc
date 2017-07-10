<?php

function validarData($data) {
    $newData = explode("/", $data);
    $d = $newData[0];
    $m = $newData[1];
    $y = $newData[2];

    return ($y < date("Y") && $y > 1901) && checkdate($m, $d, $y);
}

