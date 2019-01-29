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

	a:hover{
		text-decoration: underline;
		color: #e9e9e9;
		cursor: pointer;
		font-size: 1.1em;
	}


</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#redirect').click(function(){
		 window.location="/"
		})

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
                           $('#response').css('color','#fff');
							$('#response').css('backgroundColor','#ff0000');
							$('#response').css('marginTop','10px');
							$('#response').css('width','80%');
							$('#response').css('fontWeight','bold');          
                        },
                    error:function(object,status,e){
                        alert(e)
                    }
                })

			}else{

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
	
<div style="margin-top: 5%;width: 50%">
		
<h1>Activation Message</h1>
<span style="font-size: 1.1em;font-weight: bold;font-family: candara">Dear Customer,<br/> This Link has already been used to acctivate your account..Kindly click on the button below to login</span><br/>

<button style="width: 100px;height: 50px;font-size: 1.1em" id="redirect">Login</button>

	</div>

</div>
	
	
</div>

<footer style="color:#fff;position: absolute;bottom: 0px;width: 100%;background-color: #000;opacity: 0.6;font-family: candara" align="center">


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