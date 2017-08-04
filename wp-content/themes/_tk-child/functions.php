<?php

    /**
     * Autoload for PHP Composer
     */
   // require "vendor/autoload.php";

    /**
     * Here we are importing the Styles of the parent theme and re-using them
     * for our own project, please don't edit this hook/function
     */
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
    }
    
    require('functions2.php');

    /**
     * This is an example of usage for the Eloquent ORM

        $db = \WeDevs\ORM\Eloquent\Database::instance();
        
        var_dump( $db->table('users')->find(1) );
        var_dump( $db->select('SELECT * FROM wp_users WHERE id = ?', [1]) );
        var_dump( $db->table('users')->where('user_login', 'john')->first() );
    */
    
    /** 
     * Start your own functions here
     */
     
     
     /** 
                *********************************************
                *                                           *
                *                                           *
                *   HERE THE DISASTER BEGINS                *
                *                                           *
                *                                           *
                *********************************************
     */
     
 
    /*  Creating the Post Type LESSON */
    add_action( 'init', 'my_custom_post_lesson' );
    
    function my_custom_post_lesson() {
        
        $labels = array(
            'name'               => _x( 'Lessons', 'post type general name' ),
            'singular_name'      => _x( 'Lesson', 'post type singular name' ),
            'add_new'            => _x( 'Add New', 'Lesson' ),
            'add_new_item'       => __( 'Add New Lesson' ),
            'edit_item'          => __( 'Edit Lesson' ),
            'new_item'           => __( 'New Lesson' ),
            'all_items'          => __( 'All Lessons' ),
            'view_item'          => __( 'View Lesson' ),
            'search_items'       => __( 'Search Lessons' ),
            'not_found'          => __( 'No Lessons found' ),
            'not_found_in_trash' => __( 'No Lessons found in the Trash' ),
            'parent_item_colon'  => 'Course: ',
            'menu_name'          => 'Lessons'
          );
        
        $args = array(
            'labels'        => $labels,
            'description'   => 'Displays lessons and their ratings',
            'public'        => true,
            'menu_position' => 1,
            // 'hierarchical' => true,
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
            'has_archive'   => true,
            'menu_icon'   => 'dashicons-media-document',
            'taxonomies' => array()
            
          );
  
        register_post_type( 'lesson', $args );
    }
     
     
    // creating the extended fields so Admin can enroll students in Courses (taxonomy Course)
    add_action( 'show_user_profile', 'enrolled_field' );
    add_action( 'edit_user_profile', 'enrolled_field' );
    add_action( 'profile_update', 'save_enrolled_field' );
    
    function enrolled_field() {
        // If is current user's profile (profile.php)
        if ( defined('IS_PROFILE_PAGE') && IS_PROFILE_PAGE ) {
            $user_id = get_current_user_id();
        // If is another user's profile page
        } elseif (! empty($_GET['user_id']) && is_numeric($_GET['user_id']) ) {
            $user_id = $_GET['user_id'];
        // Otherwise something is wrong.
        } else {
            die( 'No user id defined.' );
        }

        $selected_courses = get_user_meta( $user_id, '_enrolled', true );
        $all_courses = get_terms( array(
            'taxonomy' => 'course',
            'order' => 'DESC',
            'hide_empty' => false
        ) );
        
        ?>
        
        <!--View elements of the additional fields-->
        <h3>Extra profile information</h3>

    	<table class="form-table courses-table">
    		<tr>
    			<th><label>Enrolled in Courses <br/>User ID: <?php echo $user_id ?></label></th>
    			<td>
    			    <button type="button" id="clear_all_courses" class="button button-primary" onclick="
    			    <?php echo "document.querySelectorAll('table.courses-table .checkbox input').forEach(function(item){item.checked = false});" ?>">
    			        Remove from all Courses
    			    </button> 
    			    
    				<ul>
                        <?php foreach ( $all_courses as $course ) : ?>
                            <li><div class="checkbox"><label><input type="checkbox" name="enrolled[]" value="<?php echo $course->term_id ?>" <?php echo in_array($course->term_id , $selected_courses) ? ' checked' : ''; ?> ><?php echo $course->term_id . ' - ' .  ucwords($course->name) ; ?></label></div></li>
                        <?php endforeach; ?>
                    </ul>
    			</td>
    		</tr>
    	</table>
        
     <?php   
    }
    
    function save_enrolled_field( $user_id ) {
    
        if (!is_null($_POST['enrolled'])){
            update_user_meta( $user_id, '_enrolled', $_POST['enrolled'] );
        }
        else{
            update_user_meta( $user_id, '_enrolled', array() );
        }
    
    }



    // Creating COURSE taxonomy
    add_action( 'init', 'create_course_taxonomies', 0 );
    
    function create_course_taxonomies() {
    	// Add new taxonomy, make it hierarchical (like categories)
    	$labels = array(
    		'name'              => 'Courses',
    		'singular_name'     => 'Course',
    		'search_items'      => 'Search Courses',
    		'all_items'         => 'All Courses',
    		'parent_item'       => 'Parent Course',
    		'parent_item_colon' => 'Parent Course:',
    		'edit_item'         => 'Edit Course',
    		'update_item'       => 'Update Course',
    		'add_new_item'      => 'Add New Course',
    		'new_item_name'     => 'New Course Name',
    		'menu_name'         => 'Courses',
    	);
    
    	$args = array(
    		'hierarchical'      => true,
    		'labels'            => $labels,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
    		'rewrite'           => array( 'slug' => 'course' ),
    	);
    
    	register_taxonomy( 'course', array( 'lesson' ), $args );
    }


    
    // redirect user to homepage after logging out
    add_action('wp_logout','auto_redirect_after_logout');
    function auto_redirect_after_logout(){
      wp_redirect( home_url() );
      exit();
    }
    
    
    //hide the admin bar in the front end
    add_filter('show_admin_bar', '__return_false');