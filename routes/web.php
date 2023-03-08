<?php
use Illuminate\Support\Facades\Route;
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

//-----------------------------------------------AUTHENTICATION---------------------------------------------------------------------

Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';

//-----------------------------------------------CUSTOMER---------------------------------------------------------------------
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\CustomerBlog;
use App\Http\Controllers\Customer\CustomerEvent;

Route::get('/', [CustomerController::class, 'landingPage'])->name('landingPage');
Route::get('about', [CustomerController::class, 'about'])->name('about');
Route::get('contact', [CustomerController::class, 'contact'])->name('contact');
Route::get('services', [CustomerController::class, 'services'])->name('services');

Route::group(['prefix' => 'customer'], function()
{
    Route::group(['prefix' => 'events'], function()
    {
        Route::get('all', [CustomerEvent::class, 'index']);
        Route::get('filter/{eventCategory}', [CustomerEvent::class, 'filterByCategory']);
        Route::get('{eventID}', [CustomerEvent::class, 'show']);
    });

    Route::group(['prefix' => 'blogs'], function()
    {
        Route::get('/', [CustomerBlog::class, 'blogDashboard']);
        Route::get('all', [CustomerBlog::class, 'indexBlogs']);
        Route::get('filter/{categoryID}', [CustomerBlog::class, 'filterBlogs']);
        Route::get('/{blogID}', [CustomerBlog::class, 'showBlogs']);
        Route::post('add/comment', [CustomerBlog::class, 'addComment']);
    });

});

//-----------------------------------------------ADMIN---------------------------------------------------------------------
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Pages\AdminHomeController;
use App\Http\Controllers\Admin\Pages\AdminServicesController;
use App\Http\Controllers\Admin\Pages\AdminAboutController;
use App\Http\Controllers\Admin\Pages\AdminFooterController;
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //Pages
    Route::get('pages', [AdminController::class, 'pages']);
    Route::group(['prefix' => 'page'], function()
    {
        Route::group(['prefix' => 'home'], function()
        {
            Route::get('/', [AdminHomeController::class, 'index']);
            Route::get('edit', [AdminHomeController::class, 'editIntro']);
            Route::post('edit', [AdminHomeController::class, 'storeIntro']);

            Route::group(['prefix' => 'testimonial'], function()
            {
                Route::get('create', [AdminHomeController::class, 'create']);
                Route::post('create', [AdminHomeController::class, 'add']);
                Route::get('edit/{tesiomonialID}', [AdminHomeController::class, 'editTestimonial']);
                Route::post('edit/{tesiomonialID}', [AdminHomeController::class, 'storeTestimonial']);
                Route::post('remove/{tesiomonialID}', [AdminHomeController::class, 'removeTestimonial']);
            });
        });

        Route::group(['prefix' => 'services'], function()
        {
            Route::get('/', [AdminServicesController::class, 'index']);
            Route::get('create', [AdminServicesController::class, 'create']);
            Route::post('create', [AdminServicesController::class, 'add']);
            Route::post('remove/{serviceID}', [AdminServicesController::class, 'remove']);
            Route::get('edit/{serviceID}', [AdminServicesController::class, 'edit']);
            Route::post('edit/{serviceID}', [AdminServicesController::class, 'store']);

        });

        Route::group(['prefix' => 'about'], function()
        {
            Route::get('/', [AdminAboutController::class, 'index']);
            Route::get('edit', [AdminAboutController::class, 'editAbout']);
            Route::post('edit', [AdminAboutController::class, 'storeAbout']);

            Route::group(['prefix' => 'team'], function()
            {
                Route::get('create', [AdminAboutController::class, 'create']);
                Route::post('create', [AdminAboutController::class, 'add']);
                Route::get('edit/{memberID}', [AdminAboutController::class, 'editMember']);
                Route::post('edit/{memberID}', [AdminAboutController::class, 'storeMember']);
                Route::post('remove/{memberID}', [AdminAboutController::class, 'removeMember']);
            });
        });

        Route::group(['prefix' => 'contact'], function()
        {
            Route::get('/', [AdminController::class, 'contact']);
        });

        Route::group(['prefix' => 'footer'], function()
        {
            Route::get('/', [AdminFooterController::class, 'index']);
            Route::get('edit', [AdminFooterController::class, 'edit']);
            Route::post('edit', [AdminFooterController::class, 'store']);
        });

    });

    // Events
    Route::get('events', [AdminEventController::class, 'indexEvent']);
    Route::group(['prefix' => 'event'], function()
    {
        Route::get('categories', [AdminEventController::class, 'indexCategories']);
        Route::get('create', [AdminEventController::class, 'createEvent']);
        Route::post('create', [AdminEventController::class, 'addEvent']);

        Route::get('/{eventID}', [AdminEventController::class, 'showEvent']);
        Route::post('remove/{eventID}', [AdminEventController::class, 'removeEvent']);

        Route::get('edit/{eventID}', [AdminEventController::class, 'editEvent']);
        Route::post('edit/{eventID}', [AdminEventController::class, 'store']);


        Route::group(['prefix' => 'category'], function()
        {
            Route::get('add', [AdminEventController::class, 'createCategory']);
            Route::post('add', [AdminEventController::class, 'addCategory']);
            Route::post('remove/{blogCategoryID}', [AdminEventController::class, 'removeCategory']);
        });

    });
    //Blogs
    Route::get('blogs', [AdminBlogController::class, 'indexBlogs']);
    Route::group(['prefix' => 'blog'], function()
    {
        Route::get('categories', [AdminBlogController::class, 'indexCategories']);

        Route::get('create', [AdminBlogController::class, 'createBlog']);
        Route::post('create', [AdminBlogController::class, 'addBlog']);

        Route::get('/{blogID}', [AdminBlogController::class, 'showBlog']);
        Route::post('remove/{blogID}', [AdminBlogController::class, 'removeBlog']);

        Route::get('edit/{blogID}', [AdminBlogController::class, 'editBlog']);
        Route::post('edit/{blogID}', [AdminBlogController::class, 'store']);


        Route::group(['prefix' => 'category'], function()
        {
            Route::get('add', [AdminBlogController::class, 'createCategory']);
            Route::post('add', [AdminBlogController::class, 'addCategory']);
            Route::post('remove/{blogCategoryID}', [AdminBlogController::class, 'removeCategory']);
        });

    });

});












Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');
