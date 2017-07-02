<?php

DEFINE(HOST, 'localhost');
DEFINE(USER, 'root');
DEFINE(PASS, '');
DEFINE(DB, 'ibjmc');

$con = mysqli_connect(HOST, USER, PASS, DB);
mysqli_set_charset($con, 'utf8');

if (!$con) {
    echo "Erro ao conectar-se ao banco de dados.";
    exit;
}

function escape_data($data, $con) {
    if (get_magic_quotes_gpc()) {
        $data = stripslashes($data);
        return mysqli_real_scape_string($con, trim($data));
    }
}

?>