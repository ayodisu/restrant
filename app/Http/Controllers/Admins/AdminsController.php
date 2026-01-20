<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Food\Booking;
use App\Models\Food\Checkout;
use App\Models\Food\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {

        //Fooods Count
        $foodCount = Food::select()->count();
        $checkoutCount = Checkout::select()->count();
        $bookingsCount = Booking::select()->count();
        $adminCount = Admin::select()->count();

        return view('admins.index', compact('foodCount', 'adminCount', 'bookingsCount', 'checkoutCount'));
    }

    //Admins
    public function allAdmins()
    {
        $admins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.alladmins', compact('admins'));
    }

    public function createAdmins()
    {

        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request)
    {

        Request()->validate([

            "name" => "required|max:40",
            "email" => "required|max:40",
            "password" => "required"
        ]);

        $admins = Admin::create([

            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        if ($admins) {
            return redirect()->route('admins.all')->with(['success' => 'Admin added successfully']);
        }
    }

    //orders
    public function allOrders()
    {
        $orders = Checkout::select()->orderBy('id', 'desc')->get();

        return view('admins.allorders', compact('orders'));
    }

    public function editOrders($id)
    {
        $order = Checkout::find($id);

        return view('admins.editorders', compact('order'));
    }

    public function updateOrders(Request $request, $id)
    {
        $order = Checkout::find($id);
        if (!$order) {
            return redirect()->route('orders.all')->with(['error' => 'Order not found.']);
        }
        $order->update($request->only(['status']));

        return redirect()->route('orders.all')->with(['success' => 'Updated!']);
    }

    public function deleteOrders($id)
    {
        $order = Checkout::find($id);
        $order->delete();

        if ($order) {
            return redirect()->route('orders.all')->with(['success' => 'Deleted!']);
        }
    }

    //Bookings
    public function allBookings()
    {
        $bookings = Booking::select()->orderBy('id', 'desc')->get();

        return view('admins.allbookings', compact('bookings'));
    }

    public function editBookings($id)
    {
        $bookings = Booking::find($id);

        return view('admins.editbookings', compact('bookings'));
    }

    public function updateBookings(Request $request, $id)
    {
        $bookings = Booking::find($id);
        if (!$bookings) {
            return redirect()->route('bookings.all')->with(['error' => 'Booking not found.']);
        }
        $bookings->update($request->only(['status']));

        return redirect()->route('bookings.all')->with(['success' => 'Updated!']);
    }

    public function deleteBookings($id)
    {
        $bookings = Booking::find($id);
        $bookings->delete();

        if ($bookings) {
            return redirect()->route('bookings.all')->with(['success' => 'Deleted!']);
        }
    }

    //Foods 
    public function allFoods()
    {
        $foods = Food::select()->orderBy('id', 'desc')->get();

        return view('admins.allfoods', compact('foods'));
    }

    public function createFoods()
    {
        return view('admins.createfoods');
    }

    public function storeFoods(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|max:500',
            'category' => 'required|in:Breakfast,Lunch,Dinner',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $destinationPath = 'assets/img/';
        $myimage = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $foods = Food::create([

            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "category" => $request->category,
            "image" => $myimage
        ]);

        if ($foods) {
            return redirect()->route('all.foods')->with(['success' => 'Food added successfully']);
        }
    }


    public function deleteFoods($id)
    {
        // Find the food item by ID
        $food = Food::find($id);

        // Check if the food item exists
        if (!$food) {
            return redirect()->route('all.foods')->with(['error' => 'Food item not found.']);
        }

        // Get the image file path
        $imagePath = public_path('assets/img/' . $food->image);

        // Check if the image file exists before attempting to delete
        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
        } else {
            // Image file doesn't exist, but we'll still delete the database record
        }

        // Delete the food item from the database
        $food->delete();

        // Check if the food item and image deletion were successful
        if ($food) {

            return redirect()->route('all.foods')->with(['delete' => 'Item Deleted!']);
        } else {

            return redirect()->route('all.foods')->with(['error' => 'Failed to delete item.']);
        }
    }
}
