<!DOCTYPE html>
<html>
<head>
    <title>Form Sicuro</title>
</head>
<body>

<h2>Inserisci il tuo nome:</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nome: <input type="text" name="nome">
    <br><br>
    <input type="submit" value="Invia">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    echo "<h2>Dati ricevuti:</h2>";
    echo "Nome: " . $nome;
}
?>

</body>
</html>