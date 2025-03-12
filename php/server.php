<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Ricevuta una richiesta GET con parametri: " . json_encode($_GET);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Ricevuta una richiesta POST con dati: " . json_encode($_POST);
}
?>