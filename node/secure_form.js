const express = require("express");
const { body, validationResult } = require("express-validator");

const app = express();
const port = 3000;

app.use(express.json());

app.post(
  "/secure",
  [body("nome").isAlpha().withMessage("Il nome deve contenere solo lettere")],
  (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }
    res.send(`Dati sicuri: ${req.body.nome}`);
  }
);

app.listen(port, () => {
  console.log(`Server sicuro avviato su http://localhost:${port}/secure`);
});
