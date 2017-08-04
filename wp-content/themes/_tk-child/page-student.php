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



<section class = "container">
    
    
    <?php
    
    if ( is_user_logged_in() ) {
    
        $enrolled = get_user_meta( wp_get_current_user()->ID, '_enrolled', true );
        
        // var_dump($enrolled->length);die();
        
        if (count($enrolled) > 0) { ?>
            
            <h1 style='margin-bottom:20px;' class=""><strong>My Courses</strong></h1>
        
            <div class="row">
            
            <?php
            foreach ($enrolled as $course){
                $term = get_term(intval($course));
                echo "<div class='col-sm-4 col-xs-12'>
                        <div class='panel panel-primary'>
                            <div class='panel-heading'>" . $term->name . "</div>
                            <div class='panel-body'>
                                <p>" . $term->description . "
                                <p><a class='btn btn-primary' href='" . get_term_link($term) . "'>DETAILS</a></p>
                            </div>
                        </div>
                    </div>";
            } ?>
            
            </div>
            
            <?php
        }
        else
        {
            echo "<h2 class='text-center'>Sorry buddy, you have no courses!</h2><p>Are you really a student, or should I call 911?</p>";
        }
    }
    else{
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        get_template_part( 404 ); exit();
    }
    ?>
    
    
</section>






<?php get_footer(); ?>