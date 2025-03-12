# Demo-Lezione-server-Http

Questa repository contiene una dimostrazione pratica delle differenze tra PHP e Node.js nella gestione delle richieste HTTP. Confronteremo come vengono gestite le chiamate **GET** e **POST**, la sicurezza dei dati e la creazione di una semplice API REST.

## 📌 Struttura della Repo

```
Demo-Lezione-server-Http/
├── php/              # Esempi di server HTTP in PHP
│   ├── server.php    # Server PHP base con gestione GET e POST
│   ├── api.php       # Esempio di API REST in PHP
│   ├── secure_form.php # Gestione sicura dei form
│   └── README.md     # Spiegazione del codice PHP
│
├── node/             # Esempi di server HTTP in Node.js
│   ├── server.js     # Server HTTP base con Express
│   ├── api.js        # Esempio di API REST con Express
│   ├── secure_form.js # Gestione sicura dei form con middleware
│   └── README.md     # Spiegazione del codice Node.js
│
├── README.md         # Introduzione alla repo con confronto PHP vs Node.js
└── .gitignore        # File da escludere (es. node_modules)
```

## 🚀 Differenze tra PHP e Node.js

| Caratteristica | PHP                                        | Node.js                                  |
| -------------- | ------------------------------------------ | ---------------------------------------- |
| Linguaggio     | Interpretato lato server                   | JavaScript lato server                   |
| Esecuzione     | Sincrona                                   | Asincrona (event-driven)                 |
| Performance    | Meno scalabile per richieste elevate       | Più scalabile grazie al non-blocking I/O |
| Configurazione | Necessita di Apache/Nginx                  | Può funzionare autonomamente             |
| API REST       | Possibile con librerie come Slim o Laravel | Integrato con Express.js                 |

## 📂 Contenuto delle Cartelle

- `` → Contiene esempi di server e API HTTP scritti in PHP
- `` → Contiene esempi di server e API HTTP scritti in Node.js con Express

## 🔥 Avvio Rapido

### PHP

1. Avvia un server locale PHP:
   ```sh
   php -S localhost:8000 -t php/
   ```
2. Apri il browser su `http://localhost:8000/server.php`

### Node.js

1. Installa le dipendenze:
   ```sh
   cd node/
   npm install
   ```
2. Avvia il server Node.js:
   ```sh
   node server.js
   ```
3. Apri il browser su `http://localhost:3000`

## 📚 Risorse Utili

- [Documentazione PHP](https://www.php.net/manual/en/)
- [Documentazione Node.js](https://nodejs.org/en/docs/)
- [Express.js](https://expressjs.com/)

---

💡 **Contribuisci!** Se hai miglioramenti o vuoi aggiungere altri esempi, sentiti libero di fare una Pull Request! 🚀

