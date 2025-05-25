<?php
    if(!isset($styleLink)){
        $styleLink = '<link rel="stylesheet" href="/adrar/Epinature/view/style/errorPage.css">';
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - Epinature</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Gabarito:wght@400..900&family=Pangolin&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <?php echo $styleLink; ?>
</head>
<body class="error-container">
    <h1>404</h1>
    <h2>Page non trouvée</h2>
    <p>Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
    <a href="/adrar/Epinature/accueil" class="btn">Retour à l'accueil</a>
</body>
</html>
