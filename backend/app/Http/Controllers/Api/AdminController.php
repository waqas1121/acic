<?php

namespace App\Http\Controllers\Api;
use App\Board;
use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Obituary;
use App\Post;
use App\Prayer;
use App\Privacy;
use App\Setting;
use App\Pages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Mail\EmailDemo;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }

    public function login(Request $request)
    {
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();


            return response()->json([
                'error' => false,
                'data' => $user->toArray(),
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'Credentials Doent Match',
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }
    
    
    public function loginwild(Request $request)
    {
        $url = "https://oauth.wildapricot.org/auth/token";
 $user = $request->input('uname');

$pass = $request->input('upass');

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
   "Authorization: Basic anBtNjc4enFkZDppZTRsaWlqZ242ZmhnYnE0cTlrcGo3Z3ZsOGZwd3I=",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "grant_type=password&username=$user&password=$pass&scope=auto";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);



$result= json_decode($resp);
//print_r($result);
//print_r(isset($result->error));


if (isset($result->error))
  {
  
  return response()->json([ 'error' => "Invalid Login details" ],402);
  
  
  }else{
return response()->json(['data' => $result]);
}

    }

    
    



   










public function viewprofile(Request $request)
{
    
    $logged_user_token = $request->token;
    $ac_id = $request->AccountId;
    $url = "https://api.wildapricot.org/publicview/v1/Accounts/$ac_id/contacts/me";
    

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "Authorization: Bearer ".$logged_user_token
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//print_r($resp);
return  $resp;




}

public function viewpkg(Request $request)
{
    $logged_user_token = $request->token;
    $ac_id = $request->AccountId;
    $accountid = $request->Memid;
   

    $url = "https://api.wildapricot.org/publicview/v1/Accounts/$ac_id/MembershipLevels/$accountid";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "Authorization: Bearer ".$logged_user_token
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
print_r($resp);
//return  $resp;

}














    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }

    public function allEvents(Request $request)
    {
        $events = Event::get();
        if ($events) {
            return response()->json(['events' => $events], 200);
        } else {
            return response()->json([
                'data' => 'Event not found'
            ], 404);
        }

    }

    public function upcomingEvents(Request $request)
    {
        $current_date=Carbon::now();
        $events = Event::orderBy('to_date', 'asc')->where('to_date', '>', $current_date)->take(3)->get();
        //$id=DB::table('events')->orderBy('to_date', 'asc')->where('to_date', '>', $current_date)->take(10)->get();
        //$events = Event::orderBy('to_date', 'DESC')->take(10)->get();
       

        if ($events) {
            return response()->json(['events'=>$events], 200);
        } else {
            return response()->json([
                'data' => 'Event not found'
            ], 404);
        }

    }

    public function previousEvents(Request $request)
    {
        $current_date=Carbon::now();
        $events = Event::orderBy('to_date', 'desc')->where('to_date', '<=', $current_date)->take(5)->get();

        if ($events) {
            return response()->json($events, 200);
        } else {
            return response()->json([
                'data' => 'Event not found'
            ], 404);
        }


    }

    public function allCategories(Request $request)
    {
        $categories = Category::all();
        if ($categories) {
            return response()->json($categories, 200);
        } else {
            return response()->json([
                'data' => 'Category not found'
            ], 404);
        }

    }

    public function allPosts(Request $request)
    {

       /* $id = $request->input("id");
        $posts = Post::where('category_id',$id)->get();*/
       $posts=Post::all();
        if ($posts) {
            return response()->json($posts, 200);
        } else {
            return response()->json([
                'data' => 'Post not found'
            ], 404);
        }
    }

    public function latestNews(Request $request)
    {

        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $postsall = Post::orderBy('created_at', 'desc')->get();
        if ($posts) {
            return response()->json(['recent'=>$posts,'allpost'=>$postsall], 200);
        } else {
            return response()->json([
                'data' => 'Post not found'
            ], 404);
        }
    }

    public function allBoardMembers(Request $request)
    {
        /* $id = $request->input("id");
         $posts = Post::where('category_id',$id)->get();*/
        $boards=Board::get();
        if ($boards) {
            return response()->json(['members'=>$boards], 200);
        } else {
            return response()->json([
                'data' => 'Board members not found'
            ], 404);
        }
    }

    public function allObituaries(Request $request)
    {
        /* $id = $request->input("id");
         $posts = Post::where('category_id',$id)->get();*/
            //$obituaries=Obituary::all()->get;
        $obituaries= DB::table('obituaries')->orderBy('created_at', 'desc')->take(3)->get();
        $allobituaries= DB::table('obituaries')->get();
     
       
        if ($obituaries) {
            return response()->json(['obituaries'=>$obituaries,'allobituaries' => $allobituaries], 200);
        } else {
            return response()->json([
                'data' => 'Obituary not found'
            ], 404);
        }
    }

    public function allPrayers(Request $request)
    {
        //$id = $request->input("id");
        
        $date = explode("-", $current_date=Carbon::today()->toDateString());

        $day = $date[2];
      
         $month = $date[1];
       $year = $date[0];
        
        //$prayer = Prayer::where('month_id',$id)->get();
        $prayer = Prayer::where('month',$month)->where('day',$day)->get();
        
        
        if ($prayer) {
            return response()->json(['homeday'=>$prayer], 200);
        } else {
            return response()->json([
                'data' => 'Prayer not found'
            ], 404);
        }
        
    }
    public function prayerHome(Request $request)
    {
        //$id = $request->input("id");
        
        $dates = Carbon::today();
         $date = $dates->format('l . d . F . Y');
        
        //$date = $dates->toFormattedDateString();
        
        //$prayer = Prayer::where('month_id',$id)->get();
        $prayer = $date;
        
        
        if ($prayer) {
            return response()->json(['prayer_home'=>$prayer], 200);
        } else {
            return response()->json([
                'data' => 'Prayer not found'
            ], 404);
        }
        
    }
    public function homeDay(Request $request)
    {
        $month = Carbon::now()->month;
        $prayer = Prayer::where('month', $month)->get();
        if ($prayer) {
            return response()->json(['homeday'=>$prayer], 200);
        } else {
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
    }

    public function settings(Request $request)
    {
        /* $id = $request->input("id");
         $posts = Post::where('category_id',$id)->get();*/
        $settings = Setting::pluck('value','name')->all();
        if ($settings) {
            return response()->json($settings, 200);
        } else {
            return response()->json([
                'data' => 'Board members not found'
            ], 404);
        }
    }

   /* public function editEvent(Request $request)
    {
        $id = $request->input("id");
        $event = Event::findOrFail($id);
        if ($event) {
            return response()->json($event, 200);
        } else {
            return response()->json([
                'data' => 'Event not found'
            ], 404);
        }

    }

    public function updateEvent(Request $request)
    {
        $id = $request->input("id");
        $event = Event::findOrFail($id);
        if ($event) {
            $event->title = $request->input('title');
            $event->description = $request->input('description');
            $event->to_date = $request->input('to_date');
            $event->from_date = $request->input('from_date');
            $event->save();
            return response()->json($event, 200);
        } else {
            return response()->json([
                'data' => 'Event not found'
            ], 404);
        }
    }*/

    public function searchRecordByCurrentDate(Request $request)
    {
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $prayer = Prayer::where('month', $month)
            ->where('day', $day)
            ->get();
        if ($prayer) {
            return response()->json($prayer, 200);
        } else {
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
    }

    public function prayerTime(Request $request)
    {
        $month = $request->month;
        $day = $request->day;
        $prayer = Prayer::where('month', $month)
            ->where('day', $day)
            ->get();
        if ($prayer) {
            return response()->json($prayer, 200);
        } else {
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
    }

    public function privacyPolicy()
    {
        $privacy_policy=Privacy::findorfail(1);
        if ($privacy_policy) {
            return response()->json($privacy_policy, 200);
        } else {
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
    }
    
    
    
    public function cmsPage($id)
    {
        
        $cms = Pages::findorfail($id);
        if($cms){
            return response()->json(['cms'=>$cms],200);
        }else{
            
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
    }
    public function livestream(){
        $setting= DB::table('settings')->pluck('value','name')->all();
        if($setting){
            return response()->json(['livestream'=>$setting],200);
        }else{
            
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
        
    }
    
    public function detail($slug){
        
        
        //$sql = Post::get($slug);
        $post = DB::table('posts')->where('slug',$slug)->get();
        
        if($post){
            return response()->json(['post'=>$post],200);
        }else{
            
            return response()->json([
                'data' => 'Record not found'
            ], 404);
        }
    }
    public function contactform(Request $request){
        $email = 'waqas@tecmyer.com.au';
       $mailData = [
           
            'subject'=>$request->subject,
            'fname'=>$request->fname,
            'email' => $request->email,
            'msg'  => $request->msg
            
        ];

        Mail::to($email)->send(new EmailDemo($mailData));
       
        
    }
    public function data(){
        
        $url = "https://acic.wildapricot.org/sys/login/OAuthLogin?client_Id=wvhcifh2y5&scope=auto&redirect_uri=https://tecmyer.com.au/projects/acic/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: */*",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//print_r($resp);
return response()->json(['dat'=>$resp],200);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}


class WaApiClient
{
   const AUTH_URL = 'https://oauth.wildapricot.org/auth/token';
         
   private $tokenScope = 'auto';

   private static $_instance;
   private $token;
   
   public function initTokenByContactCredentials($userName, $password, $scope = null)
   {
      if ($scope) {
         $this->tokenScope = $scope;
      }

      echo $this->token = $this->getAuthTokenByAdminCredentials($userName, $password);
      if (!$this->token) {
         throw new Exception('Unable to get authorization token.');
      }
      
      
   }

   public function initTokenByApiKey($apiKey, $scope = null)
   {
      if ($scope) {
         $this->tokenScope = $scope;
      }

      $this->token = $this->getAuthTokenByApiKey($apiKey);
      if (!$this->token) {
         throw new Exception('Unable to get authorization token.');
      }
   }

   // this function makes authenticated request to API
   // -----------------------
   // $url is an absolute URL
   // $verb is an optional parameter.
   // Use 'GET' to retrieve data,
   //     'POST' to create new record
   //     'PUT' to update existing record
   //     'DELETE' to remove record
   // $data is an optional parameter - data to sent to server. Pass this parameter with 'POST' or 'PUT' requests.
   // ------------------------
   // returns object decoded from response json

   public function makeRequest($url, $verb = 'GET', $data = null)
   {
       
       
      if (!$this->token) {
         throw new Exception('Access token is not initialized. Call initTokenByApiKey or initTokenByContactCredentials before performing requests.');
      }

      $ch = curl_init();
      $headers = array(
         'Authorization: Bearer ' . $this->token,
         'Content-Type: application/json'
      );
      curl_setopt($ch, CURLOPT_URL, $url);
      
      if ($data) {
         $jsonData = json_encode($data);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
         $headers = array_merge($headers, array('Content-Length: '.strlen($jsonData)));
      }
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $jsonResult = curl_exec($ch);
      if ($jsonResult === false) {
         throw new Exception(curl_errno($ch) . ': ' . curl_error($ch));
      }

      // var_dump($jsonResult); // Uncomment line to debug response

      curl_close($ch);
      return json_decode($jsonResult, true);
   }

   private function getAuthTokenByAdminCredentials($login, $password)
   {
      if ($login == '') {
         throw new Exception('login is empty');
      }

      $data = sprintf("grant_type=%s&username=%s&password=%s&scope=%s", 'password', urlencode($login), urlencode($password), urlencode($this->tokenScope));

      throw new Exception('Change clientId and clientSecret to values specific for your authorized application. For details see:  https://help.wildapricot.com/display/DOC/Authorizing+external+applications');
      $clientId = 'SamplePhpApplication';
      $clientSecret = 'open_wa_api_client';
      $authorizationHeader = "Authorization: Basic " . base64_encode( $clientId . ":" . $clientSecret);

      return $this->getAuthToken($data, $authorizationHeader);
   }

   private function getAuthTokenByApiKey($apiKey)
   {
      $data = sprintf("grant_type=%s&scope=%s", 'client_credentials', $this->tokenScope);
      $authorizationHeader = "Authorization: Basic " . base64_encode("APIKEY:" . $apiKey);
      return $this->getAuthToken($data, $authorizationHeader);
   }

   private function getAuthToken($data, $authorizationHeader)
   {
      $ch = curl_init();
      $headers = array(
         $authorizationHeader,
         'Content-Length: ' . strlen($data)
      );
      curl_setopt($ch, CURLOPT_URL, WaApiClient::AUTH_URL);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      if ($response === false) {
         throw new Exception(curl_errno($ch) . ': ' . curl_error($ch));
      }
      // var_dump($response); // Uncomment line to debug response	
      
      $result = json_decode($response , true);
      curl_close($ch);
      return $result['access_token'];
   }

   public static function getInstance()
   {
      if (!is_object(self::$_instance)) {
         self::$_instance = new self();
      }

      return self::$_instance;
   }

   public final function __clone()
   {
      throw new Exception('It\'s impossible to clone singleton "' . __CLASS__ . '"!');
   }

   private function __construct()
   {
      if (!extension_loaded('curl')) {
         throw new Exception('cURL library is not loaded');
      }
   }

   public function __destruct()
   {
      $this->token = null;
   }
}