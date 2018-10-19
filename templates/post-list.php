<?php
/**
 * Shotcode output (Front-end)
 *
*/
?>
<?php do_action( 'pcm_before_item' ); ?>
<div class="pcm-item">
    <?php do_action( 'pcm_before_link' ); ?>
    <a href="<?php echo get_post_permalink() ?>"><?php the_title(); ?></a>
    <?php do_action( 'pcm_after_link' ); ?>
</div>
<?php do_action( 'pcm_after_item' ); ?>