<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BackBannerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
// about
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('website.about');
// product
Route::get('/products', [HomeController::class, 'products'])->name('website.products');
Route::get('/category/{id}/products', [HomeController::class, 'ProductCat'])->name('category.product');
Route::get('/product-details/{id}', [HomeController::class, 'ProductDetails'])->name('product.details');
// photo gallery
Route::get('/photo-gallery', [HomeController::class, 'photoGallery'])->name('website.gallery');
// committee member
Route::get('/management-list', [HomeController::class, 'committee'])->name('website.committee');
Route::get('/blood-bank', [SearchController::class, 'search'])->name('website.blood');
Route::post('/search-blood', [SearchController::class, 'searchQuery'])->name('blood.search');
Route::get('/search-blood-donor', [SearchController::class, 'searchResult'])->name('blood.search.donor');
// news
Route::get('/news-list', [HomeController::class, 'news'])->name('website.news');
Route::get('/news-details/{slug}', [HomeController::class, 'newsDetails'])->name('website.news-details');

// registration route
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register-store', [MemberController::class, 'memberStore'])->name('member.store');
// contact route
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-store', [ContactController::class, 'contactStore'])->name('contact.store');

// login
Route::get('admin', [AuthenticationController::class, 'login'])->name('login');
Route::post('admin', [AuthenticationController::class, 'AuthCheck'])->name('login.check');

// Admin dashboard route
Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // member list
    Route::get('/member-list', [MemberController::class, 'memberList'])->name('member.list');
    Route::put('/member-approve/{id}', [MemberController::class, 'approveStatus'])->name('member.approve');
    Route::put('/member-pending/{id}', [MemberController::class, 'pendingStatus'])->name('member.pending');
    Route::delete('/member-delete/{member}', [MemberController::class, 'destroy'])->name('member.delete');
    // contact list
    Route::get('/contact-list', [ContactController::class, 'contactList'])->name('contact.list');
    Route::delete('/contact-delete/{contact}', [ContactController::class, 'destroy'])->name('contact.delete');
    // about
    Route::get('/about', [AboutController::class, 'index'])->name('admin.about');
    Route::put('/about-update/{about}', [AboutController::class, 'update'])->name('about.update');
    // logout
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::put('/admin', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    // Management resource route
    Route::resource('/management', CommitteeController::class)->except('create', 'show');
    // photo gallery resource
    Route::resource('/gallery', PhotoGalleryController::class)->except('create', 'show');

    // video
    Route::resource('/video', VideoController::class)->except('create', 'show');
    Route::get('/video-status/{id}', [VideoController::class, 'approveStatus'])->name('video.approve');

    // banner resource
    Route::resource('/banner', BannerController::class)->except('create', 'show');
    // news resource
    Route::resource('/news', NewsController::class)->except('create', 'show');

    // category
    Route::resource('/category', CategoryController::class)->except('create', 'show');
    // product resourece
    Route::resource('/product', ProductController::class)->except('create', 'show');
    // company profile
    Route::get('company-profile', [CompanyProfileController::class, 'edit'])->name('company.edit');
    Route::put('company-profile/{company}', [CompanyProfileController::class, 'update'])->name('company.update');
    //Background Banner
    Route::get('back-banner', [BackBannerController::class, 'edit'])->name('back.banner.edit');
    Route::put('back-banner/{backbanner}', [BackBannerController::class, 'update'])->name('back.banner.update');
    // Create user
    Route::get('/registration', [RegistrationController::class, 'index'])->name('register.create');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/registration/delete/{id}', [RegistrationController::class, 'destroy'])->name('register.destroy');

    Route::get('/settings', [RegistrationController::class, 'settings'])->name('settings');
    Route::put('/registration', [RegistrationController::class, 'profileUpdate'])->name('register.update');
});
