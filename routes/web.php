<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\LoginController;
use  App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/my-account', function () {
    return view('my-account');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});


Route::get('/shop-3-column', function () {
    return view('shop-3-column');
});

Route::get('/shop-4-column', function () {
    return view('shop-4-column');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/paymentrecipt', function () {
    return view('paymentrecipt');
});


Route::get('/admin', function () {
    return view('admindashboard');
});

Route::get('/shop-left-sidebar', function () {
    return view('shop-left-sidebar');
});


Route::get('/shop-right-sidebar', function () {
    return view('shop-right-sidebar');
});

Route::get('/index2', function () {
    return view('index2');
});

// Route::get('/single_product', function () {
//     $data=['id'=>"hello"];
//     return view('single_product',$data);


// });

Route::get('/login2', function () {
    $data= [ 'error' => '',
    'error1' =>''
];

    return view('login2',$data);
});

Route::get('addnewbookform',function(){

    return view('addnewbookform');
});

Route::post('/checklogin', "App\Http\Controllers\LoginController@index");

    Route::get('/shop', "App\Http\Controllers\LoginController@shop");



Route::get('/manageorders', "App\Http\Controllers\LoginController@manageorders");




Route::post('/register', "App\Http\Controllers\LoginController@register");
Route::get('/checkoutpage', "App\Http\Controllers\OrderController@checkoutpage");
Route::post('/orderconfirmed', "App\Http\Controllers\OrderController@orderconfirmed");


// Route::get('/single_product', function($id){
// return view('single_product');
// });


//::get('/single_product/{id}', "App\Http\Controllers\Bookcontroller@singleproduct");
Route::get('/p/{id}/singleproduct',function(Request $req, $id)
{
     $req->session()->put('bookid',$id);
 
     //echo  $req->session()->get('bookid');

   // App::call('App\Http\Controllers\Bookcontroller@singleproduct');
   return redirect('bye');
});
Route::get('bye', "App\Http\Controllers\Bookcontroller@showbook");

Route::post('addtocart', "App\Http\Controllers\Bookcontroller@addtocart");

Route::get('showcart', "App\Http\Controllers\Bookcontroller@showcart");

Route::get('deletefromcart/{bid}',function(Request $req, $bid){
    $req->session()->put('bid',$bid);
    return redirect('deletebook');
});

Route::get('deletebook', "App\Http\Controllers\Bookcontroller@deletebook");

Route::get('addqty/{bid}/cart',function(Request $req, $bid){
    $req->session()->put('bid',$bid);
    return redirect('addqty');
});

Route::get('addqty', "App\Http\Controllers\Bookcontroller@addqty");


Route::get('subqty/{bid}/cart',function(Request $req, $bid){
    $req->session()->put('bid',$bid);
    return redirect('subqty');
});

Route::get('subqty', "App\Http\Controllers\Bookcontroller@subqty");


Route::post('chck', "App\Http\Controllers\OrderController@checkout");


Route::get('managebooks', "App\Http\Controllers\Bookcontroller@managebooks");
Route::get('manageorders', "App\Http\Controllers\Bookcontroller@manageorders");

Route::get('manageuser', "App\Http\Controllers\Bookcontroller@manageuser");



Route::get('addbook/{bid}/book',function(Request $req, $bid){
    $req->session()->put('bid',$bid);
    return redirect('addbook');
});

Route::get('addbook', "App\Http\Controllers\Bookcontroller@addbookform");
Route::post('updatebook', "App\Http\Controllers\Bookcontroller@updatebook");

Route::post('addnewbook', "App\Http\Controllers\Bookcontroller@addnewbook");


Route::get('removebook/{bid}/book',function(Request $req, $bid){
    $req->session()->put('bid',$bid);
    return redirect('removebook');
});

Route::get('removebook', "App\Http\Controllers\Bookcontroller@removeformbook");

Route::post('searchbook', "App\Http\Controllers\Bookcontroller@searchbook");

Route::get('userprofile', "App\Http\Controllers\Bookcontroller@profile");


Route::post('userdetailsedit', "App\Http\Controllers\Bookcontroller@userdetailsedit");


Route::get('userorders', "App\Http\Controllers\Ordercontroller@userorders");


Route::get('/showbill/{ono}',function(Request $req, $ono){
    $req->session()->put('ono',$ono);
    return redirect('showbill');
});

Route::get('showbill', "App\Http\Controllers\Ordercontroller@showbill");


Route::get('userlogout', "App\Http\Controllers\Ordercontroller@userlogout");





