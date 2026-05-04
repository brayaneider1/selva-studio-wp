<?php
/**
 * Template Name: Selva Home Custom
 */

get_header('selva'); ?>

<main id="selva-main-content" class="landing">
    
    <section class="section section--full-height hero">
        <div class="container">
            <div class="hero__content reveal">
                <span class="hero__subtitle heading-serif"><i>Digital Craftsmanship</i></span>
                <h1 class="hero__title">Selva <span class="hero__title--italic"><i>Studio</i></span></h1>
                <p class="hero__description">Ingeniería de software de alto impacto inspirada en la biodiversidad tecnológica del Piedemonte Amazónico.</p>
                <div class="hero__actions">
                    <a href="#cotizador" class="btn btn--primary">Cotizar Proyecto</a>
                </div>
            </div>
        </div>
        <div class="hero__decoration"></div>
    </section>

    <section class="section services">
        <div class="container">
            <header class="section__header reveal">
                <h2 class="section__title">Nuestros Servicios</h2>
                <div class="section__line"></div>
            </header>
            
            <div class="services__grid">
                <article class="service-card reveal">
                    <h3 class="service-card__title">Estrategia Digital</h3>
                    <p class="service-card__text">Diseñamos el camino hacia el éxito digital de tu marca.</p>
                </article>
                <article class="service-card reveal">
                    <h3 class="service-card__title">Software Custom</h3>
                    <p class="service-card__text">Desarrollo a medida con las tecnologías más robustas del mercado.</p>
                </article>
                <article class="service-card reveal">
                    <h3 class="service-card__title">Inteligencia Artificial</h3>
                    <p class="service-card__text">Automatización y modelos inteligentes para escalar tu negocio.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="cotizador" class="section quote">
        <div class="container">
            <div class="quote__wrapper">
                <div class="quote__info reveal">
                    <h2 class="quote__title heading-serif">Hablemos de tu <br><i>próximo ecosistema</i></h2>
                    <p class="quote__text">Déjanos tus datos y nos pondremos en contacto en menos de 24 horas.</p>
                </div>
                <div class="quote__form-container reveal">
                    <form id="selva-lead-form" class="quote-form">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-input" placeholder="Nombre completo" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-input" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group">
                            <select name="servicio" class="form-input">
                                <option value="web">Desarrollo Web Custom</option>
                                <option value="marketing">Estrategia Digital</option>
                                <option value="ia">Soluciones de IA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="budget" class="form-input" placeholder="Presupuesto estimado (USD)">
                        </div>
                        <div class="form-group">
                            <textarea name="mensaje" class="form-input" placeholder="¿En qué podemos ayudarte?" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn--block">Enviar Solicitud</button>
                    </form>
                    <div id="form-response" class="quote-form__response"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer('selva'); ?>
