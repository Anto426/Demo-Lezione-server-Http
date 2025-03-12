const express = require("express");

const app = express();
const port = 3000;

app.get("/api", (req, res) => {
  res.json({ messaggio: "Benvenuto nell'API Node.js!", status: 200 });
});

app.listen(port, () => {
  console.log(`API disponibile su http://localhost:${port}/api`);
});
