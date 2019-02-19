function validate(){
  var form1 = document.forms["form1"]

  var htno = form1["htno"]
  if(htno.value.length!=10 || htno.value.match(/[0-9]{2}[A-z0-9]{2}[A-z0-9]+/)[0] !== htno.value){
      htno.focus();
      alert('Invalid Reg.No')
      return false;
  }

  var name = form1["fname"]
  if(name.value.match(/[A-z\s]+/)[0] !== name.value){
    name.focus();
    alert('Invalid First Name')
    return false;
  }
  var name = form1["lname"]
  if(name.value.match(/[A-z\s]+/)[0] !== name.value){
    name.focus();
    alert('Invalid Last Name')
    return false;
  }

  if (document.form1.dept.value=="")
  {
      alert("Please Select Department");
      return false;
  }

  if(document.form1.year.value == ''){
    alert("Please Select Year")
    return false
  }

  if(document.form1.college.value == ''){
    alert('Please Select College')
    return false
  }

  var email = form1["email"]

  if(email.value == "" || email.value.match(/[A-z0-9]+@[A-z]\.[A-z]/)[0] !== email.value){
    alert("Invalid Email address");
    return false;
  }

  if (document.form1.mobile.value.length !=10 )
  {
      alert("enter valid mobile number");
      return false;
  }
  if(document.form1.ev.value=="" && document.form1.ev1.value=="" && document.form1.ev2.value=="")
  {
    alert("please select any one event")
    return false;
  }
}