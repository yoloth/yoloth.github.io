<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('beauty_salon_spa_slider_arrows',false) !== 'off'){ ?>
    <section id="slider">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $beauty_hair_salon_mod =  get_theme_mod( 'beauty_salon_spa_post_setting' . $i );
            if ( 'page-none-selected' != $beauty_hair_salon_mod ) {
              $beauty_salon_spa_slide_post[] = $beauty_hair_salon_mod;
            }
          }
           if( !empty($beauty_salon_spa_slide_post) ) :
          $beauty_hair_salon_args = array(
            'post_type' =>array('post'),
            'post__in' => $beauty_salon_spa_slide_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );
          // Check if specific posts are selected
          if (empty($beauty_salon_spa_slide_post) && is_sticky()) {
            $beauty_hair_salon_args['post__in'] = get_option('sticky_posts');
          }
          
          $beauty_hair_salon_query = new WP_Query( $beauty_hair_salon_args );
          if ( $beauty_hair_salon_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $beauty_hair_salon_query->have_posts() ) : $beauty_hair_salon_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/header-img-3.png" alt="" />
            <?php } ?>
            <div class="carousel-caption">
              <h2><?php the_title();?></h2>
              <?php if( get_option('beauty_salon_spa_slider_excerpt_show_hide',false) != 'off' ){ ?>
                <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('beauty_salon_spa_slider_excerpt_count',20) );?></p>
              <?php } ?>
              <div class="home-btn my-4">
                <a class="py-sm-3 px-sm-4 py-2 px-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('beauty_salon_spa_slider_read_more',__('BOOK NOW','beauty-hair-salon'))); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php if( get_option('beauty_salon_spa_services_show_hide',false) !== 'off'){ ?>
    <section id="home-services" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('beauty_salon_spa_services_short_title') != '' ){ ?>
          <h6 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_short_title','')); ?></h6>
        <?php }?>
        <?php if( get_theme_mod('beauty_salon_spa_services_main_title') != '' ){ ?>
          <h3 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_main_title','')); ?></h3>
        <?php }?>
        <div class="owl-carousel pt-5">
          <?php
            $beauty_hair_salon_project_category=  get_theme_mod('beauty_salon_spa_services_category_setting');if($beauty_hair_salon_project_category){
            $beauty_hair_salon_page_query = new WP_Query(array( 

              'category_name' => esc_html($beauty_hair_salon_project_category ,'beauty-hair-salon'),

              'posts_per_page' => get_theme_mod('beauty_salon_spa_service_count')

            ));?>
              <?php while( $beauty_hair_salon_page_query->have_posts() ) : $beauty_hair_salon_page_query->the_post(); ?>
                <div class="box">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 align-self-center">
                      <div class="img-box">
                        <?php if(has_post_thumbnail()){ ?>
                          <?php the_post_thumbnail(); ?>
                        <?php }else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image.jpg" alt="" />
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6  align-self-center">
                      <div class="box-content">
                         <?php if( get_option('beauty_salon_spa_date',false) != '1') { ?>
                        <span class="me-2"><?php the_time( get_option( 'date_format' ) ); ?></span>
                        <?php } ?>
                        <?php if( get_option('beauty_salon_spa_admin',false) != '1') { ?>
                        <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>"><h4 class="mt-3"><?php the_title();?></h4></a>
                        <p><?php echo wp_trim_words( get_the_content(),10 );?></p>
                        <div class="box-button">
                          <a class="py-2 px-3" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','beauty-hair-salon');?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php if( get_option('beauty_hair_salon_shop_show_hide',false) !== 'off'){ ?>
    <section id="product" class="py-5 text-center">
      <div class="container">
        <?php if( get_theme_mod('beauty_hair_salon_shop_text') != '' ){ ?>
          <h5 class="mb-4"><?php echo esc_html( get_theme_mod('beauty_hair_salon_shop_text')); ?></h5>
        <?php }?>
        <?php if( get_theme_mod('beauty_hair_salon_shop_title') != '' ){ ?>
          <h3><?php echo esc_html( get_theme_mod('beauty_hair_salon_shop_title')); ?></h3>
        <?php }?>
        <div class="row mt-5">
          <?php
          $beauty_hair_salon_catData = get_theme_mod('beauty_hair_salon_shop_category');
          $beauty_hair_salon_count_catData = get_theme_mod('beauty_hair_salon_shop_number');
          if ( class_exists( 'WooCommerce' ) ) {
          $beauty_hair_salon_args = array(
            'post_type' => 'product',
            'posts_per_page' => $beauty_hair_salon_count_catData,
            'product_cat' => $beauty_hair_salon_catData,
            'order' => 'ASC'
          );
          $loop = new WP_Query( $beauty_hair_salon_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="col-lg-3 col-sm-6 mb-4 wow swing">
              <div class="box mb-3">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, ''); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                <div class="box-content">
                  <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                </div>
                <ul class="icon">
                  <li><?php woocommerce_show_product_sale_flash( $post, $product ); ?></li>
                </ul>
              </div>
              <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
              <span><?php esc_attr( apply_filters( 'woocommerce_product_price_class', '' ) ); ?><?php echo $product->get_price_html(); ?></span>
            </div>
          <?php endwhile; wp_reset_query(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
