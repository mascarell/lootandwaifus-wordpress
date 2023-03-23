<?php
/**
 * The template for displaying the comemnts.
 *
 * The section of the post or page that includes the comments and the form.
 *
 * @package WordPress
 * @subpackage Projects_Engine
 * @since Projects Engine 1.0
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
			<h2 class="comments-title">
					<?php
						printf( _nx( 'One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title', 'projectsengine' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
					?>
			</h2>

			<ol class="comment-list">
					<?php
							wp_list_comments( array(
									'style'       => 'ol',
									'short_ping'  => true,
									'avatar_size' => 50,
							) );
					?>
			</ol><!-- .comment-list -->

			<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav class="navigation comment-navigation" role="navigation">
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'projectsengine' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'projectsengine' ) ); ?></div>
			</nav><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>

			<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'projectsengine' ); ?></p>
			<?php endif; ?>
	<?php else: ?>
		<h2 class="comments-title">No comments yet</h2>
	<?php endif; // have_comments() ?>
	<?php comment_form(); ?>
</div><!-- #comments -->