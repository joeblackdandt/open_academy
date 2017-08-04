
<!---This is the signup page for students--->

<?php get_header(); ?>


<section class = "container">
    
  <div>
    <h1 class="text-center">Open Academy</h1>
    <h4 class="text-center" style="margin-bottom:40px;">Sign up below to get instant access to all the lessons.</h4>
  </div>     
    
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
      <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Sign-Up</h3>
      </div>
      <div class="panel-body">
        
        <!--if something goes wrong just put it here-->
        <div class="alert alert-danger sign-up-alert hidden" role="alert"></div>
        
        
        <div class="row">
          
          <div class="col-sm-6 col-xs-12 text-center ">
            <form  class="" action='' method="POST"  id="signup">
              <fieldset>
               
                <div class="form-group">
                  <!-- Username -->
                  <label class="control-label"  for="username">Username</label>
                  <div class="controls">
                    <input type="text" id="username" name="name" placeholder="" class="form-control" id="username">
                    <!--<p class="help-block">Create a username</p>-->
                  </div>
                </div>
         
                <div class="form-group">
                  <!-- E-mail -->
                  <label class="control-label" for="email">E-mail</label>
                  <div class="controls">
                    <input  id="email" type="text" placeholder="" class="form-control">
                    <!--<p class="help-block">Enter your E-mail</p>-->
                  </div>
                </div>
         
                <div class="form-group">
                  <!-- Password-->
                  <label class="control-label" for="password" >Password</label>
                  <div class="controls">
                    <input id="password" type="password"  placeholder="" class="form-control">
                    <!--<p class="help-block">Create a password</p>-->
                  </div>
                </div>
             
                <div class="form-group">
                  <!-- Password -->
                  <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                  <div class="controls">
                    <input type="password" id="password_confirm" placeholder="" class="form-control">
                    <!--<p class="help-block">Confirm your password</p>-->
                  </div>
                </div>
         
                <div class="form-group">
                  <!-- Button -->
                  <div class="controls">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          
          
          <div class = "col-sm-6 col-xs-12 text-right">
            <img src="/wp-content/themes/_tk-child/pexels-photo-141676.jpeg" class="img-circle" alt="Cinque Terre" width="304" height="236"></img>
          </div>
          
        </div>
        
      </div>
    </div>
    </div>
  </div>
    
</section>
      
    
<?php get_footer(); ?>
