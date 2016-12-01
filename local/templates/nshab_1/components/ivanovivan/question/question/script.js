
function validen(prefix, name){        
    var valid = true;    
  
    var seller = document.getElementsByClassName('req');     
        for ( var i = 0; i < seller.length; i++ ) {
            if ((prefix=='all')||(name == seller[i].name)){
                seller[i].className = seller[i].className.replace( /(?:^|\s)error(?!\S)/,'');
            }
        }
    
    for ( var i = 0; i < seller.length; i++ ) {
        
        if (seller[i].value.length<=0){
            valid = false;
            if ((prefix=='all')||(name == seller[i].name)){
                seller[i].className += " error";
            }
        }else{
            if (seller[i].name == 'EMAIL'){
                    reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]{2,})+$/i;
                    if (reg.test(seller[i].value)) {
                                                
                    }else{
                        if ((prefix=='all')||(name == seller[i].name)){                        
                            seller[i].className += " error";
                        }
                        valid = false;
                    }                    
            }           
        }            
            //console.log(seller[i]);
    }
    
    var el = document.getElementById('check2');
    if (el){
        if ((prefix=='all')||(prefix=='check')){
            
            el.className = el.className.replace( /(?:^|\s)error(?!\S)/,'');    
            if (!el.className.match(/\yes\b/)){
                valid = false;
                el.className += " error";
            }else{
                el.className = el.className.replace( /(?:^|\s)error(?!\S)/,'');
            }    
            document.getElementById('check_button').className = document.getElementById('check_button').className.replace( /(?:^|\s)yes(?!\S)/,'');
        
        }
    }    
    
    if (valid==true){
        document.getElementById('check_button').className +=' yes';
    }else{
        document.getElementById('check_button').className = document.getElementById('check_button').className.replace( /(?:^|\s)yes(?!\S)/,'');
    }
        
    return valid;
}


function submit_qa(){    
    var valid = validen('all');         
     if (valid){
        document.getElementById(formid).setAttribute('action', action+'?norobots=Y#'+formid);
        document.getElementById(formid).submit();
     }
}



function check_irobot(){
    
    var el = document.getElementById('check2');
    if (el.className.match(/\yes\b/)){
        document.getElementById('check_text').innerHTML = no;
        document.getElementById(formid).setAttribute('action', action);
        el.className = el.className.replace( /(?:^|\s)yes(?!\S)/,'');
        //el.className = "check";
        validen('check');                         
    }else{
        document.getElementById('check_text').innerHTML = yes;
        el.className += " yes";
        document.getElementById(formid).setAttribute('action', action+'?norobots=Y');
        validen('check');
    }
    
        
}

  



