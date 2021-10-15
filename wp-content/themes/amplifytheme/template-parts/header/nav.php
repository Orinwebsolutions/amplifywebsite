<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
 
if ( has_custom_logo() ) {
    $logo = '<div class="logo-container"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="logo"></div>';
} else {
    $logo = '<h1>' . get_bloginfo('name') . '</h1>';
}
$menu_name = 'header-menu';
$locations = get_nav_menu_locations();
$header_menus = wp_get_nav_menu_items( $locations['header-menu'] );

function get_child_menu_items( $menu_array, $parent_id ) {
    $child_menus = [];

    if( !empty( $menu_array && is_array( $menu_array ) ) ) {
        foreach( $menu_array as $menu ) {
            if( intval( $menu->menu_item_parent ) === $parent_id ) {
                array_push( $child_menus, $menu );
            }
        }
    }

    return $child_menus;
}
?>
<div class="container">
<div class="row">
    <nav class="navbar navbar-expand-lg">
    <?php echo $logo; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
                if( !empty( $header_menus && is_array( $header_menus ) ) ){
                ?>
                    <ul class="navbar-nav ml-auto">
                        <?php
                            foreach( $header_menus as $menu_item ) {
                                if( ! $menu_item->menu_item_parent ) {

                                    $child_menu_items = get_child_menu_items( $header_menus, $menu_item->ID );
                                    $has_children = !empty( $child_menu_items ) && is_array( $child_menu_items );

                                    if( !$has_children ) {
                                        $classes = implode(" ",$menu_item->classes)
                                    ?>
                                        <li class="nav-item <?php echo $classes; ?> ">
                                            <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                                                <?php echo esc_html( $menu_item->title ); ?>
                                            </a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo esc_html( $menu_item->title ); ?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <?php
                                                    foreach( $child_menu_items as $child_menu_item ) {
                                                    ?>
                                                        <a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url ); ?>">
                                                            <?php echo esc_html( $child_menu_item->title ); ?>
                                                        </a>
                                                    <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                    <?php
                                    }

                                ?>

                                <?php
                                }
                            }
                        ?>
                    </ul>
                <?php
                }
            ?>
        </div>
    </nav>
</div>
</div>