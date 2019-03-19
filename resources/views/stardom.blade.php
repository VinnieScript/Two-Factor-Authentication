<!DOCTYPE html>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{!!asset('images/logo.png')}!!"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<title>StarDom|Community</title>
</head>
<style type="text/css">
	

</style>
<script type="text/javascript">
	$(document).ready(function(){
		loadfeeds();
		if(document.getElementById('userId').value !== ""){
			//alert('Welcome Back..')
		}
		else{
			alert('Sorry Your Session has Expired..Pls Login')
			location="/"
		}
		document.getElementById("myTextarea").placeholder = "Share ideas, photos or videos";
		
				$("#postbtn").click(function(){
			var message = $("#myTextarea").val();
			var userId = document.getElementById('userId').value;
			if(message!=""){
				document.getElementById('postbtn').value="POSTING FEED"
				$.ajax({
					url:'/savepost',
					type:'post',
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					data:{
						message:message,
						userId:userId
					},
					success:function(data){
						if(data === "Successfully Posted"){

							$("#myTextarea").val('');
							
						setTimeout(function(){loadfeeds()},2000);
						}
						
					},
					error:function(object,status,e){
						alert(e);
					}

				})
			}
		})

function loadfeeds(){

document.getElementById('loadfeeds_div').innerHTML = "";
			$.ajax({
					url:'/loadfeeds',
					type:'post',
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					data:{
						message:'message'
					},
					success:function(data){
						console.log(data['fetchAll']);

               $.each(data['fetchAll'], function(key, value) {

var radio_with_label = $('<div id="mainDiv" style="width:100%; height:30px;background-color:#2E8B57;color:#e9e9e9">'+value.email+'</div><table  style="border-bottom:1px solid #000;margin-top:5px;width:100%;" ><tr><td width="5%"><img src="{{asset("images/logo.png")}}" style="width:50px"/></td><td><span style="font-family: candara;">'+ value.postmessage+'</span><div style="font-weight: bold;margin-top:5px">'+value.created_at+'<br/><button>Likes</button><button>Comment</button></div></td></tr></table>');
//alert(value.emailaddress);
$("#loadfeeds_div").append(radio_with_label); // TARGET -> any valid selector container to radios
});
					},
					error:function(object,status,e){
						alert(e);
					}

				})
			
		}

	})


</script>
<body style="background-color: #e9e9e9">
<div style="width: 100%;height: 100%">
	<input type="hidden" id="userId" value="@if(Session::get('userId')) {{Session::get('userId')}} @endif"/>
	<div  id="stardom_banner">	
<table id="stardom_banner_table"><tr><td id="stardom_banner_table_td1"><img src="{{asset('images/logo.png')}}" width="40px" height="30px" /></td><td id="stardom_banner_table_td2"><img src="{{asset('images/friendrequest.png')}}" width="20px"/><span id="tab_name">FriendRequest</span></td><td id="stardom_banner_table_td2"><img src="{{asset('images/notification.png')}}" width="20px"/><span id="tab_name">Notification</span></td><td id="stardom_banner_table_td2"><a href="/" style="text-decoration: none;"><img src="{{asset('images/logout.png')}}" width="20px"/><span id="tab_name">Logout</span></a></td><td ><img src="{{asset('images/message.png')}}" width="20px"/><span id="tab_name">Messages</span></td><td style="width: 20%" ><img src="{{asset('images/pimage.png')}}" width="30px" height="30px" style="border-radius: 50%;border:2px solid #fff" /><span style="font-family: candara;color:#e9e9e9" id="tab_name">@if(Session::get('fullname')) {{Session::get('fullname')}} @endif</span></td></tr></table>
	</div>

<div style="width:100%;" align="center">
	<div id="real_background">
		<div id="profile_frame">
		<div id="profile_frame_cover">
			<table id="profile_frame_table"><tr><td><img src="{{asset('images/pimage.png')}}"  id="profile_frame_image" /></td><td><span style="font-size: 1.1em;color: #fff;font-weight: bold;font-family: candara">@if(Session::get('fullname')) {{Session::get('fullname')}} @endif</span><br/><span style="font-family: candara;font-size: 1em;font-weight: bold;color: #fff">Web Developer</span></td></tr></table></div>
</div>

		<div id="banner_frame"><img src="{{asset('images/banner.jpg')}}" id="banner_image" /></div>
		<div style="background-color: #fff;width:100%;height: 60px;border-bottom-right-radius: 10px;border-bottom-left-radius:10px ">
			<br/>
			<table id="table_menu_bar"><tr><td style="width: 100px"><img src="{{asset('images/timeline.png')}}" width="25px"/><span  id="menu_bar">TimeLine</span></td><td style="width:100px"><img src="{{asset('images/profile.png')}}" width="25px"/><span id="menu_bar">Profile</span></td><td width="100px"><img src="{{asset('images/edit.png')}}" width="25px"/><span id="menu_bar">Edit</span></td><td width="100px"><img src="{{asset('images/friend.png')}}" width="25px"/><span id="menu_bar">Friends(6)</span></td><td width="100px"><img src="{{asset('images/photo.png')}}" width="25px"/><span id="menu_bar">Photos</span></td></tr></table>

		</div>


	</div>


</div>




<div style="width:100%" align="center" >
	
<div style="margin-top: 60px;width: 95%; height:100%;background-color: #e9e9e9;">
	
	<div  id="friend_zone">Friends
		<table style="width:100%;margin-top:10px">
			<tr>
				<td><img src="{{asset('images/pic1.jpg')}}"width="80px"  height="100px"/><img src="{{asset('images/pic2.jpg')}}"  width="80px" height="100px"/><img src="{{asset('images/pic3.jpg')}}" width="80px" height="100px"/><img src="{{asset('images/pimage.png')}}" width="80px" height="100px"/><img src="{{asset('images/pic4.jpg')}}" width="80px" height="100px"/><img src="{{asset('images/pic5.jpg')}}" width="80px" height="100px"/></td>

			</tr>


		</table>



	</div>
				
				<div  id="main_zone">
					<div style="width:100%;height:30px;background-color:#2E8B57;" align="left">What's On Your Mind?</div>
					<textarea style="width:100%;height:100px" id="myTextarea">
						

					</textarea>

					<div style="width:100%" align="left">
						<img src="{{asset('images/photo.png')}}" width="20px" height="20px"><span style="font-family: candara;color: #000"><u>Upload Photos</u></span><br/>
						<button style="width: 100px;height:30px;background-color: #2E8B57;color: #fff" id="postbtn">POST</button></div> 

					<div style="width: 100%;background-color: #fff;margin-top:10px;color: #000" align="left">
						<div id="loadfeeds_div">
							
						</div>
					</div>
				</div>
				
					


				
				<div  id="trendz_zone">Trendz
					<div style="margin-top:10px">
					<img src="{{asset('images/location.png')}}" style="width:100%;height: 200px" />
				</div>
				<div style="margin-top: 10px">
					<img src="{{asset('images/andela.jpg')}}" style="width:100%;height: 200px" />
				</div>
				</div>
				<div  id="online_zone">Online Friends
					<div style="font-family: candara; margin-top: 20px;color:#000"> No Friends Online</div>
				</div>


	</div>

</div>
	
	
</div>


</body>
</html>