<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Template Formulaire</title>

    <link rel="icon" type="image/svg+xml" href="assets/favico.svg">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <main>
        <section class="flex flex-column gap-0">
            <h1>Template Formulaire</h1>
            <p class="p-min">Composant réutilisable d'envoi d'email via un formulaire en PHP, réalisé dans le cadre d'un brief SIMPLON.</p>
            <div class="flex flex-row gap-10">
                <a href="https://github.com/HeyAnto/Formulaire-Contact-PHP" target="_blank">
                    GitHub
                </a>
                <p class="p-min">/</p>
                <a href="https://bsky.app/" target="_blank">
                    Inspiration Bluesky
                </a>
            </div>
        </section>

        <?php include_once "./includes/mail.php" ?>

        <?php include_once "./includes/form.php" ?>

    </main>

</body>

</html>