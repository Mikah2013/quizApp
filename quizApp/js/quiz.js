//window.console.log("Hello from Javascript");

function displaySuccessMessage ( event ) {
    var buttonOk = document.querySelector("input[name=new-author]");
    var success = document.querySelector("form #signup-form-message");

    if ( buttonOk ) {        
        setTimeout(function() {
            success.innerHTML ="* You have successfully created an account";
        }, 50000);
    }
}

function init(){
    var editorForm = document.querySelector("form#signup-editor");
    editorForm.addEventListener("submit", displaySuccessMessage, false);    
}

document.addEventListener("DOMContentLoaded", init, false);