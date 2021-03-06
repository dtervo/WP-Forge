<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.2.1
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1><?php the_title(); ?></h1>
			<?php if( get_theme_mod( 'wpforge_single_thumb_display' ) == 'yes') { ?>
            	<?php the_post_thumbnail(); ?>
            <?php } // end if ?>            
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<i class="fa fa-comment"></i> <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'wpforge' ) . '</span>', __( '1 Reply', 'wpforge' ), __( '% Replies', 'wpforge' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'wpforge' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpforge' ), 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php wpforge_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'wpforge' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpforge_author_bio_avatar_size', 72 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'wpforge' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&raquo;</span>', 'wpforge' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
