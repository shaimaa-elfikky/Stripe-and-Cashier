<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Cart;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $courses = Course::all();
    
   // $carts = Cart::where('session_id', session()->getId())->first();

    return view('home',compact('courses'));
})->name('home');


// COURSES

Route::controller(CoursesController::class)->group( function(){
    Route::get('/courses/{course:slug}','show')->name('courses.show');
});


//CARTS MANGEMENTS 
Route::controller(CartController::class)->group( function(){

    Route::get('/cart', 'index')->name('cart.index');

    Route::get('/addToCart/{course:slug}','addToCart')->name('addToCart');

    Route::get('/removeFromCart/{course:slug}','removeFromCart')->name('removeFromCart');

});



//CHWCKOUT MANGEMENTS 
Route::controller(CheckoutController::class)->group( function(){

    Route::get('/checkout', 'checkout')->middleware('auth')->name('checkout');
    Route::get('/checkout.success', 'success')->middleware('auth')->name('checkout.success');
    Route::get('/checkout.cancel', 'cancel')->middleware('auth')->name('checkout.cancel');

});





// });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
