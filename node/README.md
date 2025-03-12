# 📂 Node.js - Server HTTP & API

Questa cartella contiene esempi pratici su come gestire richieste HTTP in **Node.js** utilizzando il framework **Express**. Include esempi di richieste **GET**, **POST** e una semplice API REST.

## 📌 Contenuto della Cartella

```
node/
├── server.js        # Server HTTP base con Express
├── api.js           # Esempio di API REST con Express
├── secure_form.js   # Gestione sicura dei form con middleware
└── README.md        # Spiegazione del codice Node.js
```

---

## 🚀 Installazione e Avvio

1. Assicurati di avere **Node.js** installato
2. Installa le dipendenze con:
   ```sh
   cd node/
   npm install
   ```
3. Avvia il server:
   ```sh
   node server.js
   ```
4. Apri il browser su `http://localhost:3000`

---

## 📌 1. `server.js` - Server HTTP Base

Esempio di un server Node.js con **Express** che gestisce **GET** e **POST**.

```js
const express = require('express');
const app = express();
const port = 3000;

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.get('/', (req, res) => {
    res.send('Ricevuta una richiesta GET!');
});

app.post('/', (req, res) => {
    res.send(`Ricevuta una richiesta POST con dati: ${JSON.stringify(req.body)}`);
});

app.listen(port, () => {
    console.log(`Server avviato su http://localhost:${port}`);
});
```

Test:
```sh
curl http://localhost:3000/
```

```sh
curl -X POST -d "nome=Mario&cognome=Rossi" http://localhost:3000/
```

---

## 📌 2. `api.js` - API REST con Express

Esempio di API che restituisce dati JSON.

```js
const express = require('express');
const app = express();
const port = 3000;

app.get('/api', (req, res) => {
    res.json({ messaggio: 'Benvenuto nell'API Node.js!', status: 200 });
});

app.listen(port, () => {
    console.log(`API disponibile su http://localhost:${port}/api`);
});
```

Test:
```
http://localhost:3000/api
```

Risultato:
```json
{"messaggio": "Benvenuto nell'API Node.js!", "status": 200}
```

---

## 📌 3. `secure_form.js` - Sicurezza nei Form

Esempio di validazione dati con middleware **express-validator**.

```js
const express = require('express');
const { body, validationResult } = require('express-validator');
const app = express();
const port = 3000;

app.use(express.json());

app.post('/secure', [
    body('nome').isAlpha().withMessage('Il nome deve contenere solo lettere'),
], (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
        return res.status(400).json({ errors: errors.array() });
    }
    res.send(`Dati sicuri: ${req.body.nome}`);
});

app.listen(port, () => {
    console.log(`Server sicuro avviato su http://localhost:${port}/secure`);
});
```

Test:
```sh
curl -X POST -H "Content-Type: application/json" -d '{"nome":"Mario123"}' http://localhost:3000/secure
```

Risultato:
```json
{"errors":[{"msg":"Il nome deve contenere solo lettere","param":"nome","location":"body"}]}
```

---

## 📚 Risorse Utili
- [Documentazione Node.js](https://nodejs.org/en/docs/)
- [Express.js](https://expressjs.com/)
- [express-validator](https://express-validator.github.io/docs/)

🔹 Se hai suggerimenti o vuoi migliorare gli script, sentiti libero di contribuire! 🚀

