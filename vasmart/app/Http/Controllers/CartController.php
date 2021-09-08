<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
session_start();
class CartController extends Controller
{
    //
    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }
    }
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('products')->where('product_id',$productId)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
//         Cart::destroy();

        return Redirect::to('/shop');

    }
    public function show_cart(){

        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('cart.cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_qty(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }

  public function add_cart_ajax(Request $request){
      $data = $request->all();
      $session_id = substr(md5(microtime()),rand(0,26),5);
      $cart = Session::get('cart');
      if($cart==true){
          $is_avaiable = 0;
          foreach($cart as $key => $val){
              if($val['product_id']==$data['cart_product_id']){
                  $is_avaiable++;
              }
          }
          if($is_avaiable == 0){
              $cart[] = array(
                  'session_id' => $session_id,
                  'product_name' => $data['cart_product_name'],
                  'product_id' => $data['cart_product_id'],
                  'product_image' => $data['cart_product_image'],
                  'product_qty' => $data['cart_product_qty'],
                  'product_price' => $data['cart_product_price'],
              );
              Session::put('cart',$cart);
          }
      }else{
          $cart[] = array(
              'session_id' => $session_id,
              'product_name' => $data['cart_product_name'],
              'product_id' => $data['cart_product_id'],
              'product_image' => $data['cart_product_image'],
              'product_qty' => $data['cart_product_qty'],
              'product_price' => $data['cart_product_price'],

          );
          Session::put('cart',$cart);
      }

      Session::save();
  }

  public function cart_ajax(){
      $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

      return view('cart.cart-ajax')->with('category',$cate_product)->with('brand',$brand_product);
  }

  public function update_cart(Request $request)
  {
      $data = $request->all();
      $cart = Session::get('cart');
      if($cart==true){
          foreach($data['cart_qty'] as $key => $qty){
              foreach($cart as $session => $val){
                  if($val['session_id']==$key){
                      $cart[$session]['product_qty'] = $qty;
                  }
              }
          }
          Session::put('cart',$cart);
          return redirect()->back()->with('message','Cập nhật số lượng thành công');
      }else{
          return redirect()->back()->with('message','Cập nhật số lượng thất bại');
      }
  }
    public function delete_pro_cart($session_id){
        $cart = Session::get('cart');

        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');

        }else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }
    }

}
