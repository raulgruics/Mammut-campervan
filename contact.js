 var firstName , lastName , email , message 

function submitData () {

//Logic to connect to PHP / backend

   var firstName = document.getElementById("firstname").value;
   var lastName = document.getElementById("lastname").value;
   var email = document.getElementById("email").value;
   var message = document.getElementById("message").value;

     let isValid = validate(firstName,lastName,email,message);

     if(isValid === true){
        // If the forma si "valid" we need to submit the data to PHP / backend 
        getRequest(); 

     }else{
         alert("Incorrect data , please enter again !")
     }
    }

function validate(firstName,lastName,email,message) {

   // var firstName = document.getElementById("firstname").value;
   // var lastName = document.getElementById("lastname").value;
    //var email = document.getElementById("email").value;
    //var message = document.getElementById("message").value;

    if(firstName && lastName && email && message) { 
    }
        if(firstName  === ""){
            alert(" Please enter First Name"); 
        }

       if(lastName === ""){
            alert(" Please enter Last Name") ;
        }

        if(email.length < 5 ){
             alert(" Please enter email again ");
        }

         if(message.length <= 10) {
              alert(" Please enter min 10 characters ");
        }
    else{
        return true;
    }

}


//header are not mandatory for the get request

function getRequest() { 

    const myHeaders = new Headers(); 
    myHeaders.append('Content-Type','application/json');

    const myRequest = new Request('http://localhost/index/APISwebsite/postapi.php', {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify ( { 
            FirstName: document.getElementById("firstname").value,
            LastName: document.getElementById("lastname").value,
            Email: document.getElementById("email").value,
            Message: document.getElementById("message").value,
        }),
        mode:'cors',
        cache:'default'
    });

    fetch(myRequest)

    .then(response=> response.json())
    .then(data => console.log(data))
    .catch(function(error) {
        console.log(error)
} );
}