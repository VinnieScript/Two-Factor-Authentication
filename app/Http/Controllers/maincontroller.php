<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\register;
use App\post;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class maincontroller extends Controller
{
    //

    private $SMS_SENDER = "Stardom";
    private $RESPONSE_TYPE = 'json';
    private $SMS_USERNAME = 'hademylola@gmail.com';
    private $SMS_PASSWORD = 'Ademilola2@';


    public function index(){
    	$member = new register();
    	return view('index');

    }

    public function checklogin(Request $request){
    	$member = new register();

    	$parameters = ["email"=>$request->emailaddress,"password"=>$request->password];

    	$check = $member::where($parameters)->first();
//$response="letz";
    	//$phone_number = $check->phonenumber;

        //$message = "DaVincy da Stardom";

        //$this->initiateSmsActivation($phone_number, $message);
  //$this->initiateSmsGuzzle($phone_number, $message);

       // return  response ('Message has been successfully sent to '.$phone_number);
    	if($check!=""){
    		if($check->verification == "Account Verified"){
    			//$x = rand(1000,10000000);
    			//$response = 'success';
    			$phone_number = $check->phonenumber;
    			$otp =  rand(1000,10000000);
    			$message = 'Kindly find OTP from StarDom Community '.$otp. ' .Expires after 2hours';
    			 //$this->initiateSmsActivation($phone_number, $message);
    			  $this->initiateSmsGuzzle($phone_number, $message);
    			 //$response="Message has been sent successfully";
    			
    			$update = $member::find($check->id);
    			 if($update){
    			 	$update->OTP = $otp;
    			 	$update->save();
    			 	$response = "OTP sent";
    			 }else{
    			 	$response ="Internal Server Error..Pls Try Again..";
    			 }
    			 
    			 

    		}
    		else{
    			$response = "Your Account has not ben verified..pls check your mailbox for the verification message";
    		}
    		
    	}
    	else{
    		$response = "Invalid Username/Password";
    	}

    	return response($response);

    }

    
    public function initiateSmsActivation($phone_number, $message){
        $isError = 0;
        $errorMessage = true;

        //Preparing post parameters
        $postData = array(
            'username' => 'hademylola@gmail.com',
            'password' => 'Ademilola2@',
            'message' => $message,
            'sender' => $this->SMS_SENDER,
            'mobiles' => $phone_number,
            'response' => $this->RESPONSE_TYPE
        );

        $url = "http://portal.bulksmsnigeria.net/api/";

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);

        if($isError){
            return array('error' => 1 , 'message' => $errorMessage);
        }else{
            return array('error' => 0 );
        }
    }

       public function initiateSmsGuzzle($phone_number, $message)
    {
        $client = new Client();
try{
 $response = $client->post('http://portal.bulksmsnigeria.net/api/?', [
            'verify'    =>  false,
            'form_params' => [
                'username' => 'hademylola@gmail.com',
                'password' => 'Ademilola2@',
                'message' => $message,
                'sender' => $this->SMS_SENDER,
                'mobiles' => $phone_number,
            ],
        ]);
 $response = json_decode($response->getBody(), true);
 
}catch(RequestException $ex){
dd($ex);
}
       

        
    }


    public function register(){
    	return view('register');
    }
    public function registration(Request $r){
    	$member = new register();
    	$checkemail = $member::where('email','=',$r->emailaddress)->first();

    	if($checkemail !=""){
    		$response = "EmailAddress Already Exist";
    	}
    	else{
    		$member->lastname=$r->lname;
    	$member->firstname=$r->fname;
    	$member->sex=$r->sex;
    	$member->address=$r->address;
    	$member->email=$r->emailaddress;
    	$member->phonenumber=$r->phonenumber;
    	$member->password=$r->password;
    	//$x=$r->emailaddress;
    	
    	Mail::send('email',['name'=> $r->lname.' '.$r->fname,'emailaddress'=>$r->emailaddress],function($message) use($r){
              $message->to($r->emailaddress,'StarDom Community')->subject('STARDOM EMAIL CONFIRMATION');
              });
    	//Mail::to($r->emailaddress)->send('email');
    	$member->save();
    	$response = 'Kindly Check your EmailAddress to activate your Account';
    	}
    	
    	return response($response);


    }

    public function activateEmail($emailaddress){

    	$member = new register();
    	$parameters = ['email'=>$emailaddress];
    	$fetch = $member::where($parameters)->first();
    	if($fetch ){

    		if($fetch->verification != "Account Verified"){
    			$update = $member::find($fetch->id);
    			if($update){
            		$update->verification = 'Account Verified';
      
            		$update->save();
           
            		return redirect()->route('activatedmessage');
        }
        else{

        	return response('Activation Failed...pls try the Link again...');

        }

    		}
    		else{
    			return redirect()->route('msg');

    		}
    		

    		
    	}
    	else{
    		return redirect()->route('forbidden');
    	}



    }

    public function forbidden(){
    	return view('forbidden');
    }

    public function activatedmessage(){
    	return view('activatedmsg');
    }

    public function msg(){
    	return view('msg');
    }

        
    public function otp($emailaddress){
    	return view('onetimepassword')->with('emailaddress',$emailaddress);
    }
public function checkotp(Request $r){
	$member = new register();

	$check = $member::where('OTP','=',$r->otp)->first();

	if($check!=""){
		$update = $member::find($check->id);
		if($update){
			$update->OTP="";
			$update->save();
			$response = 'Loggedin';

            session()->put('userId',$check->email);
            session()->put('fullname',$check->lastname .' '. $check->firstname);


		}
		else{
			$response="Internal Server Error..try again";
		}
		
	}
	else{

		$response = 'Invalid Token';
	}
	return response($response);
}

public function stardom_dashboard(){
	return view('stardom');
}
public function resendOTP(Request $r){
	$member = new register();

	$check = $member::where('email','=',$r->emailID)->first();

	if($check ==""){
		$response= "Forbidden Response...";
	}
	else{
		if($check->OTP !=""){
			$phone_number = $check->phonenumber;
    		$otp =  rand(1000,10000000);
    		$message = 'Kindly find OTP from StarDom Community '.$otp. ' .Expires after 2hours';
    			 //$this->initiateSmsActivation($phone_number, $message);
    		$this->initiateSmsGuzzle($phone_number, $message);
    		$update = $member::find($check->id);
    			 if($update){
    			 	$update->OTP = $otp;
    			 	$update->save();
    			 	$response = "OTP has been Resend to your registered phonenumber.";
    			 }else{
    			 	$response ="Internal Server Error..Pls Try Again..";
    			 }
    			 
    		
		}
		else{
			$response="Invalid Response Check";

		}
	}
	return response($response);

}




    public function savepost(Request $r){

        $member = new post();
        $member->email = $r->userId;
        $member->postmessage = $r->message;
        $member->save();


        return response('Successfully Posted');



    }

    public function loadfeeds(Request $r){

        $fetchAll = post::orderBy('created_at','desc')->get();

        //$fetchAll = $member::all()->orderBy('created_at','desc');

        return response()->json([
            'fetchAll'=>$fetchAll
        ]);
    }





}
