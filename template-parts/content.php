<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package siteorigin-corp
 * @license GPL 2.0 
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! siteorigin_corp_is_post_loop_widget() && siteorigin_setting( 'blog_archive_layout' ) == 'offset' || siteorigin_corp_is_post_loop_template( 'offset' ) ) : ?>
		<div class="entry-offset">
			<?php siteorigin_corp_offset_post_meta(); ?>
		</div>
	<?php endif; ?>		

	<?php if ( is_single() && has_post_thumbnail() && siteorigin_setting( 'blog_post_featured_image' ) ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>	
	<?php elseif ( ! siteorigin_corp_is_post_loop_widget() && has_post_thumbnail() && siteorigin_setting( 'blog_archive_featured_image' ) && siteorigin_setting( 'blog_archive_layout' ) == 'grid' || has_post_thumbnail() && siteorigin_corp_is_post_loop_template( 'grid' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'siteorigin-corp-720x480-crop' ); ?>	
			</a>
		</div>
	<?php elseif ( ! siteorigin_corp_is_post_loop_widget() && has_post_thumbnail() && siteorigin_setting( 'blog_archive_featured_image' ) && siteorigin_setting( 'blog_archive_layout' ) == 'alternate' || has_post_thumbnail() && siteorigin_corp_is_post_loop_template( 'alternate' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'siteorigin-corp-720x480-crop' ); ?>	
			</a>
		</div>		
	<?php elseif ( ! siteorigin_corp_is_post_loop_widget() && has_post_thumbnail() && siteorigin_setting( 'blog_archive_featured_image' ) && siteorigin_setting( 'blog_archive_layout' ) == 'masonry' || has_post_thumbnail() && siteorigin_corp_is_post_loop_template( 'masonry' ) ) : ?>
		<div class="entry-thumbnail">
			<?php if ( siteorigin_setting( 'blog_post_categories' ) ) siteorigin_corp_entry_thumbnail_meta(); ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>	
			</a>
		</div>
	<?php elseif ( has_post_thumbnail() && siteorigin_setting( 'blog_archive_featured_image' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>	

	<div class="corp-content-wrapper">

		<header class="entry-header">
			<?php 
			if ( is_single() ) {
				if ( siteorigin_page_setting( 'page_title' ) ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				}
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php 
					if ( ! siteorigin_corp_is_post_loop_widget() && siteorigin_setting( 'blog_archive_layout' ) == 'offset' || siteorigin_corp_is_post_loop_template( 'offset' ) ) :
						siteorigin_corp_posted_on();
					else :
						siteorigin_corp_post_meta();
					endif; 
					?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				if ( is_single() || ( siteorigin_setting( 'blog_archive_content' ) == 'full' ) ) {
					the_content();
				} else {
					siteorigin_corp_excerpt();
				}

				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'siteorigin-corp' ) . '</span>',
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
		
	</div><!-- .corp-content-wrapper -->

	<?php siteorigin_corp_entry_footer(); ?>
</article><!-- #post-## -->
