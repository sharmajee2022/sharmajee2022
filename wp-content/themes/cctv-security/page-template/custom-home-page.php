<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'cctv_security_above_slider' ); ?>

	<?php if( get_theme_mod('cctv_security_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel" data-ride="carousel"> 
			    <?php $cctv_security_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'cctv_security_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $cctv_security_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($cctv_security_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $cctv_security_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
			        	<div class="slider-img">
            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
            			</div>
            			<div class="slider-bg"></div>
            			<div class="carousel-caption">
				            <div class="inner-carousel">
				              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				              	<p><?php $cctv_security_excerpt = get_the_excerpt(); echo esc_html( cctv_security_string_limit_words( $cctv_security_excerpt,15 ) ); ?></p>
				              	<a href="<?php the_permalink(); ?>" class="read-btn"><?php echo esc_html('Read More','cctv-security'); ?></a>
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
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','cctv-security' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','cctv-security' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>
	
	<?php do_action('cctv_security_below_slider'); ?>

	<section id="features-section" class="py-5">
		<div class="container">
			<div class="feature-head text-center mb-4">
				<?php if(get_theme_mod('cctv_security_feature_small_title') != ''){ ?>
					<p class="small-title"><?php echo esc_html(get_theme_mod('cctv_security_feature_small_title')); ?></p>
				<?php }?>
				<?php if(get_theme_mod('cctv_security_feature_section_title') != ''){ ?>
					<h3><?php echo esc_html(get_theme_mod('cctv_security_feature_section_title')); ?></h3>
				<?php }?>
			</div>
			<div class="row">
				<?php $cctv_security_catData1 =  get_theme_mod('cctv_security_category_setting');
				if($cctv_security_catData1){ 
	  				$page_query = new WP_Query(array( 'category_name' => esc_html($cctv_security_catData1 ,'cctv-security')));?>
	        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
	          			<div class="col-lg-4 col-md-6">
	          				<div class="features-box">
	      						<div class="features-img">
						      		<?php the_post_thumbnail(); ?>
						      		<div class="image-border"></div>
						  		</div>
	      						<div class="features-content">
				            		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
				            		<p><?php $cctv_security_excerpt = get_the_excerpt(); echo esc_html( cctv_security_string_limit_words( $cctv_security_excerpt,15 ) ); ?></p>
				            		<div class="feature-btn text-right">
				            			<a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','cctv-security'); ?><i class="fas fa-angle-double-right ml-2"></i><span class="screen-reader-text"><?php echo esc_html('Read More','cctv-security'); ?></span></a>
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

	<?php do_action('cctv_security_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>