<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CounterController;

use App\Http\Controllers\Backend\AdminPropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\NearestLocationController;
use App\Http\Controllers\Backend\AminityController;
use App\Http\Controllers\Backend\PurposeController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\TourController;
use App\Http\Controllers\Backend\VideoController;



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


/*================== Start Frontend All Route ==============*/
Route::get('/', [FrontendController::class, 'index'])->name('home');

// category Setting
Route::get('/category/{slug}',[FrontendController::class, 'categoryShow'])->name('user.category.show');
// contact us Setting
Route::get('/contact',[FrontendController::class, 'contactusShow'])->name('user.contactus.show');

// Page Setting
Route::get('/page/{slug}',[FrontendController::class, 'pageAbout'])->name('page.about');

// Page Property Single Page //
Route::get('/property/single/{slug}',[FrontendController::class, 'pageProperty'])->name('property.single.page');
// Page Blog Single Page //

// tour.details //
Route::get('/tours/details/{slug}',[FrontendController::class, 'pageTour'])->name('tour.details');

Route::get('/tour/blog/{slug}',[FrontendController::class, 'pageBlog'])->name('tour.single.blog');


/*================== Start Backend All Route ==============*/
Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'AminLogout'])->name('admin.logout');
    Route::get('/general-setting', [SettingController::class, 'index'])->name('general.setting');
    Route::post('/update', [SettingController::class, 'update'])->name('update.setting');
});

