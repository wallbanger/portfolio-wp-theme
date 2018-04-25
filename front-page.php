<?php get_header(); ?>

<div class="first-screen">
    <div class="first-screen__container">
        <h2>Development</h2>
        <h2>
            <span class="text-insert" data-time="3000" data-words='[ "wordpress", "html", "design" ]'>
                <span class="text-insert__container"></span>
            </span> websites
        </h2>
        <p class="first-screen__text backface">Hi, I´m a '28 years old front-end developer and designer from Kiev. Here are some selected works by me. I look forward to your message.</p>
        <div class="arrow-goto arrow-goto--bottom js-arrow--to-bottom">
            <div class="arrow-goto__line-container">
                <div class="arrow-goto__left"></div>
                <div class="arrow-goto__middle"></div>
                <div class="arrow-goto__right"></div>
            </div>
        </div>
    </div>
</div>

<div class="filter"></div>

<main id="site-wrapper" class="site-wrapper">
    <div class="site-sidebar"></div>
    <div class="site-content">

        <?php global $post;
        $tmp_post = $post;
        $args = array( 'posts_per_page' => 8, 'category_name' => 'projects' );
        $myposts = get_posts( $args );
        foreach( $myposts as $post ){ setup_postdata($post); ?>

            <section class="project-item">
                <div class="project-item__info clearfix">
                    <h2><?php the_title(); ?></h2>
                    <span class="project-item__info-release">Release: <?php $post_date = get_the_date( 'j F Y' ); echo $post_date; ?></span>
                    <a class="project-item__info-link" href="<?php the_field('link'); ?>" target="_blank"><?php the_field('link_title'); ?></a>
                    <ul class="clearfix">
                        <?php
                        $tags = get_the_tags(get_the_ID());
                        foreach ($tags as $tag) {
                            echo '<li>' . $tag->name . '</li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="project-item__image">
                    <?php echo the_post_thumbnail(); ?>
                </div>
            </section>

        <?php } $post = $tmp_post; ?>
        
    </div>
</main>

<?php get_footer(); ?>
