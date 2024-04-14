<?php

use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\cataloguecontroller;
use App\Http\Controllers\homepagecontroller;
use App\Http\Controllers\productpagecontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\receiptscontroller;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\checkoutcontroller;
use App\Http\Controllers\ownercontroller;
use App\Models\user;
use App\Models\clothes;
use App\Models\colors;

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

route::any('/',[logincontroller::class, 'displaylogin'])->name('login');
route::post('/loginfunc',[logincontroller::class, 'login'])->name('loginfunc');
route::any('/logincustomerror',[logincontroller::class, 'customerror'])->name('logincustomerror');;

route::post('/catalogue',[homepagecontroller::class,'cataloguefunc']);
route::view('/homepage','homepage');
route::post('/homepage',[homepagecontroller::class,'displayhomepage']);
route::post('/productpage',[productpagecontroller::class,'productmain']);
route::post('/addtocart',[cartcontroller::class,'addtocart']);
route::post('/cart_delete',[cartcontroller::class,'cartdelete']);
route::post('/purchasefunction',[cartcontroller::class,'purchasefunction']);
route::post('/receipts',[receiptscontroller::class,'displayreceipts']);
route::view('/receipticon', 'receipticon');
route::any('/cart',[cartcontroller::class,'displaycart'])->name('displaycart');
route::post('/update_quantity',[cartcontroller::class,'update_quantity']);
Route::any('/registerform', [registercontroller::class, 'showRegistrationForm'])->name('registerpage');
Route::post('/register', [registercontroller::class, 'register']);
Route::any('/displaycheckout', [checkoutcontroller::class, 'displaycheckout'])->name('displaycheckout');
Route::post('/checkoutfunction', [checkoutcontroller::class, 'checkoutfunction']);
route::any('/owner',[ownercontroller::class, 'ownerdisplaylogin'])->name('ownerlogin');
route::post('/ownerloginfunc',[ownercontroller::class, 'ownerlogin'])->name('ownerloginfunc');
route::any('/ownerlogincustomerror',[ownercontroller::class, 'ownercustomerror'])->name('ownerlogincustomerror');
route::post('/ownerhomepage',[ownercontroller::class,'displayownerhomepage']);
route::post('/ownerdisplayaddclothes',[ownercontroller::class,'ownerdisplayaddclothes'])->name('ownerdisplayaddclothes');
route::post('/ownerdisplayremoveclothes',[ownercontroller::class,'ownerdisplayremoveclothes']);
route::post('/owneraddclothes',[ownercontroller::class,'owneraddclothes']);
route::post('/ownerremoveclothes',[ownercontroller::class,'ownerremoveclothes']);



/*Route::middleware(['auth', 'verified'])->group(function () {
    // Routes that require email verification
});*/
