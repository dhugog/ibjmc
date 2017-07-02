<meta charset="UTF-8" />
<?php
error_reporting(0);
ini_set("display_errors", 0);

if (!defined('LIVE'))
    DEFINE('LIVE', false);

DEFINE('EMAIL_CONTATO', 'email@contato.com');
DEFINE('BASE_URI', 'C:\xampp\htdocs\IBJMC\\');
DEFINE('BASE_URL', 'localhost/IBJMC/');
DEFINE('MYSQL', BASE_URI . 'includes\mysql.inc.php');

session_start();

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
    $message = "Ocorreu um erro no script '$e_file' na linha $e_line: \n$e_message\n";
    $message .= print_r(debug_backtrace(), 1);
    if (!LIVE) {
        echo "<p class='alert' style='color: red;'>" . nl2br($message) . "</p>";
    } else {
        error_log($message, 1, EMAIL_CONTATO, 'From:admin@exemplo.com');
        if ($e_number != E_NOTICE) {
            echo "<p class='alert' style='color: red;'>Ocorreu um erro no sistema. Desculpe-nos a inconveniência</p>";
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