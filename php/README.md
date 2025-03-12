# 📂 PHP - Server HTTP & API

Questa cartella contiene esempi pratici su come gestire richieste HTTP in **PHP**, utilizzando sia il metodo **GET** che **POST**. Inoltre, include un esempio di API REST.

## 📌 Contenuto della Cartella

```
php/
├── server.php        # Server PHP base con gestione GET e POST
├── api.php           # Esempio di API REST in PHP
├── secure_form.php   # Gestione sicura dei form
└── README.md         # Spiegazione del codice PHP
```

---

## 🚀 Avviare il Server PHP

Per testare i file, avvia un server locale con il seguente comando:

```sh
php -S localhost:8000 -t php/
```

Ora puoi aprire nel browser:
- `http://localhost:8000/server.php`
- `http://localhost:8000/api.php`
- `http://localhost:8000/secure_form.php`

---

## 📌 1. `server.php` - Esempio di Server PHP

Questo script gestisce richieste **GET** e **POST**:

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Ricevuta una richiesta GET con parametri: " . json_encode($_GET);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Ricevuta una richiesta POST con dati: " . json_encode($_POST);
}
?>
```

Test con **GET**:
```
http://localhost:8000/server.php?nome=Mario&cognome=Rossi
```

Test con **POST**:
```sh
curl -X POST -d "nome=Mario&cognome=Rossi" http://localhost:8000/server.php
```

---

## 📌 2. `api.php` - API REST Semplice

Fornisce dati in formato **JSON** per simulare un'API REST.

```php
<?php
header("Content-Type: application/json");
$data = ["messaggio" => "Benvenuto nell'API PHP!", "status" => 200];
echo json_encode($data);
?>
```

Test:
```
http://localhost:8000/api.php
```

Risultato:
```json
{"messaggio": "Benvenuto nell'API PHP!", "status": 200}
```

---

## 📌 3. `secure_form.php` - Sicurezza nei Form

Dimostra come **sanitizzare i dati utente** per prevenire attacchi **XSS** e **SQL Injection**.

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
- [Documentazione PHP](https://www.php.net/manual/en/)
- [Guida a $_GET e $_POST](https://www.w3schools.com/php/php_forms.asp)

🔹 Se hai suggerimenti o vuoi migliorare gli script, sentiti libero di contribuire! 🚀

