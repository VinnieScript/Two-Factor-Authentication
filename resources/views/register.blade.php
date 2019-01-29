<!DOCTYPE html>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{!!asset('images/logo.jpg')}!!"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<title>StarDom|Community</title>
</head>
<style type="text/css">
	.klass{
		margin-left: 10px;
		padding: 5px;
		font-family: candara;
		font-weight: bold;
	}	

	a:visited {
		color: #fff;
	}
	a{
		text-decoration: none;
		color:#000;
	}

	a:hover{
		text-decoration: underline;
		color: #e9e9e9;
		cursor: pointer;
		font-size: 1.1em;
	}


</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#register').click(function(){
			
			var lname = document.getElementById('lname').value;
			var fname = document.getElementById('fname').value;
			
			var sex = document.getElementById('sex').value;
			var  address = $("#address").val();
			var phonenumber = document.getElementById('phonenumber').value;
			var emailaddress = document.getElementById('email').value;
			var password = document.getElementById('password').value;
			
if(lname!= ""){
	
	$("#lname").css('border','solid 1px #003300')
}
else{
	
	$("#lname").css('border','solid 1px #ff0000')
}
if(fname!= ""){
	
	$("#fname").css('border','solid 1px #003300')
}
else{
	
	$("#fname").css('border','solid 1px #ff0000')
}
if(sex!= "" && sex !="Select Sex.."){
	
	$("#sex").css('border','solid 1px #003300')
}
else{
	
	$("#sex").css('border','solid 1px #ff0000')
}
if(address!= ""){
	
	$("#address").css('border','solid 1px #003300')
}
else{
	
	
	$("#address").css('border','solid 1px #ff0000')
}
if(phonenumber!= ""){
	
	$("#phonenumber").css('border','solid 1px #003300')
}
else{
	
	$("#phonenumber").css('border','solid 1px #ff0000')
}
if(emailaddress!= ""){
	
	$("#emailaddress").css('border','solid 1px #003300')
}
else{
	
	$("#emailaddress").css('border','solid 1px #ff0000')
}

if(password!= ""){
	
	$("#password").css('border','solid 1px #003300')
}
else{
	
	$("#password").css('border','solid 1px #ff0000')
}

if(lname !="" && fname!=""&& sex!=""&& address!=""&& phonenumber!=""&& emailaddress!=""&& password!="" ){
	document.getElementById('response').innerHTML="Please Wait...."
	$.ajax({
                    url:'/register',
                    type:'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                  
                    data:{
                    	lname:lname,
                    	fname:fname,
                    	sex:sex,
                    	address:address,
                    	emailaddress:emailaddress,
                    	phonenumber:phonenumber,
                    	password:password
                    },   
                    
                    success:function(data){
                           document.getElementById('response').innerHTML=data
                           if(data === "EmailAddress Already Exist "){
                           	$('#response').css('color','#fff');
							$('#response').css('backgroundColor','#ff0000');
							$('#response').css('marginTop','10px');
							$('#response').css('width','80%');
							$('#response').css('fontWeight','bold');
                           }
                           else{
                           	$('#response').css('color','#fff');
							$('#response').css('backgroundColor','#003300');
							$('#response').css('marginTop','10px');
							$('#response').css('width','80%');
							$('#response').css('fontWeight','bold');
                           }
                                     
                        },
                    error:function(object,status,e){
                        //alert(e)

                        document.getElementById('response').innerHTML="Sorry We have problems reaching your Mail Host...pls try again"


                    }
                })
}



		})

	})


</script>
<body style="background-color: #e9e9e9">
<div style="width: 100%;height: 100%">
	<div style="width: 100%;height: 100px;background-color: #2E8B57">
		<table>
			<tr>
				<td ><div style="width: 100%;" align="left"><img src="{{asset('images/logo.png')}}" width="50px"  /></div></td>
				<td ><div style="font-family: candara;font-size: 1.5em;line-height:60px;color:#fff;font-weight: bold;" align="left"><a href="/" style="text-decoration: none;">StarDom</a></div></td>
			</tr>
		</table>
		<div style="width: 100%;" align="right">
			<span class="klass"><a>Download MobileVersion</a></span>
			<span class="klass"><a>StarDom</a></span>
			<span class="klass"><a>Support(24/7) Service</a></span>
			<span class="klass"><a>Tickets</a></span>
			
		</div>
		

	</div>
<div style="width:100%" align="center">
	
<div style="margin-top: 5%;width: 50%;margin-bottom: 20px;">
	
		<h2><u>Registration Details</u></h2>
		<input type="text" id="lname" style="width:50%; height: 30px;margin: 5px" placeholder="Lastname"><br/>
		<input type="text" id="fname"  style="width:50%; height: 30px;margin: 5px" placeholder="Firstname"><br/>
		<select style="width: 50%;height: 30px" id="sex">
			<option>Select Sex..</option>
			<option>Male</option>
			<option>Female</option>

		</select><br/><br/>
		<textarea style="width: 50%; height: 30px"  id="address">
			
		</textarea><br/>
		<input type="text" id="phonenumber"  style="width:50%; height: 30px;margin: 5px" placeholder="Phonenumber"><br/>
		<input type="email" id="email"  style="width:50%; height: 30px;margin: 5px" placeholder="EmailAddress"><br/>
		<input type="password" id="password"  style="width:50%; height: 30px;margin: 5px" placeholder="Password"><br/>
		
		
		<button style="width: 50%; height: 30px;margin: 5px;font-family:candara;font-weight: bold" id="register" >Register</button>


		
<div id="response"></div>

	</div>

</div>
	
	
</div>

<footer style="color:#fff;bottom: 0px;width: 100%;background-color: #000;opacity: 0.6;font-family: candara" align="center">


<table style="width: 100%">
	<tr>
		<td><h1>StarDom Community</h1><br/><br/></td>
		<td><div>
                <h3 >AboutUs</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div></td>
		<td>
			<div>
                <h3 >Support</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div>

		</td>
		<td>
			<div>
                <h3 >Afflilates</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div>

		</td>
<td>
			<div>
                <h3 >Co-operate</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div>

		</td>
	</tr>

</table>



 © 2019 Copyright 





</footer>
</body>
</html>