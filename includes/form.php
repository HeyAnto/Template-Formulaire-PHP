<form method="POST" action="">

    <section>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" autocomplete="off" required pattern="[A-Za-zÀ-ÿ\- ]+">
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" autocomplete="off" required pattern="[A-Za-zÀ-ÿ\- ]+">
        </div>
    </section>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required autocomplete="off">
    </div>

    <div>
        <label for="objet">Objet</label>
        <input type="text" id="objet" name="objet" required autocomplete="off">
    </div>

    <div>
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required autocomplete="off"></textarea>
    </div>

    <section>
        <div></div>
        <button type="submit">Envoyer</button>
    </section>

</form>