<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Form Sicuro</title>
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #2980B9;
            --accent-color: #27AE60;
            --bg-gradient-start: #e0eafc;
            --bg-gradient-end: #cfdef3;
            --error-bg: #ffe6e6;
            --error-border: #ffb3b3;
            --message-bg: #e6ffe6;
            --message-border: #b3ffb3;
            --input-bg: #f9f9f9;
            --input-border: #ddd;
            --font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        }

        /* Global reset */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Base settings for body */
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: var(--font-family);
            color: var(--primary-color);
            padding: 20px;
        }

        /* Heading styles */
        h2 {
            color: var(--secondary-color);
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 1.8rem;
        }

        /* Form container styling */
        form {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        form:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        /* Label styling */
        label {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        /* Input field styling */
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid var(--input-border);
            border-radius: 6px;
            background-color: var(--input-bg);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-size: 1rem;
        }

        input[type="text"]:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.4);
            outline: none;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: var(--secondary-color);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: var(--accent-color);
            transform: scale(1.02);
        }

        /* Message and error box styling */
        .message, .error {
            margin-top: 20px;
            padding: 15px;
            border-radius: 6px;
            width: 100%;
            max-width: 400px;
            font-size: 1rem;
        }

        .message {
            background-color: var(--message-bg);
            border: 1px solid var(--message-border);
        }

        .error {
            background-color: var(--error-bg);
            border: 1px solid var(--error-border);
            text-align: center;
        }

        /* Table styling */
        table {
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: var(--message-bg);
            border: 1px solid var(--message-border);
        }

        table caption {
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }

        table th, table td {
            border: 1px solid var(--message-border);
            padding: 10px;
            text-align: left;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            form, .message, .error, table {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <h2>Inserisci il tuo nome:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <input type="submit" value="Invia">
    </form>
    <?php
    $filename = __DIR__ . '/names.txt';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($nome)) {
            echo "<div class='error'>Il nome non può essere vuoto.</div>";
        } else {
            file_put_contents($filename, $nome . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }

    if (file_exists($filename)) {
        $names = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($names) {
            echo "<table class='message'>";
            echo "<caption>Lista dei nomi inseriti</caption>";
            echo "<tbody>";
            foreach ($names as $storedName) {
                echo "<tr><td>" . htmlspecialchars($storedName) . "</td></tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
    }
    ?>
</body>

</html>