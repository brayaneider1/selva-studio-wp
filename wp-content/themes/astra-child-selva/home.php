<?php
/**
 * Template Name: Selva Noticias Custom
 */

get_header('selva'); ?>

<main id="selva-news-content" class="news">
    
    <!-- News Header -->
    <header class="section news-header">
        <div class="container">
            <div class="news-header__content reveal">
                <span class="news-header__subtitle heading-serif"><i>Journal</i></span>
                <h1 class="news-header__title">Novedades & <br><i>Perspectivas</i></h1>
            </div>
        </div>
    </header>

    <!-- News Feed -->
    <section class="section news-feed">
        <div class="container">
            <div class="news-feed__grid">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="post-card reveal">
                        <div class="post-card__meta">
                            <span class="post-card__date"><?php echo get_the_date(); ?></span>
                        </div>
                        <h2 class="post-card__title heading-serif">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="post-card__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="post-card__link">Leer más <span class="arrow">→</span></a>
                    </article>
                <?php endwhile; else : ?>
                    <p>Próximamente más noticias de la selva tecnológica.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer('selva'); ?>

