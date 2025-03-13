# 📂 PHP - Server HTTP e API

Questa cartella contiene esempi pratici per gestire richieste HTTP in PHP, sfruttando sia il metodo GET che POST. Include inoltre un esempio di API REST.

## 📌 Contenuto della Cartella

La struttura dei file è la seguente:

```
php/
├── server.php        # Server PHP per la gestione di richieste GET e POST
├── api.php           # API REST di esempio in PHP
├── secure_form.php   # Script che dimostra come proteggere i form
└── README.md         # Documentazione e spiegazioni sul codice
```

---

## 🚀 Come Avviare il Server PHP

Esegui un server locale utilizzando il comando:

```sh
php -S localhost:8000 -t .
```

Accedi ora nel browser ai seguenti URL:
- http://localhost:8000/server.php
- http://localhost:8000/api.php
- http://localhost:8000/secure_form.php

---

## 📌 1. server.php - Gestione delle Richieste HTTP

Il file analizza le richieste HTTP e risponde in base al metodo:

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Ricevuta una richiesta GET con parametri: " . json_encode($_GET);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Ricevuta una richiesta POST con dati: " . json_encode($_POST);
}
?>
```

Esempi di test:

Richiesta GET:
```
http://localhost:8000/server.php?nome=Mario&cognome=Rossi
```

Richiesta POST:
```sh
curl -X POST -d "nome=Mario&cognome=Rossi" http://localhost:8000/server.php
```

---

## 📌 2. api.php - API REST Semplice

Questo script restituisce dati in formato JSON, simulando un'API REST:

```php
<?php
header("Content-Type: application/json");
$data = [
    "messaggio" => "Benvenuto nell'API PHP!",
    "status" => 200
];
echo json_encode($data);
?>
```

Test:
```
http://localhost:8000/api.php
```

Risultato atteso:
```json
{"messaggio": "Benvenuto nell'API PHP!", "status": 200}
```

---

## 📌 3. secure_form.php - Protezione dei Form

Esempio di come sanitizzare i dati inviati tramite form per evitare attacchi XSS e SQL Injection:

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    echo "Dati sicuri: " . $nome;
}
?>
```

---

## 📚 Risorse Utili

- [Documentazione Ufficiale PHP](https://www.php.net/manual/en/)
- [Guida su $_GET e $_POST](https://www.w3schools.com/php/php_forms.asp)

Se hai suggerimenti o vuoi contribuire a migliorare gli script, sei il benvenuto!

