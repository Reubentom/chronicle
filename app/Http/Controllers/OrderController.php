<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmodel;
use App\Models\Cartmodel;
use App\Models\Loginmodel;
use App\Models\Orderdetailsmodel;
use App\Models\Orderproductsmodel;
use App\Models\Shipaddmodel;
use Illuminate\Support\Facades\Session;






class OrderController extends Controller
{
   


    public function checkout(Request $req)
    {
        $username= session('user')['username'];
        $user = Orderdetailsmodel::where(['username'=>$username ,'order_status'=>"pending"])->get()->count();
        if($user==0)
        {

        

        $odate= date('Y-m-d');
        //echo $odate;
        $cost=$req->input('cost');
        //echo $cost;
        $status="pending";
        $data=['username'=>$username,'odate'=>$odate,'total_cost'=>$cost,'order_status'=>$status];
        Orderdetailsmodel::insert($data);
        $order = Cartmodel::where(['username' =>$username])->get();
        foreach($order as $ord)
        {
            $book = Bookmodel::where(['id' =>$ord->bid])->first();
            //var_dump($book);


            $oid = Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->first();
            echo $oid->ono;
            $data1 = ['ono'=>$oid->ono,'bid'=>$ord->bid,'book_qty'=>$ord->book_qty,'bcost'=>$book->cost];
            Orderproductsmodel::insert($data1);



        }
        
        }
        else{
            $oid = Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->first();
             Orderproductsmodel::where(['ono' =>$oid->ono])->delete();
             Orderdetailsmodel::where(['ono' =>$oid->ono])->delete();
             echo "eeee";
             $odate= date('Y-m-d');
             //echo $odate;
             $cost=$req->input('cost');
             //echo $cost;
             $status="pending";
             $data=['username'=>$username,'odate'=>$odate,'total_cost'=>$cost,'order_status'=>$status];
             Orderdetailsmodel::insert($data);
             $order = Cartmodel::where(['username' =>$username])->get();

        foreach($order as $ord)
        {
            $book = Bookmodel::where(['id' =>$ord->bid])->first();
            //var_dump($book);


            $oid = Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->first();
            echo $oid->ono;
            $data1 = ['ono'=>$oid->ono,'bid'=>$ord->bid,'book_qty'=>$ord->book_qty,'bcost'=>$book->cost];
            Orderproductsmodel::insert($data1);



        }


        }
        $username= session('user')['username'];
           $oid = Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->first();
          //  echo $oid->ono;

           $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,cart.book_qty from(book inner join cart on book.id=cart.bid)where cart.username="'.$username.'"');
          
           $usr = Loginmodel::where(['username' =>$username])->first();
           
           $c = Shipaddmodel::where(['username' =>$username])->count();

           if ($c==0)

           {
            $ship = Loginmodel::where(['username' =>$username])->first();
            $data=['books'=>$result,'usr'=>$usr,'ship'=>$ship];

           }
           else
           {
              // $ship={'housename' :"",'landmark' :"",'city' :"",'pincode' :""};
              $ship = Shipaddmodel::where(['username' =>$username])->first();
            $data=['books'=>$result,'usr'=>$usr,'ship'=>$ship];


           }




           return view('checkout',$data);
    
        

    }
    public function checkoutpage()

    {
           // echo $oid->ono;
           $username= session('user')['username'];
           $oid = Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->first();
          //  echo $oid->ono;

           $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,cart.book_qty from(book inner join cart on book.id=cart.bid)where cart.username="'.$username.'"');
          
           $usr = Loginmodel::where(['username' =>$username])->first();
           
           $c = Shipaddmodel::where(['username' =>$username])->count();

           if ($c==0)

           {
            $ship = Loginmodel::where(['username' =>$username])->first();
            $data=['books'=>$result,'usr'=>$usr,'ship'=>$ship];

           }
           else
           {
              // $ship={'housename' :"",'landmark' :"",'city' :"",'pincode' :""};
              $ship = Shipaddmodel::where(['username' =>$username])->first();
            $data=['books'=>$result,'usr'=>$usr,'ship'=>$ship];


           }




           return view('checkout',$data);
    }
    public function orderconfirmed(Request $req)
    {
        $username= session('user')['username'];
        $housename=$req->input('housename');
        $landmark=$req->input('landmark');
        $city=$req->input('city');
        $pincode=$req->input('pincode');
        
        $c = Shipaddmodel::where(['username' =>$username])->count();

           if ($c==0)

           {
            $data=['username' =>$username,'housename' =>$housename,'landmark' =>$landmark,'city' =>$city,'pincode' =>$pincode];
        Shipaddmodel::where(['username' =>$username])->insert($data);

           }
           else
           {
              // $ship={'housename' :"",'landmark' :"",'city' :"",'pincode' :""};
              $data=['username' =>$username,'housename' =>$housename,'landmark' =>$landmark,'city' =>$city,'pincode' =>$pincode];
        Shipaddmodel::where(['username' =>$username])->update($data);


           }
        
      $ono= Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->first();
        echo $ono->ono;
       Orderdetailsmodel::where(['username' =>$username,'order_status'=>"pending"])->update(['order_status'=>"confirmed"]);

       echo '<script>alert("Your order is confirmed ")</script>' ;
       $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,order_products.book_qty from(book inner join order_products on book.id=order_products.bid)where order_products.ono="'.$ono->ono.'"');
       $user=Loginmodel::where(['username' =>$username])->first();
       $ship=Shipaddmodel::where(['username' =>$username])->first();
       $data=['books'=>$result,'user'=>$user,'ship'=>$ship];
       Cartmodel::where(['username' =>$username])->delete();

       return view('paymentrecipt',$data);


    }

    public function showbill(Request $req)
    {
        $username= session('user')['username'];
        $ono= session('ono');


        $result=\DB::select('select book.id,book.imgsrc,book.title,book.author,book.cost,order_products.book_qty from(book inner join order_products on book.id=order_products.bid)where order_products.ono="'.$ono.'"');
        $user=Loginmodel::where(['username' =>$username])->first();
        $ship=Shipaddmodel::where(['username' =>$username])->first();
        $data=['books'=>$result,'user'=>$user,'ship'=>$ship];
 
      return view('paymentrecipt',$data);

    }

    public function userorders()
    {
        $username= session('user')['username'];
        $order=Orderdetailsmodel::where(['username' =>$username])->get();
        return view('userorders',['orders'=>$order]);

    }

    public function userlogout()
    {
        Session::flush();
        return redirect('/login2');
        

    }
    
}
