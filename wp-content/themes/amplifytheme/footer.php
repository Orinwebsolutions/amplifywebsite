<?php
/**
 * Footer template
 */
?>
            <footer>
                <div class="container">
                        <div class="row top">
                                <?php 
                                    if( is_active_sidebar( 'footer-1' ) ) {
                                ?>
                                    <div class="col-md column-01">
                                        <?php dynamic_sidebar( 'footer-1' ); ?>
                                    </div>
                                <?php
                                    }
                                    if( is_active_sidebar( 'footer-2' ) ) {
                                ?>
                                    <div class="col-md column-02">
                                        <?php dynamic_sidebar( 'footer-2' ); ?>
                                    </div>
                                <?php
                                    }
                                    if( is_active_sidebar( 'footer-3' ) ) {
                                ?>
                                    <div class="col-md column-03 signup">
                                        <?php dynamic_sidebar( 'footer-3' ); ?>
                                    </div>
                                <?php
                                    }
                                ?>
                        </div>
                        <div class="row middle">
                            <div class="col-md"></div>
                        </div>
                        <div class="row copyright">
                            <?php 
                                if( is_active_sidebar( 'sidebar-1' ) ) {
                                ?>
                                    <div class="col-md">
                                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                                    </div>
                                <?php
                                }
                            ?>
                            <div class="col-md"></div>
                        </div>
                </div>
            </footer>
        </div>
    <?php wp_footer();?>
    </body>
</html>