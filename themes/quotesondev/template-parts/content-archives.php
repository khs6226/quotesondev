<?php
/**
 * Template part for displaying page content.
 *
 * @package QOD_Starter_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="archives">
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>

        <div class="authors-archive">
            <h2 class="authors">Quote Authors</h2>
            <ul>
                <?php $authors = new WP_Query(array (
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                ));
                if ($authors->have_posts()) : ?>
                    <?php while ($authors->have_posts()) : $authors->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>

        <div class="categories-archive">
            <h2>Categories</h2>
            <ul>
                <?php $categories = get_categories();
                    foreach($categories as $cat) {
                        echo '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></li>';
                    }?>
            </ul>
        </div>

        <div class="tags-archive">
            <h2>Tags</h2>
            <ul>
                <?php $tags = get_tags();
                    foreach($tags as $tag) {
                        echo '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></li>';
                    }?>
            </ul>
        </div>
    </section>

</article><!-- #post-## -->
