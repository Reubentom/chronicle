  <!DOCTYPE html>
  <html lang="en">
    <head>

      <meta charset="utf-8">
      <title>Example 2</title>
      <link rel="stylesheet" href="css/style2.css" media="all" />
    </head>
    <body>
      <header class="clearfix">

        <div id="logo">
          <img src="assets/images/logo/logo.png">
        </div>
        <center><div>
         <a href="/shop">Go Back To Products-></a>
        </div></center>



        <div id="invoice">
          <h2 class="name">Chronicle</h2>
          <div>Ground Floor</div>
          <div>Teepeyem Enclave</div>
          <div>opp Gokul Ootupura</div>
          <div>Kadavanthra, Kochi</div>
          <div>Kerala, 683456</div>
          <div>(+91) 0923467891</div>
          <div><a href="mailto:chronicle@example.com">chronicle@example.com</a></div>
        </div>
        </div>

      </header>
      <main>

        <div id="details" class="clearfix">
          <div id="client">
            <div class="to" style="color:blue">BILL TO:</div>
            <h2 class="name">{{$user->fname}} {{$user->lname}}</h2>
            


            <div class="email"><a href="mailto:john@example.com"></a></div>
          </div>

          <div id="invoice">
            <div class="to" style="color:orange;">SHIP TO:</div>
            <h2 class="name"></h2>
            <div class="address">{{$ship->housename}}</div>
            <div class="address">{{$ship->landmark}}</div>
            <div class="address">{{$ship->city}}</div>
            <div class="address">{{$ship->pincode}}</div>

          

          </div>



        </div>
        <div id="details">
            <h1>Reciept</h1>
            <div class="date">Date of Billing: <b> </b></div>
            <div class="date">Mode of Payment: <b> Cash on Delivery</b></div>

          </div>


        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="no">#</th>
              <th class="desc">PRODUCT TITLE AND DESCRIPTION</th>
              <th class="unit">UNIT PRICE</th>
              <th class="qty">QUANTITY</th>
              <th class="total">TOTAL</th>
            </tr>
          </thead>
          <?php $total_cost=0;?>
          
          <tbody>@foreach($books as $book)         
            <tr>
              <td class="no"></td>
              <td class="desc"><h3>{{$book->title}}
              </h3></td>
              <td class="unit">{{$book->cost}}</td>
              <td class="qty">{{$book->book_qty}}</td>
              <td class="total">{{$book->book_qty*$book->cost}}</td>
              <?php   $total_cost=$total_cost+($book->cost*$book->book_qty);?>
             
            </tr>@endforeach
 


          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">SUBTOTAL</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">SHIPPING CHARGES</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">GRAND TOTAL</td>
              <td>{{$total_cost}}</td>
            </tr>
          </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
          <div>NOTICE:</div>
          <div class="notice">All Orders Reaches Destination within 7 days of from the date of purchase.
          Only cash will be accepted.</div>
        </div>
      </main>
      <footer>
        Invoice was created on a computer and is valid without the signature and seal.


      </footer>
    </body>
  </html>
