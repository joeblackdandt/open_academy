<?php
/**
 * The sidebar containing the main widget area
 *
 * @package _tk
 */
?>

	<div class="sidebar col-md-4 col-xs-12">

		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		<div class="sidebar-padder">

			
			

				<aside id="my_courses" class="widget widget_archive">
					<h3 class="widget-title"><?php _e( 'My Courses', '_tk' ); ?></h3>
					<ul>
						<?php
						$selected_students = get_post_meta( 52, '_enrolled', true );
				        
				        foreach ($selected_students as $student)
				        	echo "<li>$student</li>"
						?>
					</ul>
				</aside>

		

		</div><!-- close .sidebar-padder -->
	</div>
