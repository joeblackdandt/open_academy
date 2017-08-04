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

<section class='container'>
    
    <?php 
        if ( is_user_logged_in() ) { ?>
            <a href="<?php echo get_page_link(26); ?>" class="btn btn-success" style="margin-top:20px;">BACK TO MY COURSES</a>
    <?php    }
    ?>

	
	<?php 
	$this_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	
	    if ( is_user_logged_in() ) {
            $enrolled = get_user_meta( wp_get_current_user()->ID, '_enrolled', true );
            
            if (!in_array($this_term->term_id,$enrolled)){
                 global $wp_query;
                  $wp_query->set_404();
                  status_header( 404 );
                  get_template_part( 404 ); exit();
            }
        }
        else{
            global $wp_query;
            $wp_query->set_404();
            status_header( 404 );
            get_template_part( 404 ); exit();
        }
	
	echo "<h1 class='text-primary'><strong>". $this_term->name ."</strong></h1>";
	echo "<p>". $this_term->description ."</p>";
	

        // The Query
        $args = array(
        	'post_type' => 'lesson',
        	'tax_query' => array(
        		array(
        			'taxonomy' => 'course',
        			'field'    => 'term_id',
			        'terms'    => array( $this_term->term_id)
        		),
        	),
        	
        );

        $the_query = new WP_Query( $args );
        
        // The Loop
        if ( $the_query->have_posts() ) {
            echo "<p class='text-muted'><strong>Select a Lesson to see its contents</strong></p>";
        	echo '<ul>';
        	while ( $the_query->have_posts() ) {
        		$the_query->the_post();
        		echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
        	}
        	echo '</ul>';
        	/* Restore original Post Data */
        	wp_reset_postdata();
        } else {
        	echo "<p class='text-muted'><strong>Ooops! sorry buddy, this course doesn't have Lessons yet! Please contact your teacher.</strong></p>";
        }
        

	?>
        

</section>        

<?php get_footer(); ?>