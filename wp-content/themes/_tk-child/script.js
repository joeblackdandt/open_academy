window.onload = function (){
 //alert('hhh');
 document. getElementById("signup").addEventListener("submit", sendform)  
};
function sendform (event){
    event.preventDefault();
    document.querySelector(".sign-up-alert").classList.add('hidden');
    
    var args = {
       action : 'sign_up',
       password: document.querySelector('#password').value,
       passwordconfirm: document.querySelector('#password_confirm').value,
       username: document.querySelector('#username').value,
       email: document.querySelector('#email').value
        
    };
    
    // check if both passwords are the same
    if (args.password === args.passwordconfirm && args.password.length > 4){
        
        ajax.post(WPAS_APP.ajax_url, args,function(data){
        
        console.log(data);
        
        if ( (data.code == 200) && (typeof data.data === 'object') && ('errors' in data.data) ){
            
            var errors_html = '';
            
            if ('errors' in data.data){
                
                for (var error in data.data.errors){
                    data.data.errors[error].forEach(function (item){
                        errors_html += '<p>' + item + '</p>';
                    })
                }
                
            }
            
            document.querySelector(".sign-up-alert").innerHTML = '<strong>There was an issue in the process!</strong>' + errors_html;
            document.querySelector(".sign-up-alert").classList.remove('hidden');
        }
        else if (data.code == 500) {
            document.querySelector(".sign-up-alert").innerHTML = '<p><strong>There was an issue in the process!</strong></p><p>' + data.msg + '</p>';
            document.querySelector(".sign-up-alert").classList.remove('hidden');
        }
        else if (data.code == 200 && 'user_id' in data.data) {
            window.location.replace(data.data.redirect);
        }
        
        
        
        });
    }
    else{
        document.querySelector(".sign-up-alert").innerHTML = '<p><strong>There was an issue in the process!</strong></p><p>Passwords do not match</p>';
        document.querySelector(".sign-up-alert").classList.remove('hidden');
    }
    
    
    
  
   };
 


    
   

 