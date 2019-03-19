<!DOCTYPE html>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{!!asset('images/logo.jpg')}!!"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<title>StarDom|Community</title>
</head>
<style type="text/css">
	


</style>
<script type="text/javascript">
	function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
	$(document).ready(function(){



		$("#login").click(function(){
			var emailaddress = document.getElementById('emailaddress').value;
			var password = document.getElementById('password').value;
			document.getElementById('response').innerHTML="Please Wait..."
			if(emailaddress!="" && password!=""){
				$.ajax({
                    url:'/checklogin',
                    type:'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                  
                    data:{
                    	emailaddress:emailaddress,
                    	password:password
                    },   
                    
                    success:function(data){
                           document.getElementById('response').innerHTML=data
                           
                           	$('#response').css('color','#ffffff');
							$('#response').css('backgroundColor','#003300');
							$('#response').css('marginTop','10px');
							$('#response').css('width','80%');
							$('#response').css('fontWeight','bold');
                           
                           
                           if(data == "OTP sent"){
                           	location='/OneTimePassword/verify/'+ document.getElementById('emailaddress').value+'/39e871871bcacae98a50eec3699ac173/stardom_dashboard'
                           }
                                     
                        },
                    error:function(object,status,e){
                        document.getElementById('response').innerHTML = e +'pls try again..'
                    }
                })

			}else{
				document.getElementById('response').innerHTML="Empty EmailAddress/Password";
			}
		})
	})


</script>
<body style="background-color: #e9e9e9">
<div style="width: 100%;height: 100%"   >
	<div id="banner">
    <div  style="float: left;" id="menuicon">
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
   							 <i class="fa fa-bars">
   							 	 <img src="{{asset('images/menu.png')}}" width="50px" height="50px" />

   							 </i>
   							
  						</a>
  					<div class="topnav">
	
 
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="#androidversion">Download Mobile Version</a>
    <a href="#stardom_dashboard">StarDom</a>
    <a href="#support">Support(24/7) Service</a>
    <a href="#ticket">Ticket</a>
    
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  
  
</div>
</div>
		<table>
			<tr>
				<td>

					

				</td>
				<td ><div style="width: 100%;" align="left"><img src="{{asset('images/logo.png')}}" width="50px"  /></div></td>
				<td ><div style="font-family: candara;font-size: 1.5em;line-height:60px;color:#fff;font-weight: bold;" align="left"><a href="/" style="text-decoration: none;">StarDom</a></div></td>
			</tr>
		</table>
		<div style="width: 100%;" align="right" id="navbar">
			<span class="klass"><a>Download MobileVersion</a></span>
			<span class="klass"><a>StarDom</a></span>
			<span class="klass"><a>Support(24/7) Service</a></span>
			<span class="klass"><a>Tickets</a></span>
			
		</div>
		

	</div>
<div style="width:100%" align="center">
	
<div   id="loginDiv">
	
	<fieldset>
		<legend style="font-family: candara;font-weight: bold">LoginDetails</legend>
		<input type="text" id="emailaddress" style="width:50%; height: 30px;margin: 5px" placeholder="EmailAddress"><br/>
		<input type="password" id="password"  style="width:50%; height: 30px;margin: 5px" placeholder="Password"><br/>
		<div>
		<span style="cursor:pointer;font-family: candara;font-weight: bold;text-decoration: underline;">Forgot Password</span><br/>
		<span style="cursor:pointer;font-family: candara;font-weight: bold;color:#003300 ">
			<a href="/member/register" style="color:#003300;text-decoration:none">Join the Stardom!</a></span>
	</div>
		<button style="width: 50%; height: 30px;margin: 5px;" id="login">Login</button>


	</fieldset>		
<div id="response"></div>

	</div>

</div>
	
	
</div>
<footer style="color:#fff;bottom: 0px;width: 100%;margin-top: 100%; height:100%;background-color: #000;opacity: 0.6;font-family: candara" >


<table style="width: 100%"  class="footerId">
	<tr>
		<td><h1>StarDom Community</h1></td>
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

<div align="center" id="footerIdmobile">
<table style="width: 100%">
	<tr>
		<h1>StarDom Community</h1></tr>
		<tr><div>
                <h3 >AboutUs</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div></tr>
		<tr>
			<div>
                <h3 >Support</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div>

		</tr>
		<tr>
			<div>
                <h3 >Afflilates</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div>

		</tr>
<tr>
			<div>
                <h3 >Co-operate</h3>
                <ul style="color: #fff" >
                  <li><u>Social Media Channel</u></li>
                  <li><u>Affliates</u></li>
                  <li><u>Group</u></li>
                  <li><u>Support</u></li>
                </ul>
              </div>

		</tr>
	

</table>
</div>

 © 2019 Copyright 





</footer>
</body>
</html>