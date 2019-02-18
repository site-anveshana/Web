function validate(){

  if (document.form1.dept.value=="")
  {
      alert("select department");
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