<?php

//controller for creating new users/students//
use \WPAS\Controller\WPASController;


$controller = new WPASController([
    'mainscript' => '/script.js'
]);

$controller->routeAjax([ 
    'slug' => 'sign-up',
    'scope' => 'public',
    'action' => 'sign_up',
    'controller' => function (){
                      
                      // if(!email_exists( $email) ) {
                
                          // Generate the password and create the user
                          $username = sanitize_user($_POST['username'], true);
                          $password = strlen($_POST["password"]) > 4 ? $_POST["password"] : false;
                          $email = sanitize_email($_POST["email"]);
                          
                          $result = array(
                            'username' => $username,
                            'val_username' => strlen($username) > 3 ? true : false,
                            'password' => $password,
                            'val_password' => $password ? true : false,
                            'email' => $email,
                            'val_email' => $email ? true : false,
                            'val_email_exists' => !email_exists($email)
                          );
                          
                          if(strlen($username) > 3 && $password && $email && !email_exists($email) ) :
                            $user_id = wp_create_user( $username, $password, $email );
                          else :  
                            WPASController::ajaxError($result);
                          endif;
                        
                          if (is_numeric($user_id)){
                            // Set the nickname
                            wp_update_user(
                              array(
                                'ID'          =>    $user_id,
                                'nickname'    =>    $username
                              )
                            );
                          
                            // Set the role
                            $user = new WP_User( $user_id );
                            $user->set_role( 'student' );
                            
                            $result = array(
                                'user_id' => $user_id,
                                'redirect' => get_page_link(67)
                              );
                              
                            WPASController::ajaxSuccess($result);
                          }
                            
                         
                          WPASController::ajaxSuccess($user_id);
                          
                        // } // end if
                        // else {
                          // WPASController::ajaxError('Sorry man!!');
                        // }
                       
                    }
    ]);   
?>