<?php
/**
 * @package _tk
 */
?>

			<?php  
                $term_list = wp_get_post_terms(get_the_ID(), 'course', array("fields" => "all"));
            ?>

			<a href="<?php echo get_term_link($term_list[0]->term_id); ?>" class="btn btn-primary" style="margin:20px 0;">BACK TO COURSE</a>

            <div class="white-sheet" style="padding:15px;">
    			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<header>
                		<h1 class="page-title"><strong><?php the_title(); ?></strong></h1>
                		
                        <p>
                        <?php  
                            foreach ($term_list as $course){
                                echo '<span class="label label-primary">' . strtoupper($course->name) . '</span>';
                            }
                        ?>
                        </p>
                        
                		<div class="entry-meta">
                			<?php _tk_posted_on(); ?>
                		</div><!-- .entry-meta -->
                		<hr/>
                	</header><!-- .entry-header -->
                
                	<div class="entry-content">
                		<div class="entry-content-thumbnail">
                			<?php the_post_thumbnail(); ?>
                		</div>
                		<?php the_content(); ?>
                		<?php
                			wp_link_pages( array(
                				'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
                				'after'  => '</div>',
                			) );
                		?>
                	</div><!-- .entry-content -->
                
                </article><!-- #post-## -->
            </div>