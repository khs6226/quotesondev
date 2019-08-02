<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package QOD_Starter_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 	
		$the_query = new WP_Query( array ( 
			'orderby' => 'rand', 
			'posts_per_page' => '1' 
			));
	?>
	<div class="entry-content">
		<?php
		while ( $the_query->have_posts() ) : $the_query->the_post();
			the_content();
		endwhile;
		wp_reset_postdata();
		?>
	</div><!-- .entry-content -->
	<div class="entry-meta">
		<?php 
		while ($the_query->have_posts() ) : $the_query->the_post();
			the_title('<h2 class="entry-title">', '</h2>');
			$source = get_post_meta(get_the_id(), '_qod_quote_source', true);
			$source_url = get_post_meta(get_the_id(), '_qod_quote_source_url', true);
		if($source && $source_url) : ?>
			<span class='source'><a href='<?php echo $source_url?>'><?php echo $source ?></a></span>
		<?php elseif($source) : ?>
			<span class='source'><?php echo $source ?></span>
		<?php endif; ?>
		<?php endwhile;	?>
		
		
		
		
	</div>
</article><!-- #post-## -->
