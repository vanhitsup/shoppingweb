<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Shipping;
use App\Models\Customer;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    //


    public function manage_order(){

        $getorder = Order::orderby('order_id','DESC')->get();
        return view('admin.manage_order')->with(compact('getorder'));
    }

    public function view_order($order_code){
        $order_details = Order_detail::where('order_code',$order_code)->get();
        $getorder = Order::where('order_code',$order_code)->get();
        foreach($getorder as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details_product = Order_detail::with('product')->where('order_code', $order_code)->get();

        foreach($order_details_product as $key => $order_d){

            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        return view('admin.view_order')->with(compact('customer','order_details','shipping','order_details_product','coupon_condition','coupon_number','order_status','getorder'));

    }

    public function print_order($checkout_code){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }

    public function print_order_convert($checkout_code){
        $order_details = Order_detail::where('order_code',$checkout_code)->get();
        $order = Order::where('order_code',$checkout_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details_product = Order_detail::with('product')->where('order_code', $checkout_code)->get();

    foreach($order_details_product as $key => $order_d){

            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();

            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;

            if($coupon_condition==1){
                $coupon_echo = $coupon_number.'%';
            }elseif($coupon_condition==2){
                $coupon_echo = $coupon_number;
            }
        }else{
            $coupon_condition = 2;
            $coupon_echo = 0;


        }




        $output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
           <div style="font-family: DejaVu Sans;">
           <p align="right" style="margin-top: -20px">C???ng H??a X?? H???i Ch??? Ngh??a Vi???t Nam</p>
           <p style="margin:-18px 0 0 440px ">?????c L???p - T??? Do - H???nh Ph??c</p>
           <p style="font-weight: bold; margin-top: -50px">C.TY TNHH VA-SMART</p>
           <p align="center" style="margin:10px 0 40px 0 ;font-weight: bold ">PHI???U ????N H??NG</p>
                                       <p align="center" style="margin: -40px 0 20px 0">-------oOo-------</p>
               <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-lg-12">

                   </div>
               </div>
                   <p style="font-style: italic; font-size: 13px; margin-top: 30px">Th??ng tin ng?????i nh???n h??ng</p>
                  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-lg-12">
                       <table class="table table-bordered" style="width: 100% ;font-size: 13px" >
                           <thead>
                               <tr>
                                  <th width="30%" height="3%">Ng?????i nh???n</th>
                                  <th>?????a ch???</th>
                                  <th>S??? ??i???n tho???i</th>
                                  <th>Email</th>
                                  <th>Ghi ch??</th>
                               </tr>
                           </thead>
                           <tbody>';
                     $output.= '
                               <tr>

                                   <td>'.$shipping->shipping_name.'</td>
		                          <td>'.$shipping->shipping_address.'</td>
		                          <td>'.$shipping->shipping_phone.'</td>
		                          <td>'.$shipping->shipping_email.'</td>
		                          <td>'.$shipping->shipping_note.'</td>

                               </tr>';
                        $output.= '
                          </tbody>
                       </table>
                   </div>
               </div>
               <hr>
           <p style="font-style: italic; font-size: 13px; margin-top: 30px">Chi ti???t ????n h??ng</p>
                  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-lg-12">
                       <table class="table table-bordered" style="width: 100% ;font-size: 13px" >
                           <thead>
                               <tr>
                                  <th>STT</th>
                                  <th>T??n s???n ph???m</th>
                                  <th width="10%">S??? l?????ng</th>
                                  <th>Gi?? b??n</th>
                                  <th>T???ng</th>
                               </tr>
                           </thead>
                           <tbody>';
                        $i=0;
                      $i++;

//
        foreach ($order_details_product as $key=>$detail)
            $output.= '

                                <tr>
                                   <td>'.$i++.'</td>
		                            <td>'.$detail->product_name.'</td>
                                     <td>'.$detail->product_sales_quantity.'</td>
                                     <td>'.number_format($detail->product_price).' ??</td>
                                     <td>'.number_format($detail->product_price*$detail->product_sales_quantity).' ??</td>
                               </tr>';
        $subtotals = 0;
        $subtotal = $detail->product_price*$detail->product_sales_quantity;
        $subtotals+=$subtotal;
        if($detail->product_coupon!='no'){
            $product_coupon = $detail->product_coupon;
        }else{
            $product_coupon = 'kh??ng m??';
        }
        $output.= '
                                <tr>
                                       <td colspan="2">
                                          <span style="font-weight: bold">M?? gi???m gi??:</span>
                                          '.$product_coupon.'
                                        </td>
                                        <td colspan="2">
                                         <span style="font-weight: bold"> S??? ti???n ???????c gi???m: </span>
                                         '.number_format($coupon_echo).' ??
                                        </td>
                                        <td >
                                        <span style="font-weight: bold"> Ph?? Ship:</span>
                                         '.number_format($detail->product_feeship).' ??
                                        </td>
                                </tr>';
                              $output.='
                                <tr>
                            <td colspan="5" align="center">
                                <span style="font-weight: bold;">
                                T???ng gi?? tr??? ????n h??ng ph???i thanh to??n:
                            </span>
                              <span style="color: red; font-weight: bold; ">
                                  95,985,000 ??
                              </span>
                           </td>
                                </tr>';
                             $output.='

                          </tbody>
                            <div class="admin" style="margin-left: 400px; margin-top:50px" >
                                 <p style="margin-bottom: 50px; font-weight: bold">Ng?????i l???p phi???u</p>
                                  <p style="font-style: italic">Ph???m Tr???n Vi???t Anh</p>
                             </div>
                             <div class="user" style="float: left; margin-left: 30px; margin-top: 50px">
                             <p  style="margin-bottom: 60px; font-weight: bold">Ng?????i mua h??ng</p>
                             <p style="font-style: italic">'.$shipping->shipping_name.'</p>
                            </div>


                       </table>
                   </div>
               </div>
           </div>';

        return $output;

    }
}
