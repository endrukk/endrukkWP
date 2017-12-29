<?php
/**
 * The template for displaying the footer.
 *
 * @package musicmacho
 */ ?>

<?php if(!is_page_template( 'template-parts/front.php' )) { ?>
    </div>
<?php }
wp_footer();
wp_nav_menu( array(
    'menu' => 'footer',
    'container'      => 'div'
) );
?>
<div class="powered-by">
    <p>powered by endrukk.com<span>TM</span></p>
</div>
</body>
</html>