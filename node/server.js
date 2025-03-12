const express = require("express");

const app = express();
const port = 3000;

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.get("/", (req, res) => {
  res.send("Ricevuta una richiesta GET!");
});

app.post("/", (req, res) => {
  res.send(`Ricevuta una richiesta POST con dati: ${JSON.stringify(req.body)}`);
});

app.listen(port, () => {
  console.log(`Server avviato su http://localhost:${port}`);
});
