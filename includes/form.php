<form id="contactForm" method="POST" action="">

    <section>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
    </section>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="objet">Objet</label>
        <input type="text" id="objet" name="objet" required>
    </div>

    <div>
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>
    </div>

    <section>
        <div></div>
        <button type="submit">Envoyer</button>
    </section>

</form>