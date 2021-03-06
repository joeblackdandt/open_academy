<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */

get_header(); ?>

    <?php 
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
    }
    ?>

    <?php if ( is_user_logged_in() ) { ?>
    <div class="container-fluid text-center user-banner">
        <h4>
            <?php echo "Howdy <strong>" . esc_html( $current_user->user_nicename ) . '</strong>' ?>
        </h4>
    </div>
    <?php } ?>


	<div class="jumbotron text-center main-banner <?php echo is_user_logged_in() ? "user-bg" : "home-bg"; ?>">
          
          <?php 
          
            if ( is_user_logged_in() ) {
                // echo '<p><a class="btn btn-success btn-lg" href="'  . get_page_link(26) . '" role="button">MY COURSES</a></p>';
            } else {
                ?>
                
                <h1 style="padding: 50px 0;color:white;text-shadow: 0px 0px 40px black;">Welcome to <br><?php bloginfo( 'name' ); ?>!</h1>
                
                <?php
            }
          
          ?>
    </div>



	<section class="container white-sheet">
            
            
            <div class="row">
                
                <?php $args = array(
                	'sort_order' => 'asc',
                	'sort_column' => 'post_title',
                	'hierarchical' => 1,
                	'exclude' => '',
                	'include' => '',
                	'meta_key' => '',
                	'meta_value' => '',
                	'authors' => '',
                	'child_of' => 0,
                	'parent' => -1,
                	'exclude_tree' => '',
                	'number' => '3',
                	'offset' => 0,
                	'post_type' => 'page',
                	'post_status' => 'publish'
                ); 
                
                $pages = get_pages($args); 
                
                // print_r($pages);
                
                $icons = array('fa-leaf','fa-flask','fa-book','fa-plane','fa-institution','fa-gamepad','fa-globe','fa-flag-checkered');
                
                foreach ($pages as $page) {
                    echo "<div class='col-sm-4 col-xs-12 text-center'>";
                    
                    $rand = rand(0,7);
                    echo '<h1><i class="fa fa-3x text-success ' . $icons[$rand] . '"></i></h1>';
                    echo "<h3><a href='" . $page->guid . "'>" . $page->post_title . "</a></h3>";
                    
                    echo "</div>";
                    
                }
                ?>
            
               </div>
                
            </div>
            
        </section>
        
        

<?php get_footer(); ?>