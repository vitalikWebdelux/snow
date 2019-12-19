<?php
    $clientage_logos = carbon_get_theme_option( 'td_clientage', 'complex' );
    if ( ! empty( $clientage_logos ) ): 
?>
<section class="customers-wrap">
    <div class="container">
        <div class="customers">
            <div class="customers__title">
                <h2><span>Серед</span><br> наших клієнтів</h2>
            </div>
            <div class="customers__slider">
                <div class="customers_slider-next"></div>
                <div class="customers_slider-prev"></div>
               
                <div class="customers-slider">
                    <?php foreach ( $clientage_logos as $clientage_logo ):
                    
                        $logo = $clientage_logo['image']; 
                        $logo_src =  wp_get_attachment_image_src( $logo ,  'full');  
                    ?>
                    
                    <div class="customers-slide">
                        <img src="<?php echo $logo_src[0];?>" alt="">  
                    </div>
                    <!-- <div class="customers-slide">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/sp_logo.svg" alt="">
                    </div>
                    <div class="customers-slide">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/blago.png" alt="">  
                    </div>
                    <div class="customers-slide">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/sp_logo.svg" alt="">
                    </div>
                    <div class="customers-slide">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/blago.png" alt="">  
                    </div> -->
                    <?php endforeach; ?>
                           
                </div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>