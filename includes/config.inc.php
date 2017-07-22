<meta charset="UTF-8" />
<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(0);
ini_set("display_errors", 0);

DEFINE('LIVE', true);

DEFINE('EMAIL_CONTATO', 'daniel_hugo.gasparotto@hotmail.com');
DEFINE('EMAIL_SENHA', 'miuvze5q');
DEFINE('BASE_URI', 'C:\xampp\htdocs\IBJMC\\');
DEFINE('BASE_URL', 'localhost/IBJMC/');

session_start();

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
    $message = "Ocorreu um erro no script '$e_file' na linha $e_line: \n$e_message\n";
    $message .= print_r(debug_backtrace(), 1);
    if (!LIVE) {
        echo "<p style='color: red;'>" . nl2br($message) . "</p>";
    } else {
        error_log($message, 1, EMAIL_CONTATO, EMAIL_CONTATO);
        if ($e_number != E_NOTICE) {
            echo "<span class='invalido' style='color: red;'>Ocorreu um erro no sistema. Desculpe-nos a inconveniência.</span>";
        }
    }
    return true;
}

set_error_handler('my_error_handler');

function redir_usuario($check = 'id_usuario', $destino = 'index.php', $protocolo = 'http://') {
    if (!isset($_SESSION[$check])) {
        $url = $protocolo . BASE_URL . $destino;
        header("Location: $url");
        exit();
    }
}
?>