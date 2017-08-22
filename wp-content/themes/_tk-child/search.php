<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package _tk
 */

get_header(); ?>

<section class = "container white-sheet">
	
	<header style="margin-bottom:30px;">
		<h2 class="page-title"><?php printf( __( 'Search Results for: %s', '_tk' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
	</header><!-- .page-header -->
		
	

	<div class="row">
		<?php
			// preparing a SQL query to the database, specifically to TERMS related tables
			global $wpdb;
			$query = "SELECT * FROM wp_term_taxonomy INNER JOIN wp_terms WHERE taxonomy =  'course' AND wp_term_taxonomy.term_id = wp_terms.term_id AND (name LIKE '%" . get_search_query() . "%' OR description LIKE '%" . get_search_query() . "%') ";
			$results = $wpdb->get_results( $query, ARRAY_A );
		
			
			// check the result of the query
			if (count($results)>0) {
				foreach ($results as $record){
					echo '<div class="col-xs-12"><div class="panel panel-primary"><div class="panel-body">';
					echo '<h3><a href="'. get_term_link(intval($record[term_id])) . '">' . $record[name] . '</a></h3>';
					
					if (is_user_logged_in()){
						$enrolled = get_user_meta( wp_get_current_user()->ID, '_enrolled', true );
            
			            if (in_array(intval($record[term_id]),$enrolled)){
				        	echo '<p><span class="label label-success">YOU ARE ENROLLED</span><p>';
			            }
			            else{
			            	echo '<p><span class="label label-danger">YOU ARE NOT ENROLLED</span><p>';
			            }
					}
					else{
			            	echo '<p><span class="label label-warning">TO VIEW THE COURSE, PLEASE LOG IN</span><p>';
		            }
					
					echo '<p>' . $record[description] . '</p>';
					echo '</div></div></div>';
				}
			}
			else {
				echo '<div class="col-xs-12 text-danger"><h3>Sorry bro, no results!</h3></div>'; 
			}
			
		?>
		
	</div>

</section>

<?php get_footer(); ?>