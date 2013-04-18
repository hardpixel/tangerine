<?php

class Comment_Walker extends Walker_Comment {

	function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;

		if ( ! empty( $args['callback'] ) ) {
			call_user_func( $args['callback'], $comment, $args, $depth );
			return;
		}

		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		}
		else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>

		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>

		<hr>
		<div class="comment-author th left">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>

		<div class="comment-content">
			<div class="comment-meta commentmetadata">
				<?php printf( __( '<cite class="fn">%s</cite> <span>on:</span>' ), get_comment_author_link() ) ?>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ) ?>
				</a>
				<?php edit_comment_link( __( 'Edit' ), '&nbsp;&nbsp;', '' ); ?>
			</div>

			<?php comment_text() ?>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</div>
		</div>

		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif;
	}

	function end_el( &$output, $comment, $depth = 0, $args = array() ) {
		if ( ! empty( $args['end-callback'] ) ) {
			call_user_func( $args['end-callback'], $comment, $args, $depth );
			return;
		}
		if ( 'div' == $args['style'] )
			echo "</div>\n";
		else
			echo "</li>\n";
	}
}

?>
