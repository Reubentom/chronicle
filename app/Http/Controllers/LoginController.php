<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loginmodel;
use App\Models\Bookmodel;
use App\Models\Orderdetailsmodel;

class LoginController extends Controller
{

   
    public function shop(Request $req)
    {
        if(isset(session('user')['username']))
        {
           
            $book=Bookmodel::get();
            $data=['books'=>$book];
            return view('shop',$data);
       
        }
        else{
            return redirect('/login2');
        }
       
    }

    public function index(Request $req)
    {
        $user = Loginmodel::where(['username' => $req->input('username') , 'password'=>$req->input('password')])->get();

        //  echo isset($user);
        if(($req->input('username')=="admin")&&($req->input('password')=="admin"))
        {
            $order = Orderdetailsmodel::get();
        $data = ['orders'=>$order];


        return view('manageorders',$data);

        }



        if(isset($user[0])!=0)
        {
            if($user[0]->username == $req->input('username'))
            {
                $req->session()->put('user',$user[0]);
               // echo $req->session()->get('user');
               // echo session('user')['user_password'];
               // return "login  is successful";
                $book=Bookmodel::get();
                $data=['books'=>$book];
                return view('shop',$data);
            }
            
        }
        else 
        {
            $data=[

                "error" => "username and password does not match",
                "error1"=> ""
            ];
           // return "username and password does not match";
          // return redirect('/login');
          return view('login2',$data);
        }

    }
    public function register(Request $req)
{
    $data = ['username'=>$req->input('username'),
    'password'=>$req->input('password'),
    'fname'=>$req->input('fname'),
    'lname'=>$req->input('lname'),
    'email'=>$req->input('email'),
    'mobile'=>$req->input('mobile')
    
];
$user = Loginmodel::where(['username' => $req->input('username')])->get();

if(isset($user[0])==0)
{
    Loginmodel::insert($data);
    echo '<script>alert("succesfully registered.please login")</script>';
    
    $data=[

        "error1" => "username already exists",
        "error"  => ""
    ];
    return view('login2',$data);
    
}
else 
{
    $data=[

        "error1" => "username already exists",
        "error"  => ""
    ];
   // return "username and password does not match";
  // return redirect('/login');
 // return view('login2',$data);
}


     
}
}

