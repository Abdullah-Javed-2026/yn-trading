<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Str;
use Helper;
class CartController extends Controller
{
    protected $product=null;
    public function __construct(Product $product){
        $this->product=$product;
    }

    public function addToCart(Request $request){
        if (empty($request->slug)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }        
        $product = Product::where('slug', $request->slug)->first();
        if (empty($product)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }

        if (Auth::check()) {
            $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();
            if($already_cart) {
                $already_cart->quantity = $already_cart->quantity + 1;
                $after_price = ($product->price - ($product->price * $product->discount) / 100);
                $already_cart->amount = $after_price * $already_cart->quantity;
                if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $already_cart->save();
            } else {
                $cart = new Cart;
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $product->id;
                $cart->price = ($product->price-($product->price*$product->discount)/100);
                $cart->quantity = 1;
                $cart->amount=$cart->price*$cart->quantity;
                if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $cart->save();
                Wishlist::where('user_id',auth()->user()->id)->where('cart_id',null)->update(['cart_id'=>$cart->id]);
            }
        } else {
            $cart = session()->get('guest_cart', []);
            $price = ($product->price - ($product->price * $product->discount) / 100);
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
                $cart[$product->id]['amount'] = $cart[$product->id]['quantity'] * $price;
            } else {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'product_id' => $product->id,
                    'product' => $product,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'photo' => $product->photo,
                    'price' => $price,
                    'amount' => $price,
                    'quantity' => 1,
                    'summary' => $product->summary
                ];
            }
            session()->put('guest_cart', $cart);
        }
        request()->session()->flash('success','Product has been added to cart');
        return back();       
    }  

    public function singleAddToCart(Request $request){
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);
        $product = Product::where('slug', $request->slug)->first();
        $qty = isset($request->quant[1]) ? (int)$request->quant[1] : 1;
        if($product->stock < $qty){
            return back()->with('error','Out of stock, You can add other products.');
        }
        if ( ($qty < 1) || empty($product) ) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }    

        if (Auth::check()) {
            $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();
            if($already_cart) {
                $already_cart->quantity = $already_cart->quantity + $qty;
                $after_price = ($product->price - ($product->price * $product->discount) / 100);
                $already_cart->amount = $after_price * $already_cart->quantity;
                if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $already_cart->save();
            } else {
                $cart = new Cart;
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $product->id;
                $cart->price = ($product->price-($product->price*$product->discount)/100);
                $cart->quantity = $qty;
                $cart->amount = $cart->price * $qty;
                if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $cart->save();
            }
        } else {
            $cart = session()->get('guest_cart', []);
            $price = ($product->price - ($product->price * $product->discount) / 100);
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $qty;
                $cart[$product->id]['amount'] = $cart[$product->id]['quantity'] * $price;
            } else {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'product_id' => $product->id,
                    'product' => $product,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'photo' => $product->photo,
                    'price' => $price,
                    'amount' => $price * $qty,
                    'quantity' => $qty,
                    'summary' => $product->summary
                ];
            }
            session()->put('guest_cart', $cart);
        }
        request()->session()->flash('success','Product has been added to cart.');
        return back();       
    } 
    
    public function cartDelete(Request $request){
        if (Auth::check()) {
            $cart = Cart::find($request->id);
            if ($cart) {
                $cart->delete();
                request()->session()->flash('success','Cart removed successfully');
                return back();  
            }
        } else {
            $cart = session()->get('guest_cart', []);
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('guest_cart', $cart);
                request()->session()->flash('success','Cart removed successfully');
                return back();
            }
        }
        request()->session()->flash('error','Error please try again');
        return back();       
    }     

    public function cartUpdate(Request $request){
        if($request->quant){
            $error = array();
            $success = '';
            if (Auth::check()) {
                foreach ($request->quant as $k=>$quant) {
                    $id = $request->qty_id[$k];
                    $cart = Cart::find($id);
                    if($quant > 0 && $cart) {
                        if($cart->product->stock < $quant){
                            request()->session()->flash('error','Out of stock');
                            return back();
                        }
                        $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                        if ($cart->product->stock <=0) continue;
                        $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                        $cart->amount = $after_price * $quant;
                        $cart->save();
                        $success = 'Cart updated successfully!';
                    }else{
                        $error[] = 'Cart Invalid!';
                    }
                }
            } else {
                $guest_cart = session()->get('guest_cart', []);
                foreach ($request->quant as $k=>$quant) {
                    $id = $request->qty_id[$k];
                    if (isset($guest_cart[$id]) && $quant > 0) {
                        $guest_cart[$id]['quantity'] = $quant;
                        $guest_cart[$id]['amount'] = $guest_cart[$id]['price'] * $quant;
                        $success = 'Cart updated successfully!';
                    }
                }
                session()->put('guest_cart', $guest_cart);
            }
            return back()->with($error)->with('success', $success);
        }else{
            return back()->with('Cart Invalid!');
        }    
    }

    // public function addToCart(Request $request){
    //     // return $request->all();
    //     if(Auth::check()){
    //         $qty=$request->quantity;
    //         $this->product=$this->product->find($request->pro_id);
    //         if($this->product->stock < $qty){
    //             return response(['status'=>false,'msg'=>'Out of stock','data'=>null]);
    //         }
    //         if(!$this->product){
    //             return response(['status'=>false,'msg'=>'Product not found','data'=>null]);
    //         }
    //         // $session_id=session('cart')['session_id'];
    //         // if(empty($session_id)){
    //         //     $session_id=Str::random(30);
    //         //     // dd($session_id);
    //         //     session()->put('session_id',$session_id);
    //         // }
    //         $current_item=array(
    //             'user_id'=>auth()->user()->id,
    //             'id'=>$this->product->id,
    //             // 'session_id'=>$session_id,
    //             'title'=>$this->product->title,
    //             'summary'=>$this->product->summary,
    //             'link'=>route('product-detail',$this->product->slug),
    //             'price'=>$this->product->price,
    //             'photo'=>$this->product->photo,
    //         );
            
    //         $price=$this->product->price;
    //         if($this->product->discount){
    //             $price=($price-($price*$this->product->discount)/100);
    //         }
    //         $current_item['price']=$price;

    //         $cart=session('cart') ? session('cart') : null;

    //         if($cart){
    //             // if anyone alreay order products
    //             $index=null;
    //             foreach($cart as $key=>$value){
    //                 if($value['id']==$this->product->id){
    //                     $index=$key;
    //                 break;
    //                 }
    //             }
    //             if($index!==null){
    //                 $cart[$index]['quantity']=$qty;
    //                 $cart[$index]['amount']=ceil($qty*$price);
    //                 if($cart[$index]['quantity']<=0){
    //                     unset($cart[$index]);
    //                 }
    //             }
    //             else{
    //                 $current_item['quantity']=$qty;
    //                 $current_item['amount']=ceil($qty*$price);
    //                 $cart[]=$current_item;
    //             }
    //         }
    //         else{
    //             $current_item['quantity']=$qty;
    //             $current_item['amount']=ceil($qty*$price);
    //             $cart[]=$current_item;
    //         }

    //         session()->put('cart',$cart);
    //         return response(['status'=>true,'msg'=>'Cart successfully updated','data'=>$cart]);
    //     }
    //     else{
    //         return response(['status'=>false,'msg'=>'You need to login first','data'=>null]);
    //     }
    // }

    // public function removeCart(Request $request){
    //     $index=$request->index;
    //     // return $index;
    //     $cart=session('cart');
    //     unset($cart[$index]);
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('success','Successfully remove item');
    // }

    public function checkout(Request $request){
        // $cart=session('cart');
        // $cart_index=\Str::random(10);
        // $sub_total=0;
        // foreach($cart as $cart_item){
        //     $sub_total+=$cart_item['amount'];
        //     $data=array(
        //         'cart_id'=>$cart_index,
        //         'user_id'=>$request->user()->id,
        //         'product_id'=>$cart_item['id'],
        //         'quantity'=>$cart_item['quantity'],
        //         'amount'=>$cart_item['amount'],
        //         'status'=>'new',
        //         'price'=>$cart_item['price'],
        //     );

        //     $cart=new Cart();
        //     $cart->fill($data);
        //     $cart->save();
        // }
        return view('frontend.pages.checkout');
    }
}
