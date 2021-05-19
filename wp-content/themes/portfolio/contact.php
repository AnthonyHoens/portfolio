<section class="contact" id="contact">
    <a href="#" class="contact__close">
        <span class="sro">Fermer le formulaire de contact</span>
    </a>
    <h2 class="contact__title" role="heading" aria-level="2">
        Contactez-moi
    </h2>

    <form action="#" method="post" class="contact__form form">
        <div class="form__field_container">
            <label for="name" class="form__label">Nom</label>
            <input type="text" id="name" name="name" class="form__field" placeholder="Entrez votre nom de famille">
        </div>

        <div class="form__field_container">
            <label for="firstName" class="form__label">Prénom</label>
            <input type="text" id="firstName" name="firstName" class="form__field" placeholder="Entrez votre prénom">
        </div>

        <div class="form__field_container">
            <label for="email" class="form__label">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form__field" placeholder="Entrez votre e-mail">
        </div>

        <div class="form__field_container">
            <label for="message" class="form__label">Message</label>
            <textarea id="message" name="message" class="form__field" placeholder="Je vous contacte au sujet de ..."></textarea>
        </div>

        <div class="form__field_container">
            <button type="submit" id="submit" class="form__submit">
                <span class="form__bg"></span>
                Me contacter
            </button>
        </div>
    </form>
</section>