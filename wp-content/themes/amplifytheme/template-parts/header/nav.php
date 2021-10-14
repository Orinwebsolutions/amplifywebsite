<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
 
if ( has_custom_logo() ) {
    $logoplacement = '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
} else {
    $logoplacement = '<h1>' . get_bloginfo('name') . '</h1>';
}
?>
<div class="container">
<div class="row">
    <nav class="navbar navbar-expand-lg">
    <?php echo $logoplacement; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        </ul>
    </div>
    <?php 
    wp_nav_menu(
        array(
          'menu' => 'header-menu',
        //   'link_before' => '<span class="screen-reader-text">',
        //   'link_before' => '<span class="">',
        //   'link_after' => '</span>',
        //   'container_class' => 'primary-menu'
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse justify-content-end',
        // 'container_id'      => 'navbarSupportedContent',
        'menu_class'        => 'navbar-nav mr-auto',
            // 'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            // 'walker'            => new WP_Bootstrap_Navwalker(),
        )
      );
    ?>
    </nav>
</div>
</div>