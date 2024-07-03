<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
    public function viewLogin() {

        return view('admins.login');
    }

    public function checkLogin(Request $request) {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect() -> route('admins.dashboard');
        }

        return redirect()->back()->with(['error' => 'error logging in']);

    }

    public function index() {

        $productsCount = Product::select()->count();
        $ordersCount = Order::select()->count();
        $bookingsCount = Booking::select()->count();
        $adminsCount = Admin::select()->count();

        return view('admins.index', compact('productsCount', 'ordersCount', 'bookingsCount', 'adminsCount'));
    }

    public function displayAllAdmins() {

        $AllAdmins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.alladmins', compact('allAdmins'));
    }

    public function createAdmins() {

        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request) {
        Request()->validate([
            'name' =>'required|max:40',
            'email' =>'required|max:40',
            'password' =>'required|max:40',
        ]);

        $storeAdmins = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($storeAdmins) {
            return Redirect::route('all.admins') ->with(['success' => 'Admin created successfully']);
        }

        return view('admins.createadmins');
    }

    public function displayAllOrders() {

        $AllOrders = Order::select()->orderBy('id', 'desc')->get();

        return view('admins.allorders', compact('allOrders'));
    }

    public function editOrders($id) {

        $order = Order::find($id);

        return view('admins.editorders', compact('order'));
    }

    public function updateOrders(Request $request, $id) {

        $order = Order::find($id);
        $order->update($request->all());

        if($order) {
            return Redirect::route('all.orders') ->with(['update' => 'Order updated successfully']);
        }

        /* return view('admins.editorders', compact('order')); */
    }

    public function deleteOrder($id){
        $deleteOrder = Order::find($id);

        if($deleteOrder->delete()) {
            return Redirect::route('all.orders') ->with(['delete' => 'Order deleted successfully']);
        }

        return Redirect::route('all.orders');
    }

    public function displayProducts(){
        $products = Product::select()->orderBy('id', 'desc')->get();

        return view('admins.allproducts', compact('products'));
    }

    public function createProducts(){

        return view('admins.createproducts');

    }

    public function storeProducts(Request $request) {
        /*  Request()->validate([
            'name' =>'required|max:40',
            'price' =>'required|numeric',
            'quantity' =>'required|numeric',
            'description' =>'required|max:100',
        ]); */

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $storeProducts = Product::create([
            "name" => $request->product_name,
            "price" => $request->price,
            "image" => $myimage,
            "description" => $request->description,
            "type" => $request->type,
        ]);

        if($storeProducts) {
            return Redirect::route('all.products') ->with(['success' => 'Product created successfully']);
        }

        return view('admins.createproducts');
    }

    public function deleteProducts($id) {
        $product = Product::find($id);

        if(File::exists(public_path('assets/images/' . $product->image))){
            File::delete(public_path('assets/images/' . $product->image));
        }else{
            //dd('File does not exists.');
        }
        $product-> delete();

        if($product) {
            return Redirect::route('all.products') ->with(['delete' => 'Product deleted successfully']);
        }

        return Redirect::route('all.products');
    }

    public function displayBookings(){
        $bookings = Booking::select()->orderBy('id', 'desc')->get();

        return view('admins.allbookings', compact('bookings'));
    }

    public function editBooking($id) {

        $booking = Booking::find($id);

        return view('admins.editbooking', compact('booking'));
    }

    public function updateBooking(Request $request, $id) {

        $booking = Booking::find($id);

        if($booking) {
            return Redirect::route('all.bookings') ->with(['update' => 'Booking Status updated successfully']);
        }
    }

    public function deleteBooking($id) {
        $booking = Booking::find($id);
        $booking-> delete();

        if($booking) {
            return Redirect::route('all.bookings') ->with(['delete' => 'Booking deleted successfully']);
        }

    }
}

