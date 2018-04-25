<?php get_header(); ?>

<main class="site-wrapper">
    <div class="site-sidebar"></div>

    <div class="site-content site-page type-post">
        <article>
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php if (have_posts()) : the_post() ?>
                <?php the_content();?>
                <?php edit_post_link(__('Edit This')); ?>
            <?php endif; ?>
        </article>
    </div>
</main>

<?php get_footer(); ?>
