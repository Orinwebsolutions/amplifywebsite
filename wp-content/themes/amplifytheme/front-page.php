<?php
/**
* Main template file
*/
get_header();
?>
<div id="content">
    <div class="container">
        <?php if( have_rows('banner_setting') ): ?>
                <div class="full-width slider-banner-image">
                    <?php while( have_rows('banner_setting') ): the_row(); 
                        // Get sub field values.
                        $heading = get_sub_field('banner_heading');
                        $subheading = get_sub_field('banner_sub_heading');
                        $cta_btn_text = get_sub_field('cta_button_text');
                        $cta_btn_link = get_sub_field('cta_button_link');
                        $galleryimages = get_sub_field('gallery_setting');
                        ?>
                        <div class="banner-content">
                            <div class="width-50">
                                <h2 class="banner_heading"><?php echo $heading; ?></h2>
                                <p class="banner_sub_heading"><?php echo $subheading; ?></p>
                                <a class="button cta-button text-white inline-block" href="#"><?php echo $cta_btn_text; ?></a>
                            </div>
                            <div class="width-50 slider-content owl-carousel owl-theme">
                                <?php
                                    if( have_rows('gallery_setting') ): 
                                        foreach ($galleryimages as $image) {
                                            if($image){
                                ?>
                                        <div class="item">
                                            <img src="<?php echo esc_url( $image ); ?>" />
                                        </div>
                                <?php 
                                            }
                                        } 
                                    endif; 
                                ?>   
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
        <?php endif; ?>     
        <?php the_content(); ?>
    </div>
</div>
<?php
get_footer();
?>
    
