function showfield(name) //college other option textbox
{
	if(name=='Other')document.getElementById('div1').innerHTML='<div class="form-group"><label class="col-md-0 col-sm-0 col-xs-0 control-label"></label><div class="col-md-12 inputGroupContainer"> <br/><div class="input-group"><span class="input-group-addon"><i class="fa fa-institution"></i></span> <input  placeholder="Enter Your College Name Here" class="form-control"  name="otc" type="text"></div> </div></div>';

}

function change() // courses events
{
    var rd=document.getElementById("rd");
    document.getElementById("select").options.length=0;
     document.getElementById("dept").options.length=0;

        arr=["","CSE","IT","ECE","EEE","MECH","CIVIL","PE"];
        arr1 = ["","I","II","III","IV"];
        arr2=["","DCME","DECE","DEEE","DME","DCE"];
        arr3=["MS"]
    if(rd.checked) //Btech selected
    {
        //department
        var select = document.getElementById("dept");
        for(var i=0;i<arr.length;i++) 
        {
          var option = document.createElement("OPTION");
          txt= document.createTextNode(arr[i]);
          option.appendChild(txt);
          option.value = arr[i];
          //OPTION.setAttribute("value",arr[i]);
          select.insertBefore(option,select.lastChild);
        }

        // Years
        var select1 = document.getElementById("select");
        for(var i=0;i<arr1.length;i++)
        {
          var option1 = document.createElement("OPTION");
          txt= document.createTextNode(arr1[i]);
          option1.appendChild(txt);
          option1.value = arr1[i];
          //OPTION.setAttribute("value",arr[i]);
          select1.insertBefore(option1,select1.lastChild);
        }

        // Add technical events by clicking on Btech radio button
		var dept = document.getElementById("dept");
		//document.getElementById('d1').innerHTML=dept; 
		//if(dept.name=="CSE"){
		 //   document.getElementById('d1').innerHTML='<table id="techevents"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">Technical Events</h4> </td> </tr>   <tr>    <td><input type="checkbox" name="ev1" id="" value="Paper Presentation">Paper Presentation</td>     <td><input type="checkbox" name="ev2"  id="" value="Project Expo" >Project Expo<br/></td>     <td><input type="checkbox" name="ev3" id="" value="Quiz" >Quiz</td>  </tr>   <tr>     <td><input type="checkbox" name="ev4"  id="" value="CAD Contest" >CAD Contest(MEC,CE)</td>     <td><input type="checkbox" name="ev5" id="" value="Coding Contest">Coding Contest(CSE,IT,EEE,ECE)</td><td><input type="checkbox" name="ev6"  id="" value="Idea Bucket">Idea Bucket</td> <tr><td colspan="3"><input type="checkbox" name="ev7"  id="" value="Poster Presentation">Poster Presentation</td> </tr> </tr></table>';
			//}
		
    }
    else if(rd1.checked) //Diploma selected
    {
        // department
        var select = document.getElementById("select");
        for(var i=0;i<4;i++)
        {
          var option = document.createElement("OPTION"),
          txt= document.createTextNode(arr1[i]);
          option.appendChild(txt);
          option.value = arr1[i];
          //OPTION.setAttribute("value",arr[i]);
          select.insertBefore(option,select.lastChild);
        }

        //years
        var dept = document.getElementById("dept");
        for(var i=0;i<arr2.length;i++)
        {
          var option2 = document.createElement("OPTION");
          txt= document.createTextNode(arr2[i]);
          option2.appendChild(txt);
          option2.value = arr2[i];
          //OPTION.setAttribute("value",arr[i]);
          dept.insertBefore(option2,dept.lastChild);
        }
          
          // Add technical events by clicking on Diploma radio button	
		    document.getElementById('d1').innerHTML='<table id="techevents"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">Technical Events</h4> </td> </tr>   <tr>    <td><input type="checkbox" name="ev1" id="" value="Paper Presentation">Paper Presentation</td>     <td><input type="checkbox" name="ev2"  id="" value="Project Expo" >Project Expo<br/>(common to all Branches)</td>     <td><input type="checkbox" name="ev3" id="" value="Quiz" >Quiz</td>  </tr>   <tr>     <td><input type="checkbox" name="ev4"  id="" value="CAD Contest" >CAD Contest(MEC,CE)</td>     <td><input type="checkbox" name="ev5" id="" value="Coding Contest">Coding Contest(CSE,IT,EEE,ECE)</td><td><input type="checkbox" name="ev6"  id="" value="Idea Bucket">Idea Bucket</td> <tr><td colspan="3"><input type="checkbox" name="ev7"  id="" value="Poster Presentation">Poster Presentation</td> </tr>  </tr></table>';
    }
    else
    {
      // MBA selected
       var MS = document.getElementById("dept");
        for(var i=0;i<arr3.length;i++)
        {
          var option = document.createElement("OPTION");
          txt= document.createTextNode(arr3[i]);
          option.appendChild(txt);
          option.value = arr3[i];
          //OPTION.setAttribute("value",arr[i]);
          MS.insertBefore(option,MS.lastChild);
        }
        
      var select = document.getElementById("select");
       for(var i=0;i<3;i++)
        {
          var option = document.createElement("OPTION"),
          txt= document.createTextNode(arr1[i]);
          option.appendChild(txt);
          option.value = arr1[i];
          //OPTION.setAttribute("value",arr[i]);
          select.insertBefore(option,select.lastChild);
        }
        //years
       
		      
          //Add  MS events by clicking on MS radio button
		    document.getElementById('d1').innerHTML='<table id="MSevnts"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">MS Events </h4></td></tr> <tr>    <td><input type="checkbox" name="ev26" id="" value="Young Manager" >Young Manager</td>    <td><input type="checkbox" name="ev27"  value="B-Quiz" >B-Quiz</td>	  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>    <tr>       <td><input type="checkbox" name="ev28" id=""   value="B-Plan" >B-Plan</td>	    <td><input type="checkbox" name="ev29" id="" value="Stock Game" >Stock game</td>        <td><input type="checkbox" name="ev30"  id="" value="Ad-Selfie" >Ad-Selfie</td>    </tr></table>';
    }
  }
function dept_selection()
{
	var dept = document.getElementById("dept");
		
}