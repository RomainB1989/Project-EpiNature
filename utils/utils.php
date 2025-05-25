<?php
    function sanitize($data) {
            $data = htmlentities($data);
            $data = strip_tags($data);
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

    function connect(): PDO{
        // Recupère les vriables du fichier .env
        $envFile = __DIR__ . '/../.env';
        // check si .env existe.
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            // transforme contenu fichier .env en tableau de str en ignorant lignes vide et '\n'. 
            // Boucle sur le tableau pour check si le contenu est correct + nettoyage si correct.
            foreach ($lines as $line) {
                // Boucle sur le tableau pour check si le contenu est correct.
                if (strpos($line, '=') !== false) {
                    // Si contenu correct -> découpage du contenu en nom de variable + valeure associée avec peit nettoyage. 
                    list($name, $value) = explode('=', $line, 2);
                    $_ENV[trim($name)] = trim($value);
                }
            }
        }

        // Check si nom de variable sont avec bonne syntaxe et on une valeur.
        $required_vars = ['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME'];
        foreach ($required_vars as $var) {
            if (!isset($_ENV[$var])) {
                throw new Exception("Environment variable $var is not set. Please check your .env file.");
            }
        }
        // Connection a la bdd avec les bons paramètres
        $conn = new PDO(
            "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4", 
            $_ENV['DB_USER'], 
            $_ENV['DB_PASSWORD'], 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        return $conn;
    }

?>