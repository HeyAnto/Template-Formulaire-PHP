<?php require_once "phpmailer.php"; ?>

<form id="contactForm" method="POST" action="">

    <section>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" autocomplete="off" required>
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" autocomplete="off" required>
        </div>
    </section>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" autocomplete="off" required>
    </div>

    <div>
        <label for="objet">Objet</label>
        <input type="text" id="objet" name="objet" autocomplete="off" required>
    </div>

    <div>
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" autocomplete="off" required></textarea>
    </div>

    <section>
        <div></div>
        <button type="submit">Envoyer</button>
    </section>

</form>