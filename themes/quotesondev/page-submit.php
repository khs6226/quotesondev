<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="quote-submit">
				<header class="entry-header">
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				</header>
				
				<?php if(is_user_logged_in()) : ?>
					<?php get_template_part( 'template-parts/content', 'submit' ); ?>
				<?php else : ?>
					<p>
						Sorry, you must be logged in to submit a quote!
					</p>
					<a href="<?php echo esc_url(admin_url()); ?>">Click here to login</a>
				<?php endif ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>