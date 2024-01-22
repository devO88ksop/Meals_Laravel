    <?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UI\ProductController as UIProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/ui/product', [UIProductController::class, 'index']);
Route::get('/ui/cart', [UIProductController::class, 'cart'])->name('cart');
Route::get('/ui/add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/ui/update-cart', [UIProductController::class, 'update'])->name('update.cart');
Route::delete('ui/remove-from-cart',[UIProductController::class, 'remove'])->name('remove.from.cart');
Route::post('ui/checkout',[UIProductController::class,'checkout'])->name('checkout.from.cart');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    });
// Route::redirect('/', 'admin/dashboard');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);

    });

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admins', AdminController::class);

