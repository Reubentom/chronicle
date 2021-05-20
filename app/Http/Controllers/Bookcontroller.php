<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmodel;
use   App\Models\Cartmodel;
use   App\Models\Orderdetailsmodel;
use   App\Models\Loginmodel;
use Illuminate\Support\Facades\Session;


class Bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   
    public function addtocart(Request $req)
    {
        $bid=$req->input('bid');
        $username= session('user')['username'];
        echo $bid;
        echo $username;
        $user = Cartmodel::where(['username'=>$username ,'bid'=>$bid])->get()->count();

        
          echo(($user));
        if($user==0)
        {
            $data=['username'=>$username,'bid'=>$bid,'book_qty'=>1];
               $user = Cartmodel::insert($data);
               echo "<script>alert('Book Added to Cart')</script>";

               $book=Bookmodel::get();
                $data=['books'=>$book];
                return view('shop',$data);


        }else{ $book = Cartmodel::where(['username'=>$username ,'bid'=>$bid])->first();
             // echo $book->book_qty;
             $qty =  $book->book_qty+1;
            Cartmodel::where(['username'=>$username ,'bid'=>$bid])->update(['book_qty' => $qty]);
            // $user = Cartmodel::insert($data);
            echo "<script>alert('Book Added to Cart')</script>";

            $book=Bookmodel::get();
                $data=['books'=>$book];
                return view('shop',$data);
          
        }   
       // $user = Loginmodel::where(['username' => $req->input('username') , 'password'=>$req->input('password')])->get();

        
        //$req->session()->put('user',$user[0]);
               // echo $req->session()->get('user');
               
               
               // return "login  is successful";
               // $book=Bookmodel::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbook(Request $req)
    {
       $bid= $req->session()->get('bookid');
       $bookdetails = Bookmodel::where(['id' => $bid])->first();
       $data=['book'=>$bookdetails];

       //var_dump($data);
        return view('single_product',$data);
    }
    public function singleproduct()
    {
       // echo $id;
       // $book=Bookmodel::where('id',$id)->get()
       //$data=['bookdetail'=>$book];
      // $data = ['id' => 'heloo'];
       // return view('single_product');
      echo "hello";
      App::call('App\Http\Controllers\Bookcontroller@showbook');
      ///return redirect()->route('bye');
    
    }
    public function showcart()
    {
        $username= session('user')['username'];

        $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,cart.book_qty from(book inner join cart on book.id=cart.bid)where cart.username="'.$username.'"');
        $data=['cartitem'=>$result];
        return view('cart',$data);
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletebook()
    {
        $bid= session('bid');
        $username= session('user')['username'];
         Cartmodel::where(['bid' => $bid,'username'=>$username])->delete();


        
        $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,cart.book_qty from(book inner join cart on book.id=cart.bid)where cart.username="'.$username.'"');
        $data=['cartitem'=>$result];
        return view('cart',$data);
        



    }

    public function addqty()
    {
        $bid= session('bid');
        $username= session('user')['username'];
        $book = Cartmodel::where(['username'=>$username ,'bid'=>$bid])->first();
             // echo $book->book_qty;
             $qty =  $book->book_qty+1;
            Cartmodel::where(['username'=>$username ,'bid'=>$bid])->update(['book_qty' => $qty]);


        

        $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,cart.book_qty from(book inner join cart on book.id=cart.bid)where cart.username="'.$username.'"');
        $data=['cartitem'=>$result];
        return view('cart',$data);
        



    }


    public function subqty()
    {
        $bid= session('bid');
        $username= session('user')['username'];
        $book = Cartmodel::where(['username'=>$username ,'bid'=>$bid])->first();
             // echo $book->book_qty;
             $qty =  $book->book_qty-1;
            Cartmodel::where(['username'=>$username ,'bid'=>$bid])->update(['book_qty' => $qty]);


        

        $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,cart.book_qty from(book inner join cart on book.id=cart.bid)where cart.username="'.$username.'"');
        $data=['cartitem'=>$result];
        return view('cart',$data);
        



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function managebooks()
    {
        $book = Bookmodel::get();
        $data = ['books'=>$book];


        return view('managebooks',$data);

    }
    public function manageorders()
    {
        $order = Orderdetailsmodel::get();
        $data = ['orders'=>$order];


        return view('manageorders',$data);

    }
    public function manageuser()
    {
        $user = Loginmodel::get();
        $data = ['users'=>$user];


        return view('manageuser',$data);

    }

    public function userdetailsedit(Request $req)
    {
        $username= session('user')['username'];
        $data = [
        'password'=>$req->input('password'),
        'fname'=>$req->input('fname'),
        'lname'=>$req->input('lname'),
        'email'=>$req->input('email'),
        'mobile'=>$req->input('mobile')
        
    ];
    //var_dump($data);
    Loginmodel::where(['username'=>$username])->update($data);
    
    $user = Loginmodel::where(['username'=>$username])->first();
    return view('userprofile',['user'=>$user]);
    }
    

    public function profile()
    {
        $username= session('user')['username'];
        $user = Loginmodel::where(['username'=>$username])->first();
        return view('userprofile',['user'=>$user]);
        
    }
    

    public function addnewbook(Request $req)
    {
       
        $data = ['title'=>$req->input('title'),
        'author'=>$req->input('author'),
        'publisher'=>$req->input('publisher'),
        'availability'=>$req->input('availability'),
        'cost'=>$req->input('cost'),
        'category'=>$req->input('category'),
        'details'=>$req->input('details')
        ,'imgsrc'=>$req->input('imgsrc')
        

        
    ];
    

    Bookmodel::insert($data);
    $book = Bookmodel::get();
    $d = ['books'=>$book];


    return view('managebooks',$d);

    }

    public function updateuser(Request $req)
    {
       
        $data = ['username'=>$req->input('username'),
        'password'=>$req->input('password'),
        'fname'=>$req->input('fname'),
        'lname'=>$req->input('lname'),
        'email'=>$req->input('email'),
        'mobile'=>$req->input('mobile')
        
    ];
    Loginmodel::where(['username'=>$username])->update($data);

    $user = Loginmodel::get();
    $d = ['users'=>$user];


    return view('manageuser',$d);

    }

    public function addbookform()
    {
        $bid= session('bid');
        $book=Bookmodel::where(['id'=>$bid])->first();
        $data=['book'=>$book];
        return view('managebookform',$data);
    }

    public function removeformbook()
    {
        $bid= session('bid');
        Bookmodel::where(['id'=>$bid])->delete();
        $book = Bookmodel::get();
        $data = ['books'=>$book];


        return view('managebooks',$data);
        
    }

    
        public function searchbook(Request $request)
    {
        
        $data=Bookmodel::
        where('title','like','%'.$request->input('search').'%')->get();
        
        
        return view('shop',['books'=>$data]);
    }


   


    public function updatebook(Request $req)
    {
       $id=$req->input('id');
        $data = ['title'=>$req->input('title'),
        'author'=>$req->input('author'),
        'publisher'=>$req->input('publisher'),
        'availability'=>$req->input('availability'),
        'cost'=>$req->input('cost'),
        'category'=>$req->input('category'),
        'details'=>$req->input('details')
        ,'imgsrc'=>$req->input('imgsrc')
        

        
    ];
    

    Bookmodel::where(['id'=>$id])->update($data);
    $book = Bookmodel::get();
    $d = ['books'=>$book];


    return view('managebooks',$d);

    }

}
