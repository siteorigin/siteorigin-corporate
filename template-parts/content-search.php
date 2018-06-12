<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package siteorigin-corp
 * @license GPL 2.0 
 */

$post_class = has_post_thumbnail() ? 'has-post-thumbnail' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() && siteorigin_setting( 'blog_archive_featured_image' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'siteorigin-corp-354x234-crop' ); ?>
			</a>
		</div>
	<?php endif; ?>	

	<div class="corp-content-wrapper">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php siteorigin_corp_post_meta(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php siteorigin_corp_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php siteorigin_corp_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .corp-content-wrapper -->
</article><!-- #post-## -->
