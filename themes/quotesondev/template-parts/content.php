<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<div class="entry-meta">
		<?php
			the_title('<h2 class="entry-title">&#8212 ', '</h2>');
			$source = get_post_meta(get_the_id(), '_qod_quote_source', true);
			$source_url = get_post_meta(get_the_id(), '_qod_quote_source_url', true);
		if($source && $source_url) : ?>
			<span class='source'><a href='<?php echo $source_url?>'><?php echo $source ?></a></span>
		<?php elseif($source) : ?>
			<span class='source'><?php echo $source ?></span>
		<?php endif; ?>
	</div>
</article><!-- #post-## -->
