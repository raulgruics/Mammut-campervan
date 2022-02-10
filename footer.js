var email 

function submitDataFooter () { 
    var email = document.getElementById("email-input").value;

    let isValid = validate();
    
    if(isValid === true){
 // PHP // 
    }
    else { 
        alert("Please Enter Again")
    }
}

function validate() { 

    var email= document.getElementById("email-input").value; 

    if (email.length < 5 ){
        alert ( "invalid email ");
    }
    else {
        return true; 
    }
}