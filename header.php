<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><?php wp_title(); ?></title>
    <link rel="icon" type="image/png" href="favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600|Open+Sans:300,400,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-58123998-2', 'auto');
    ga('send', 'pageview');

</script>

<body class="touch">

    <header class="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" title="Wallbanger Portfolio"></a>
        <h1>Wallbanger front-end developer</h1>
        <div class="site-header__toggle-menu">
        <span class="menu-gamburger js-toggle">
            <i class="menu-gamburger__line menu-gamburger__line_1"></i>
            <i class="menu-gamburger__line menu-gamburger__line_2"></i>
            <i class="menu-gamburger__line menu-gamburger__line_3"></i>
        </span>
        </div>
        <nav class="site-header__nav">
            <?php wp_nav_menu( array(
                'container'=> false,
                'theme_location'  => 'Primary',
                'menu' => 'Primary',
                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
            ) );
            ?>
            <hr>
            <div class="contacts-info">
                <a class="social-icon" target="_blank" href="https://www.facebook.com/wall.banger.16">
                    <span>Facebook</span>
                    <svg width="25" height="25">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/sprite.svg#fb"></use>
                    </svg>
                </a>
                <a class="social-icon" target="_blank" href="https://ua.linkedin.com/in/ekoval">
                    <span>Linkedin</span>
                    <svg width="25" height="25">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/sprite.svg#in"></use>
                    </svg>
                </a>
                <a class="social-icon" target="_blank" href="https://vk.com/id5675343">
                    <span>Vkontakte</span>
                    <svg width="25" height="25">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/sprite.svg#vk"></use>
                    </svg>
                </a>
                <a class="social-icon" href="skype:thisiswallbanger?chat">
                    <span>Skype</span>
                    <svg width="25" height="25">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/sprite.svg#sk"></use>
                    </svg>
                </a>
            </div>
        </nav>
        <div class="site-header__overlay"></div>
    </header>
    