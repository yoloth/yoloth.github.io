<?php
/**
 * The template for displaying all single posts
 * 
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

$beauty_salon_spa_single_post_option = get_theme_mod( 'beauty_salon_spa_single_post_option','single_right_sidebar'); ?>
<main id="content">
	<?php $beauty_salon_spa_header_option = get_theme_mod( 'beauty_salon_spa_show_header_image','on');
	if($beauty_salon_spa_header_option == 'on'){ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" class="outer-div">
				<?php if(has_post_thumbnail()){ ?>
		             <div class="single-post-image">
						<?php the_post_thumbnail(); ?>
					</div>
	            <?php }
	            else { ?>
	            	<div class="header-image"></div>
	            <?php } ?>
				<div class="inner-div">
					<?php //breadcrumb
					if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { ?>
						<div class="bread_crumb single_breadcrumb align-self-center text-center">
							<?php beauty_salon_spa_breadcrumb();  ?>
						</div>
					<?php } ?>
		    		<h2 class="my-4 text-center"><?php the_title();?></h2>
	    			<div class="date-box text-center my-3 align-self-center">
		    			<?php if( get_option('beauty_salon_spa_single_post_date',false) != 'off'){ ?>
		    				<span class="me-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_date_icon','far fa-calendar-alt')); ?> me-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
		    			<?php } ?>
		    			<?php if( get_option('beauty_salon_spa_single_post_admin',false) != 'off'){ ?>
		    				<span class="entry-author me-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_author_icon','fas fa-user')); ?> me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
		    			<?php }?>
		    			<?php if( get_option('beauty_salon_spa_single_post_comment',false) != 'off'){ ?>
		  					<span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_comment_icon','fas fa-comments')); ?> me-2"></i> <?php comments_number( __('0 Comments','beauty-salon-spa'), __('0 Comments','beauty-salon-spa'), __('% Comments','beauty-salon-spa')); ?></span>
		  				<?php }?>
		  				<?php if( get_option('beauty_salon_spa_single_post_tag_count',false) != 'off'){ ?>
	      					<span class="tags"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_tag_icon','fas fa-tags')); ?> me-2"></i> <?php beauty_salon_spa_display_post_tag_count(); ?></span>
	      				<?php }?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="container">
			<div class="content-area my-5">
				<div id="main" class="site-main" role="main">
			       	<div class="row m-0">
			       		<?php if($beauty_salon_spa_single_post_option == 'single_right_sidebar'){ ?>
				    		<div class="content_area col-lg-8 col-md-8">
						    	<section id="post_section">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div id="single-post-section" class="single-post-page entry-content">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										        <div class="entry-content">
										            <?php the_content(); ?>
										        </div>
										        <?php if( get_option('beauty_salon_spa_single_post_tag',false) != 'off'){ ?>
							      					<?php if (has_tag()) {
													    $tags_list = get_the_tag_list('Tags: ', ' ');
														if ($tags_list) {
														    echo '<div class="single-tags py-3">' . $tags_list . '</div>';
														}
													}
							      				}?>
										      	<div class="clearfix"></div> 
											</div>
										</div>
										<?php // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'beauty-salon-spa' ) . '</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'beauty-salon-spa' ) . '</span> ',
										) );

									endwhile; // End of the loop.
									?>
									<div class="clearfix"></div> 
									<?php if( get_option('beauty_salon_spa_similar_post',false) != 'off'){ ?>
									<div class="my-5"><?php get_template_part( 'template-parts/post/similar-post') ?></div>
									<?php } ?>
								</section>
							</div>
							<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
						<?php }
						else if($beauty_salon_spa_single_post_option == 'single_left_sidebar'){ ?>
							<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
				    		<div class="content_area col-lg-8 col-md-8">
						    	<section id="post_section">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div id="single-post-section" class="single-post-page entry-content">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										        <div class="entry-content">
									            	<?php the_content(); ?>
										        </div>
										        <?php if( get_option('beauty_salon_spa_single_post_tag',false) != 'off'){ ?>
							      					<?php if (has_tag()) {
													    $tags_list = get_the_tag_list('Tags: ', ' ');
														if ($tags_list) {
														    echo '<div class="single-tags py-3">' . $tags_list . '</div>';
														}
													}
							      				}?>
										      	<div class="clearfix"></div> 
											</div>
										</div>
										<?php // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'beauty-salon-spa' ) . '</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'beauty-salon-spa' ) . '</span> ',
										) );

									endwhile; // End of the loop.
									?>
									<div class="clearfix"></div> 
									<?php if( get_option('beauty_salon_spa_similar_post',false) != 'off'){ ?>
									<div class="my-5"><?php get_template_part( 'template-parts/post/similar-post') ?></div>
									<?php } ?>
								</section>
							</div>
						<?php }
						else if($beauty_salon_spa_single_post_option == 'single_full_width'){ ?>
							<div class="content_area col-lg-12 col-md-12">
						    	<section id="post_section">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div id="single-post-section" class="single-post-page entry-content">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										        <div class="entry-content">
									            	<?php the_content(); ?>
										        </div>
										        <?php if( get_option('beauty_salon_spa_single_post_tag',false) != 'off'){ ?>
							      					<?php if (has_tag()) {
													    $tags_list = get_the_tag_list('Tags: ', ' ');
														if ($tags_list) {
														    echo '<div class="single-tags py-3">' . $tags_list . '</div>';
														}
													}
							      				}?>
										      	<div class="clearfix"></div> 
											</div>
										</div>
										<?php // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'beauty-salon-spa' ) . '</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'beauty-salon-spa' ) . '</span> ',
										) );

									endwhile; // End of the loop.
									?>
									<div class="clearfix"></div> 
									<?php if( get_option('beauty_salon_spa_similar_post',false) != 'off'){ ?>
									<div class="my-5"><?php get_template_part( 'template-parts/post/similar-post') ?></div>
									<?php } ?>
								</section>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
	else if($beauty_salon_spa_header_option == 'off'){ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" class="without-img-head py-5">
				<?php //breadcrumb
				if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { ?>
					<div class="bread_crumb single_breadcrumb align-self-center text-center">
						<div class="without-img">
							<?php beauty_salon_spa_breadcrumb();  ?>
						</div>
					</div>
				<?php } ?>
				<h2 class="my-4 withoutimg text-center"><span><?php the_title();?></span></h2>
				<div class="date-box withoutimg-date-box text-center my-3 align-self-center">
					<?php if( get_option('beauty_salon_spa_single_post_date',false) != 'off'){ ?>
						<span class="me-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_date_icon','far fa-calendar-alt')); ?> me-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
					<?php } ?>
					<?php if( get_option('beauty_salon_spa_single_post_admin',false) != 'off'){ ?>
						<span class="entry-author me-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_author_icon','fas fa-user')); ?> me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
					<?php }?>
					<?php if( get_option('beauty_salon_spa_single_post_comment',false) != 'off'){ ?>
						<span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_comment_icon','fas fa-comments')); ?> me-2"></i> <?php comments_number( __('0 Comments','beauty-salon-spa'), __('0 Comments','beauty-salon-spa'), __('% Comments','beauty-salon-spa')); ?></span>
					<?php }?>
					<?php if( get_option('beauty_salon_spa_single_post_tag_count',false) != 'off'){ ?>
						<span class="tags"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_single_tag_icon','fas fa-tags')); ?> me-2"></i> <?php beauty_salon_spa_display_post_tag_count(); ?></span>
					<?php }?>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="container">
			<div class="content-area my-5">
				<div id="main" class="site-main" role="main">
			       	<div class="row m-0">
			       		<?php if($beauty_salon_spa_single_post_option == 'single_right_sidebar'){ ?>
				    		<div class="content_area col-lg-8 col-md-8">
						    	<section id="post_section">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div id="single-post-section" class="single-post-page entry-content">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										        <div class="entry-content">
										        	<?php if(has_post_thumbnail()){ ?>
														<div class="pb-4"><?php the_post_thumbnail(); ?></div>
													<?php } ?>
										            <?php the_content(); ?>
										        </div>
										        <?php if( get_option('beauty_salon_spa_single_post_tag',false) != 'off'){ ?>
							      					<?php if (has_tag()) {
													    $tags_list = get_the_tag_list('Tags: ', ' ');
														if ($tags_list) {
														    echo '<div class="single-tags py-3">' . $tags_list . '</div>';
														}
													}
							      				}?>
										      	<div class="clearfix"></div> 
											</div>
										</div>
										<?php // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'beauty-salon-spa' ) . '</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'beauty-salon-spa' ) . '</span> ',
										) );

									endwhile; // End of the loop.
									?>
									<div class="clearfix"></div> 
									<?php if( get_option('beauty_salon_spa_similar_post',false) != 'off'){ ?>
									<div class="my-5"><?php get_template_part( 'template-parts/post/similar-post') ?></div>
									<?php } ?>
								</section>
							</div>
							<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
						<?php }
						else if($beauty_salon_spa_single_post_option == 'single_left_sidebar'){ ?>
							<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
				    		<div class="content_area col-lg-8 col-md-8">
						    	<section id="post_section">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div id="single-post-section" class="single-post-page entry-content">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										        <div class="entry-content">
										        	<?php if(has_post_thumbnail()){ ?>
														<div class="pb-4"><?php the_post_thumbnail(); ?></div>
													<?php } ?>
									            	<?php the_content(); ?>
										        </div>
										        <?php if( get_option('beauty_salon_spa_single_post_tag',false) != 'off'){ ?>
							      					<?php if (has_tag()) {
													    $tags_list = get_the_tag_list('Tags: ', ' ');
														if ($tags_list) {
														    echo '<div class="single-tags py-3">' . $tags_list . '</div>';
														}
													}
							      				}?>
										      	<div class="clearfix"></div> 
											</div>
										</div>
										<?php // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'beauty-salon-spa' ) . '</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'beauty-salon-spa' ) . '</span> ',
										) );

									endwhile; // End of the loop.
									?>
									<div class="clearfix"></div> 
									<?php if( get_option('beauty_salon_spa_similar_post',false) != 'off'){ ?>
									<div class="my-5"><?php get_template_part( 'template-parts/post/similar-post') ?></div>
									<?php } ?>
								</section>
							</div>
						<?php }
						else if($beauty_salon_spa_single_post_option == 'single_full_width'){ ?>
							<div class="content_area col-lg-12 col-md-12">
						    	<section id="post_section">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div id="single-post-section" class="single-post-page entry-content">
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										        <div class="entry-content">
										        	<?php if(has_post_thumbnail()){ ?>
														<div class="pb-4"><?php the_post_thumbnail(); ?></div>
													<?php } ?>
									            	<?php the_content(); ?>
										        </div>
										        <?php if( get_option('beauty_salon_spa_single_post_tag',false) != 'off'){ ?>
							      					<?php if (has_tag()) {
													    $tags_list = get_the_tag_list('Tags: ', ' ');
														if ($tags_list) {
														    echo '<div class="single-tags py-3">' . $tags_list . '</div>';
														}
													}
							      				}?>
										      	<div class="clearfix"></div> 
											</div>
										</div>
										<?php // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'beauty-salon-spa' ) . '</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'beauty-salon-spa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'beauty-salon-spa' ) . '</span> ',
										) );

									endwhile; // End of the loop.
									?>
									<div class="clearfix"></div> 
									<?php if( get_option('beauty_salon_spa_similar_post',false) != 'off'){ ?>
									<div class="my-5"><?php get_template_part( 'template-parts/post/similar-post') ?></div>
									<?php } ?>
								</section>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</main>