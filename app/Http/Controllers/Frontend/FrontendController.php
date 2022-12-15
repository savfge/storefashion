<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Sendcontat;
use App\Mail\Sendorrder;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Commper;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Prodect;
use App\Models\Reply;
use App\Models\Review;
use App\Models\Silder;
use App\Models\State;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Isset_;

class FrontendController extends Controller
{
    public function index()
    {
        $silders = Silder::where('staus',1)->orderBy('id','Desc')->get();
        $bunners = Silder::where('staus',2)->get();
        $categorys = Category::where('staus',1)->orderBy('id','Desc')->get();
        return view('frontend.indexx',compact('silders','bunners','categorys'));
    }
    public function prodctdatils($id)
    {
        $prodect = Prodect::findOrfail($id);
        $porodectretled = Prodect::where('subcategory_id',$prodect->subcategory_id)->get();
        return view('frontend.prodctdatils',compact('prodect','porodectretled'));
    }
    public function cartstore(Request $request)
    {
        $prodect = Prodect::find($request->prodect_id);
        Cart::instance('cart')->add([
            'id' => $prodect->id,
            'name' => $prodect->en_name,
            'price' => $prodect->price,
            'qty' => $request->qty,
            'weight' => 10,
            'options' => [
                'images' => $prodect->image,
            ],
        ]);
        return response()->json(['sms' => $prodect->en_name."<br>Cart Is Created<br>"]);
    }
    public function reviewstore(Request $request)
    {
        $data = array(
            'user_id' => Auth::user()->id,
            'prodect_id' => $request->prodect_id,
            'message' => $request->message,
            'review' => $request->review,
            'name' => $request->name,
        );
        Review::create($data);
        return response()->json(['sms' => "Add New Review IS Created"]);
    }
    public function deletereviewse($id)
    {
        $review = Review::findOrfail($id);
        $review->delete();
        return response()->json(['sms' => "Review Is Deleted"]);
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function update(Request $request)
    {
         $qty = $request->newQty;
         $rowId = $request->newrowId;
         Cart::instance('cart')->update($rowId,$qty);
         return response()->json(['sms' => 'Cart Is Updated']);
    }
    public function delete($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return response()->json(['sms' => 'Cart Is Deleted']);
    }
    public function destory()
    {
        $cartcontde = Cart::instance('cart')->content();
        Cart::instance('cart')->destroy($cartcontde);
        return response()->json(['sms' => 'Cart Is Clear All']);
    }
    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function wishlistore($id)
    {
        $prodect = Prodect::findOrfail($id);
        Cart::instance('wishlist')->add([
            'id' => $id,
            'name' => $prodect->en_name,
            'price' => $prodect->price,
            'weight' => 10,
            'qty' => 2,
            'options' => [
                'images' => $prodect->image,
                'stock' => $prodect->new,
            ],
        ]);
        return response()->json(['sms' => $prodect->en_name.'<br>Add New Wishlist Is Created<br>']);
    }
    public function carts($id)
    {
        $prodect = Prodect::findOrfail($id);
        Cart::instance('cart')->add([
            'id' => $id,
            'name' => $prodect->en_name,
            'price' => $prodect->price,
            'weight' => 10,
            'qty' => 2,
            'options' => [
                'images' => $prodect->image,
            ],
        ]);
        return response()->json(['sms' => $prodect->en_name.'<br>Add New Cart  Is Created<br>']);
    }
    public function deletewishlist($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        return response()->json(['sms' => 'Wishlist Is Deleted']);
    }
    public function shop()
    {
        $shops = Prodect::paginate('12');
        return view('frontend.shop',compact('shops'));
    }
    public function shops($id)
    {
        $shops = Prodect::where('category_id',$id)->get();
        return view('frontend.shops',compact('shops'));
    }
    public function showcolor($id)
    {
        $shops = Prodect::where('color_id',$id)->get();
        return view('frontend.shops',compact('shops'));
    }
    public function showbarndw($id)
    {
        $shops = Prodect::where('barnd_id',$id)->get();
        return view('frontend.shops',compact('shops'));
    }
    public function sortby(Request $request)
    {
        if($request->sortby=='popularity')
        {
            $shops =  Prodect::orderBy('id','Desc')->get();
        }
        if($request->sortby=='ascname')
        {
            $shops = Prodect::orderBy('en_name', 'Asc')->get();
        }
        if($request->sortby=='descname')
        {
            $shops = Prodect::orderBy('en_name', 'DESC')->get();
        }
        if($request->sortby=='ascdate')
        {
            $shops = Prodect::orderBy('created_at','Asc')->get();
        }
        if($request->sortby=='descdate')
        {
            $shops = Prodect::orderBy('created_at', 'DESC')->get();
        }
        if($request->sortby=='ascprice')
        {
            $shops = Prodect::orderBy('price', 'DESC')->get();
           
        }
        if($request->sortby=='descprice')
        {
            $shops = Prodect::orderBy('price','Asc')->get();
        }
        return view('frontend.shops',compact('shops'))->render();
    }
    public function filterprice(Request $request)
    {
        $shops = Prodect::whereBetween('price',[$request->input_left,$request->input_right])->get();
        return view('frontend.shops',compact('shops'))->render();
    }
    public function categorylist()
    {
        $shops = Prodect::paginate('12');
        return view('frontend.categorylist',compact('shops'));
    }
    public function showcatder()
    {
        $shops = Prodect::paginate('12');
        return view('frontend.showcatder',compact('shops'));
    }
    public function shopw()
    {
        $shops = Prodect::paginate('12');
        return view('frontend.shopsew',compact('shops'));
    }
    public function pagefour()
    {
        $shops = Prodect::paginate('12');
        return view('frontend.pagefour',compact('shops'));
    }
    public function account()
    {
        return view('frontend.account');
    }
    public function commperstore(Request $request, $id)
    {
        $data = array(
            'user_id' => Auth::user()->id,
            'prodect_id' => $id,
        );
        Commper::create($data);
        return response()->json(['sms' => 'Commper Is Created']);
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $shops = Prodect::where('en_name','Like','%'.$search.'%')->orwhere('ar_name','Like', '%'.$search.'%')->paginate();
        return view('frontend.search',compact('shops'));
    }
    public function about()
    {
        $abouts = About::where('staus',1)->orderBy('id','Desc')->get();
        $aboutbarnds = About::where('staus',2)->orderBy('id','Desc')->get();
        $aboutteams = About::where('staus',3)->orderBy('id','Desc')->get();
        $aboutteas  =About::where('staus',4)->orderBy('id','Desc')->get();
        return view('frontend.about',compact('abouts','aboutteams','aboutbarnds','aboutteas'));
    }
    public function blog()
    {
        $blogs = Blog::paginate('5');
        return view('frontend.blog',compact('blogs'));
    }
    public function blogsearch(Request $request)
    {
        $blogsearch = $request->blogsearch;
        $blogsedrt = Blog::where('name','Like','%'.$blogsearch.'%')->paginate();
        return view('frontend.blogshow',compact('blogsedrt'));
    }
    public function blogs($id)
    {
        $blog = Blog::findOrfail($id);
        return view('frontend.blogs',compact('blog'));
    }
    public function commentstroe(Request $request)
    {
        $data = array(
            'user_id' => Auth::user()->id,
            'blog_id' => $request->blog_id,
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
        );
        Comment::create($data);
        return response()->json(['sms' => 'Comments Is Created']);
    }
    public function replystore(Request $request)
    {
        $data = array(
            'comment_id' => $request->comment_id,
            'user_id' => Auth::user()->id,
            'commentmessd' => $request->commentmessd,
            'name' => $request->name,
        );
        Reply::create($data);
        return response()->json(['sms' => 'Replies Is Created']);
    }
    public function changepassword(Request $request)
    {
        $hashchangepassword = Auth::user()->password;
        if(Auth::check($request->oldpassword,$hashchangepassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['sms' => 'Change Passwored IS Changed']);
        }
    }

    public function changeaccount(Request $request)
    {
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            {
                $fileExde = $file->getClientOriginalName();
                $fileName = time().'.'.$fileExde;
                $file->move('admin_panel/img/',$fileName);
                Auth::user()->image = $fileName;
            }
        }
        Auth::user()->name = $request->input('name');
        Auth::user()->lname = $request->input('lname');
        Auth::user()->email = $request->input('email');
        Auth::user()->phone = $request->input('phone');
        Auth::user()->address = $request->input('address');
        Auth::user()->address2 = $request->input('address2');
        Auth::user()->update();
         return response()->json(['sms' => 'Change User Account IS Changed']);
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function featchstate(Request $request ,$id)
    {
        $countrys = State::where('country_id',$id)->get();
        return view('frontend.featchstate',compact('countrys'));
    }
    public function cityfeath($id)
    {
        $countrys = City::where('state_id',$id)->get();
        return view('frontend.cityfeath',compact('countrys'));
    } 
    public function checkoutstroe(Request $request)
    {
        $order = new Order();
        $order->country_id = $request->input('country_id');
        $order->city_id = $request->input('city_id');
        $order->state_id = $request->input('state_id');
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->postcode = $request->input('postcode');
        $order->phone = $request->input('phone');
        $order->staus = 'Cashe And Drivery';
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->address2 = $request->input('address2');
        $order->compny_name = $request->input('compny_name');
        $order->note  = $request->input('note');
        $order->save();
        foreach(Cart::instance('cart')->content() as $item)
        {
            $data = [
                'order_id' => $order->id,
                'user_id' => Auth::user()->id,
                'prodect_id' => $item->id,
                'qty' => $item->qty,
                'amount' => $item->price,
                'total' => $item->price * $item->qty,
            ];
            OrderItem::create($data);
        }
        $transation = new Transaction();
        $transation->user_id = Auth::user()->id;
        $transation->order_id = $order->id;
        $transation->mode = 'Cashe Dreivery';
        $transation->staus = 'Pandding';
        $transation->save();
        Cart::instance('cart')->destroy();
        return response()->json(['sms' => 'Checkout IS Created']);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function contactstore(Request $request)
    {
        $contact = new Contact();
        $contact->name =  $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');  
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->user_id = Auth::user()->id;
        Mail::to($contact->email)->send(new Sendcontat($contact));
        return response()->json(['sms' => 'Contact Is  Created']);
    }
    public function order($id)
    {
        $order = Order::findOrfail($id);
        return view('frontend.order',compact('order'));
    }
    public function sendemail($id)
    {
        $order = Order::findOrfail($id);
        $order->save();
        Mail::to($order->email)->send(new Sendorrder($order));
        return redirect()->back();
    }
    public function deletecommper($id)
    {
        $commper = Commper::findOrfail($id);
        $commper->delete();
        return response()->json(['sms' => 'Commper Is Deleted']);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['sms' => 'Logout Page Is Successed']);
    }
}
