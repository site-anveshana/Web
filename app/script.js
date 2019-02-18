sessionStorage.removeItem('anveshana_username');
function validate(){
    if (log.user.value == "") {
        alert("Please enter username");
    }
    else if (log.pwd.value == "") {
        alert("Please enter password");
    }        
}

function validatepwd(){
    form = document.forms['change_pwd']

    pwd = form['pwd']
    npwd = form['npwd']
    cpwd = form['cpwd']

    if(pwd.value == ''){
        alert('Please enter the password.')
        pwd.focus()
        return false
    }
    
    if(npwd.value == ''){
        alert('Please enter the new password.')
        npwd.focus()
        return false
    }
    
    if(cpwd.value == ''){
        alert('Please enter the confirmation password.')
        cpwd.focus()
        return false
    }

    if(cpwd.value != npwd.value){
        alert('check new and confirmation password.')
        npwd.focus()
        return false
    }

    if(cpwd.value == pwd.value){
        alert('check new and old password.')
        pwd.focus()
        return false
    }
}