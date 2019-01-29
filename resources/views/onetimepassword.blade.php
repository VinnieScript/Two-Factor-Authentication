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
		background-color: #003300;
		cursor: pointer;
		font-size: 1.1em;
	}


</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#resendOTP').hide();
		 $counter = document.getElementById('ResendTimer').innerHTML;
		 
var x = setInterval(function(){

	$counter = $counter -1;
	document.getElementById('ResendTimer').innerHTML=$counter;
	if($counter == "55"){
		remove();
		document.getElementById('ResendTimer').innerHTML="";
		document.getElementById('divOtp').innerHTML="";
		$('#resendOTP').show();
		//$("#ResendTimer").append('<button id="reOTP">ResendOTP</button>')
	}
},1000);

function remove(){

	clearInterval(x);
}

$("#resendOTP").click(function(){
	
	var emailID = document.getElementById('emailID').value;
document.getElementById('response').innerHTML="Please Wait..";
	$.ajax({
		url:'/resendOTP',
		type:'post',
		 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		 data:{
		 	emailID:emailID
		 },
		 success:function(data){
		 	document.getElementById('response').innerHTML=data;

		 },
		 error:function(object,status,e){
		 	document.getElementById('response').innerHTML= e+' Try Again';
		 }
	})
})

		$("#login").click(function(){
			
			var otp = document.getElementById('otp').value;
			document.getElementById('response').innerHTML="Please Wait..."
			if(otp!="" ){
				$.ajax({
                    url:'/checkotp',
                    type:'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                  
                    data:{
                    	otp:otp
                    },   
                    
                    success:function(data){
                           document.getElementById('response').innerHTML=data
                                    
                        },
                    error:function(object,status,e){
                        document.getElementById('response').innerHTML = e +' pls try again..'
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
	
	<fieldset>
		<legend style="font-family: candara;font-weight: bold">LoginDetails</legend>
		<input type="text" id="otp" style="width:50%; height: 30px;margin: 5px" placeholder="OneTimePassword"><br/>
		
		
		<button style="width: 50%; height: 30px;margin: 5px;" id="login">Verify OTP</button>


	</fieldset>		
<div id="response"></div>
<div style="font-family: candara;font-size: 1em" id="divOtp">Resend OTP button displays After<span id="ResendTimer" style="margin-left: 5px">60</span></div>
<span id="resendOTP" style="text-decoration: underline;font-family: candara;cursor: pointer;">ResendOTP</span>

	</div>

</div>
	
	<input type="hidden" name="" id="emailID" value="{{$emailaddress}}"/>
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