/* ==================== Admin Pages  All Routes =================== */
Route::prefix('pages')->group(function(){
    Route::get('/index', [PagesController::class, 'index'])->name('pages.index');
    Route::get('/create', [PagesController::class, 'create'])->name('pages.create');
    Route::post('/store', [PagesController::class, 'store'])->name('pages.store');
    Route::get('/view/{id}', [PagesController::class, 'show'])->name('pages.view');
    Route::get('/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
    Route::post('/update/{id}',[PagesController::class, 'update'])->name('pages.update');
    Route::get('/delete/{id}', [PagesController::class, 'destroy'])->name('pages.delete');
    Route::get('/pages_active/{id}', [PagesController::class, 'active'])->name('pages.active');
    Route::get('/pages_inactive/{id}', [PagesController::class, 'inactive'])->name('pages.in_active');
});

/* ==================== Admin Pages  BlogController =================== */
Route::prefix('blog')->group(function(){
    Route::get('/index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/update/{id}',[BlogController::class, 'update'])->name('blog.update');
    Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    Route::get('/blog_active/{id}', [BlogController::class, 'active'])->name('blog.active');
    Route::get('/blog_inactive/{id}', [BlogController::class, 'inactive'])->name('blog.in_active');
    Route::get('/view/{id}', [BlogController::class, 'view'])->name('blog.view');
});

/* ==================== Admin Pages  BlogController =================== */
Route::prefix('blog-category')->group(function(){
    Route::get('/index', [BlogCategoryController::class, 'index'])->name('blog.category.index');
    Route::get('/create', [BlogCategoryController::class, 'create'])->name('blog.category.create');
    Route::post('/store', [BlogCategoryController::class, 'store'])->name('blog.category.store');
    Route::get('/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog.category.edit');
    Route::post('/update/{id}',[BlogCategoryController::class, 'update'])->name('blog.category.update');
    Route::get('/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('blog.category.delete');
    Route::get('/blog_active/{id}', [BlogCategoryController::class, 'active'])->name('blog.category.active');
    Route::get('/blog_inactive/{id}', [BlogCategoryController::class, 'inactive'])->name('blog.category.in_active');
    Route::get('/view/{id}', [BlogCategoryController::class, 'view'])->name('blog.category.view');
});

/* ==================== Admin Slider All Routes =================== */
Route::prefix('slider')->group(function(){
    Route::get('/index', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::get('/view/{id}', [SliderController::class, 'view'])->name('slider.view');
    Route::post('/update/{id}',[SliderController::class, 'update'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/slider_active/{id}', [SliderController::class, 'active'])->name('slider.active');
    Route::get('/slider_inactive/{id}', [SliderController::class, 'inactive'])->name('slider.in_active');
});

/* ==================== Admin Category All Routes =================== */
Route::prefix('categories')->group(function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/view/{id}', [CategoryController::class, 'view'])->name('category.view');
    Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/categories_active/{id}', [CategoryController::class, 'active'])->name('category.active');
    Route::get('/categories_inactive/{id}', [CategoryController::class, 'inactive'])->name('category.in_active');
});

/* ==================== Admin About All Routes =================== */
Route::prefix('about-us')->group(function(){
    Route::get('/index', [AboutController::class, 'index'])->name('about.index');
    Route::get('/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::get('/view/{id}', [AboutController::class, 'view'])->name('about.view');
    Route::post('/update/{id}',[AboutController::class, 'update'])->name('about.update');
    Route::get('/delete/{id}', [AboutController::class, 'destroy'])->name('about.delete');
    Route::get('/about_active/{id}', [AboutController::class, 'active'])->name('about.active');
    Route::get('/about_inactive/{id}', [AboutController::class, 'inactive'])->name('about.in_active');
});

/* ==================== Admin Services All Routes =================== */
Route::prefix('services')->group(function(){
    Route::get('/index', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('/view/{id}', [ServiceController::class, 'view'])->name('service.view');
    Route::post('/update/{id}',[ServiceController::class, 'update'])->name('service.update');
    Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
    Route::get('/service_active/{id}', [ServiceController::class, 'active'])->name('service.active');
    Route::get('/service_inactive/{id}', [ServiceController::class, 'inactive'])->name('service.in_active');
});

/* ==================== Admin Agent All Routes =================== */
Route::prefix('agents')->group(function(){
    Route::get('/index', [AgentController::class, 'index'])->name('agent.index');
    Route::get('/create', [AgentController::class, 'create'])->name('agent.create');
    Route::post('/store', [AgentController::class, 'store'])->name('agent.store');
    Route::get('/edit/{id}', [AgentController::class, 'edit'])->name('agent.edit');
    Route::get('/view/{id}', [AgentController::class, 'view'])->name('agent.view');
    Route::post('/update/{id}',[AgentController::class, 'update'])->name('agent.update');
    Route::get('/delete/{id}', [AgentController::class, 'destroy'])->name('agent.delete');
    Route::get('/agent_active/{id}', [AgentController::class, 'active'])->name('agent.active');
    Route::get('/agent_inactive/{id}', [AgentController::class, 'inactive'])->name('agent.in_active');
});

/* ==================== Admin Testimonial All Routes =================== */
Route::prefix('testimonials')->group(function(){
    Route::get('/index', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::get('/view/{id}', [TestimonialController::class, 'view'])->name('testimonial.view');
    Route::post('/update/{id}',[TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');
    Route::get('/testimonial_active/{id}', [TestimonialController::class, 'active'])->name('testimonial.active');
    Route::get('/testimonial_inactive/{id}', [TestimonialController::class, 'inactive'])->name('testimonial.in_active');
});

/* ==================== Admin AdminPropertyController All Routes =================== */
Route::resource('property',AdminPropertyController::class);
Route::get('/property/property_active/{id}', [AdminPropertyController::class, 'active'])->name('property.active');
Route::get('/property_inactive/{id}', [AdminPropertyController::class, 'inactive'])->name('property.in_active');
Route::get('/property/view/{id}', [AdminPropertyController::class, 'view'])->name('property.view');
Route::post('/property/update/{id}',[AdminPropertyController::class, 'update'])->name('property.update');
Route::get('/property/delete/{id}', [AdminPropertyController::class, 'destroy'])->name('property.delete');

// ================ start property slider image deleted with ajax ================ //
Route::get('property-slider-img/{id}',[AdminPropertyController::class,'propertySliderImage'])->name('property-slider-img');
Route::get('property-delete-pdf/{id}',[AdminPropertyController::class,'deletePdfFile'])->name('property-delete-pdf');
Route::get('exist-nearest-location/{id}',[AdminPropertyController::class,'existNearestLocation'])->name('exist-nearest-location');
Route::post('update-property/{id}',[AdminPropertyController::class,'update'])->name('property.update');
Route::get('delete-property/{id}',[AdminPropertyController::class,'destroy'])->name('property.delete');
// ================ end property slider image deleted with ajax ================ //

/* ==================== Start PropertyTypeController All Routes =================== */
Route::resource('property-type',PropertyTypeController::class);

Route::get('/property-type_active/{id}', [PropertyTypeController::class, 'active'])->name('property-type.active');
Route::get('/property-type_inactive/{id}', [PropertyTypeController::class, 'inactive'])->name('property-type.in_active');
Route::get('/view/{id}', [PropertyTypeController::class, 'view'])->name('property-type.view');
Route::post('/update/{id}',[PropertyTypeController::class, 'update'])->name('property-type.update');
Route::get('/delete/{id}', [PropertyTypeController::class, 'destroy'])->name('property-type.delete');
/* ==================== End PropertyTypeController All Routes =================== */

/* ==================== Admin BrandController All Routes =================== */
Route::prefix('brands')->group(function(){
    Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
    Route::post('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
    Route::get('/brand_active/{id}', [BrandController::class, 'active'])->name('brand.active');
    Route::get('/brand_inactive/{id}', [BrandController::class, 'inactive'])->name('brand.in_active');
});

/* ==================== Admin CounterController All Routes =================== */
Route::prefix('counters')->group(function(){
    Route::get('/index', [CounterController::class, 'index'])->name('counter.index');
    Route::get('/create', [CounterController::class, 'create'])->name('counter.create');
    Route::post('/store', [CounterController::class, 'store'])->name('counter.store');
    Route::get('/edit/{id}', [CounterController::class, 'edit'])->name('counter.edit');
    Route::get('/view/{id}', [CounterController::class, 'view'])->name('counter.view');
    Route::post('/update/{id}',[CounterController::class, 'update'])->name('counter.update');
    Route::get('/delete/{id}', [CounterController::class, 'destroy'])->name('counter.delete');
    Route::get('/counter_active/{id}', [CounterController::class, 'active'])->name('counter.active');
    Route::get('/counter_inactive/{id}', [CounterController::class, 'inactive'])->name('counter.in_active');
});

/* ==================== Admin nearestlocations All Routes =================== */
Route::prefix('nearestlocations')->group(function(){
    Route::get('/index', [NearestLocationController::class, 'index'])->name('property.nearest.locations.index');
    Route::get('/create', [NearestLocationController::class, 'create'])->name('property.nearest.locations.create');
    Route::post('/store', [NearestLocationController::class, 'store'])->name('property.nearest.locations.store');
    Route::get('/edit/{id}', [NearestLocationController::class, 'edit'])->name('property.nearest.locations.edit');
    Route::get('/view/{id}', [NearestLocationController::class, 'view'])->name('property.nearest.locations.view');
    Route::post('/update/{id}',[NearestLocationController::class, 'update'])->name('property.nearest.locations.update');
    Route::get('/delete/{id}', [NearestLocationController::class, 'destroy'])->name('property.nearest.locations.delete');
    Route::get('/counter_active/{id}', [NearestLocationController::class, 'active'])->name('property.nearest.locations.active');
    Route::get('/counter_inactive/{id}', [NearestLocationController::class, 'inactive'])->name('property.nearest.locations.in_active');
});

/* ==================== Admin nearestlocations All Routes =================== */
Route::prefix('aminitys')->group(function(){
    Route::get('/index', [AminityController::class, 'index'])->name('property.aminity.index');
    Route::get('/create', [AminityController::class, 'create'])->name('property.aminity.create');
    Route::post('/store', [AminityController::class, 'store'])->name('property.aminity.store');
    Route::get('/edit/{id}', [AminityController::class, 'edit'])->name('property.aminity.edit');
    Route::get('/view/{id}', [AminityController::class, 'view'])->name('property.aminity.view');
    Route::post('/update/{id}',[AminityController::class, 'update'])->name('property.aminity.update');
    Route::get('/delete/{id}', [AminityController::class, 'destroy'])->name('property.aminity.delete');
    Route::get('/counter_active/{id}', [AminityController::class, 'active'])->name('property.aminity.active');
    Route::get('/counter_inactive/{id}', [AminityController::class, 'inactive'])->name('property.aminity.in_active');
});

/* ==================== Admin nearestlocations All Routes =================== */
Route::prefix('property-purpose')->group(function(){
    Route::get('/index', [PurposeController::class, 'index'])->name('property.purpose.index');
    Route::get('/create', [PurposeController::class, 'create'])->name('property.purpose.create');
    Route::post('/store', [PurposeController::class, 'store'])->name('property.purpose.store');
    Route::get('/edit/{id}', [PurposeController::class, 'edit'])->name('property.purpose.edit');
    Route::get('/view/{id}', [PurposeController::class, 'view'])->name('property.purpose.view');
    Route::post('/update/{id}',[PurposeController::class, 'update'])->name('property.purpose.update');
    Route::get('/delete/{id}', [PurposeController::class, 'destroy'])->name('property.purpose.delete');
    Route::get('/counter_active/{id}', [PurposeController::class, 'active'])->name('property.purpose.active');
    Route::get('/counter_inactive/{id}', [PurposeController::class, 'inactive'])->name('property.purpose.in_active');
});

/* ==================== Admin country All Routes =================== */
Route::prefix('country')->group(function(){
    Route::get('/index', [CountryController::class, 'index'])->name('location.country.index');
    Route::get('/create', [CountryController::class, 'create'])->name('location.country.create');
    Route::post('/store', [CountryController::class, 'store'])->name('location.country.store');
    Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('location.country.edit');
    Route::get('/view/{id}', [CountryController::class, 'view'])->name('location.country.view');
    Route::post('/update/{id}',[CountryController::class, 'update'])->name('location.country.update');
    Route::get('/delete/{id}', [CountryController::class, 'destroy'])->name('location.country.delete');
    Route::get('/countery_active/{id}', [CountryController::class, 'active'])->name('location.country.active');
    Route::get('/country_inactive/{id}', [CountryController::class, 'inactive'])->name('location.country.in_active');
});

/* ==================== Admin country All Routes =================== */
Route::prefix('state')->group(function(){
    Route::get('/index', [StateController::class, 'index'])->name('location.state.index');
    Route::get('/create', [StateController::class, 'create'])->name('location.state.create');
    Route::post('/store', [StateController::class, 'store'])->name('location.state.store');
    Route::get('/edit/{id}', [StateController::class, 'edit'])->name('location.state.edit');
    Route::get('/view/{id}', [StateController::class, 'view'])->name('location.state.view');
    Route::post('/update/{id}',[StateController::class, 'update'])->name('location.state.update');
    Route::get('/delete/{id}', [StateController::class, 'destroy'])->name('location.state.delete');
    Route::get('/state_active/{id}', [StateController::class, 'active'])->name('location.state.active');
    Route::get('/state_inactive/{id}', [StateController::class, 'inactive'])->name('location.state.in_active');
});

/* ==================== Admin city All Routes =================== */
Route::prefix('city')->group(function(){
    Route::get('/index', [CityController::class, 'index'])->name('location.city.index');
    Route::get('/create', [CityController::class, 'create'])->name('location.city.create');
    Route::post('/store', [CityController::class, 'store'])->name('location.city.store');
    Route::get('/edit/{id}', [CityController::class, 'edit'])->name('location.city.edit');
    Route::get('/view/{id}', [CityController::class, 'view'])->name('location.city.view');
    Route::post('/update/{id}',[CityController::class, 'update'])->name('location.city.update');
    Route::get('/delete/{id}', [CityController::class, 'destroy'])->name('location.city.delete');
    Route::get('/city_active/{id}', [CityController::class, 'active'])->name('location.city.active');
    Route::get('/city_inactive/{id}', [CityController::class, 'inactive'])->name('location.city.in_active');
});

/* ==================== Admin city All Routes =================== */
Route::prefix('sections')->group(function(){
    Route::get('/index', [SectionController::class, 'index'])->name('section.index');
    Route::get('/create', [SectionController::class, 'create'])->name('section.create');
    Route::post('/store', [SectionController::class, 'store'])->name('section.store');
    Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
    Route::get('/view/{id}', [SectionController::class, 'view'])->name('section.view');
    Route::post('/update/{id}',[SectionController::class, 'update'])->name('section.update');
    Route::get('/delete/{id}', [SectionController::class, 'destroy'])->name('section.delete');
    Route::get('/section_active/{id}', [SectionController::class, 'active'])->name('section.active');
    Route::get('/section_inactive/{id}', [SectionController::class, 'inactive'])->name('section.in_active');
});

/* ==================== Admin Tour All Routes =================== */
Route::prefix('tours')->group(function(){
    Route::get('/index', [TourController::class, 'index'])->name('tour.index');
    Route::get('/create', [TourController::class, 'create'])->name('tour.create');
    Route::post('/store', [TourController::class, 'store'])->name('tour.store');
    Route::get('/edit/{id}', [TourController::class, 'edit'])->name('tour.edit');
    Route::get('/view/{id}', [TourController::class, 'view'])->name('tour.view');
    Route::post('/update/{id}',[TourController::class, 'update'])->name('tour.update');
    Route::get('/delete/{id}', [TourController::class, 'destroy'])->name('tour.delete');
    Route::get('/tour_active/{id}', [TourController::class, 'active'])->name('tour.active');
    Route::get('/tour_inactive/{id}', [TourController::class, 'inactive'])->name('tour.in_active');
});

/* ==================== Admin Video All Routes =================== */
Route::prefix('videos')->group(function(){
    Route::get('/index', [VideoController::class, 'index'])->name('video.index');
    Route::get('/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::get('/view/{id}', [VideoController::class, 'view'])->name('video.view');
    Route::post('/update/{id}',[VideoController::class, 'update'])->name('video.update');
    Route::get('/delete/{id}', [VideoController::class, 'destroy'])->name('video.delete');
    Route::get('/video_active/{id}', [VideoController::class, 'active'])->name('video.active');
    Route::get('/video_inactive/{id}', [VideoController::class, 'inactive'])->name('video.in_active');
});




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
