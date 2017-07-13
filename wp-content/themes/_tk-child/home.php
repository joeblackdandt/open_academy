<!DOCTYPE html>
<html>
    <head>
        <title>Team Trump!</title>
        
        <?php wp_head(); ?>
    </head>
    <body>
        
<?php    
    wp_nav_menu( array(
        'menu' => 'Default',
        'depth' => 2,
        'container' => false,
        'menu_class' => 'nav',
//Process nav menu using our custom nav walker
    'walker' => new wp_bootstrap_navwalker())
    );
 ?>

        <?php wp_footer(); ?>
    </body>
</html>