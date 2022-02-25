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


Auth::routes();

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});

Route::get('/categories', function () {
    return redirect('/blog');
});

Route::get('/', 'App\Http\Controllers\FrontController@index')->name('home');


Route::get('/privacy-policy', 'App\Http\Controllers\FrontController@privacypolicy')->name('privacypolicy');
Route::get('/term-condition', 'App\Http\Controllers\FrontController@termcondition')->name('termcondition');
Route::get('/contact', 'App\Http\Controllers\FrontController@contact')->name('contact');
Route::post('/contact', 'App\Http\Controllers\FrontController@contactStore')->name('contact.store');

//cart
Route::get('cart', 'App\Http\Controllers\CartController@cartList')->name('cart.list');
Route::post('cart', 'App\Http\Controllers\CartController@addToCart')->name('cart.store');
Route::post('update-cart', 'App\Http\Controllers\CartController@updateCart')->name('cart.update');
Route::post('remove', 'App\Http\Controllers\CartController@removeCart')->name('cart.remove');
Route::post('clear', 'App\Http\Controllers\CartController@clearAllCart')->name('cart.clear');


//Social Login
Route::get('/user-login', 'App\Http\Controllers\SocialLoginController@index')->name('front-user.index');
Route::get('/user-dashboard', 'App\Http\Controllers\SocialLoginController@dashboard')->name('front-user.dashboard');
Route::get('/user-login/create', 'App\Http\Controllers\SocialLoginController@create')->name('front-user.create');
Route::post('/user-login', 'App\Http\Controllers\SocialLoginController@store')->name('front-user.store');
Route::put('/user-login/{user}', 'App\Http\Controllers\SocialLoginController@update')->name('front-user.update');
Route::delete('/user-login/{user}', 'App\Http\Controllers\SocialLoginController@destroy')->name('front-user.destroy');
Route::get('/user-login/{user}/edit', 'App\Http\Controllers\SocialLoginController@edit')->name('front-user.edit');
Route::post('/user-login', 'App\Http\Controllers\SocialLoginController@CustomerLogin')->name('front-user.login');

Route::get('/google/redirect','App\Http\Controllers\SocialLoginController@handleGoogleRedirect')->name('google.redirect');
Route::get('/google/callback', 'App\Http\Controllers\SocialLoginController@handleGoogleCallback')->name('google.callback');

Route::get('/facebook/redirect','App\Http\Controllers\SocialLoginController@handleFacebookRedirect')->name('facebook.redirect');
Route::get('/facebook/callback', 'App\Http\Controllers\SocialLoginController@handleFacebookCallback')->name('facebook.callback');
//End of Social Login

//product
Route::get('product/search/', 'App\Http\Controllers\FrontController@searchProduct')->name('searchProduct');
Route::get('/products/search','App\Http\Controllers\FrontController@productSearchFilter')->name('productsearch.filter');
Route::get('/products','App\Http\Controllers\FrontController@productFilter')->name('product.filter');
Route::get('/product/pcategory','App\Http\Controllers\FrontController@productCategoryFilter')->name('product.categoryfilter');
Route::get('/product/scategory','App\Http\Controllers\FrontController@productSecondaryFilter')->name('product.secondaryfilter');
Route::get('product/category/{category}','App\Http\Controllers\FrontController@productCategory')->name('product.category');
Route::get('product/category/{category}/{secondary}','App\Http\Controllers\FrontController@productSecondary')->name('product.secondary');
Route::get('/product', 'App\Http\Controllers\FrontController@products')->name('product.frontend');
Route::post('/autocomplete/fetch', 'App\Http\Controllers\AutoCompleteController@fetch')->name('autocomplete.fetch');
//end product


//product by brand
Route::get('product/brands/{brand}','App\Http\Controllers\FrontController@productBrands')->name('product.brand');
Route::get('product/brands/{brand}/{series}','App\Http\Controllers\FrontController@productBrandSeries')->name('product.brandseries');
Route::get('product/filterbrand','App\Http\Controllers\FrontController@productBrandFilter')->name('product.brandfilter');
Route::get('product/filterseries','App\Http\Controllers\FrontController@productBrandSeriesFilter')->name('product.brandseriesfilter');

Route::get('/product/brands', function () {
    return redirect('/product');
});

Route::get('/product/category', function () {
    return redirect('/product');
});

Route::get('product/{slug}','App\Http\Controllers\FrontController@productSingle')->name('product.single');

//blog
Route::get('blog/search/', 'App\Http\Controllers\FrontController@searchBlog')->name('searchBlog');

Route::get('blog/{slug}','App\Http\Controllers\FrontController@blogSingle')->name('blog.single');
Route::get('/blog/categories/{slug}', 'App\Http\Controllers\FrontController@blogCategories')->name('blog.category');
Route::get('/blog', 'App\Http\Controllers\FrontController@blogs')->name('blog.frontend');
//end blog

Route::group(['prefix' => 'auth', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //signed-in user routes
    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('profile');
    Route::put('/profile/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::put('/profileimage/{id}/update', 'App\Http\Controllers\UserController@imageupdate')->name('user.imageupdate');
    Route::put('/profile/password', 'App\Http\Controllers\UserController@profilepassword')->name('user.password');
    //end of signed-in user routes

    //user
    Route::put('/users/{id}/updates', 'App\Http\Controllers\UserController@userUpdate')->name('users.update');
    Route::put('/password', 'App\Http\Controllers\UserController@password')->name('users.password');
    Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/user', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::patch('/status/{id}/update', 'App\Http\Controllers\UserController@statusupdate')->name('user-status.update');
    Route::delete('/user/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

    //End user


    //General setting
    Route::get('/settings', 'App\Http\Controllers\SettingController@index')->name('setting.index');
    Route::post('/settings', 'App\Http\Controllers\SettingController@store')->name('setting.store');
    Route::put('/settings/{id}', 'App\Http\Controllers\SettingController@update')->name('setting.update');
    Route::put('/setting/{id}/images', 'App\Http\Controllers\SettingController@imageupdate')->name('setting.imageupdate');
    Route::put('/settings/{id}/welcome', 'App\Http\Controllers\SettingController@welcomeupdate')->name('welcome.update');
    Route::put('/settings/{id}/status', 'App\Http\Controllers\SettingController@statusupdate')->name('status.update');
    Route::put('/settings/{id}/callaction', 'App\Http\Controllers\SettingController@callactionupdate')->name('callaction.update');


    //End of General setting

    //Blog categories

    Route::get('/blog-category', 'App\Http\Controllers\BlogCategoryController@index')->name('blogcategory.index');
    Route::get('/blog-category/create', 'App\Http\Controllers\BlogCategoryController@create')->name('blogcategory.create');
    Route::post('/blog-category', 'App\Http\Controllers\BlogCategoryController@store')->name('blogcategory.store');
    Route::put('/blog-category/{category}', 'App\Http\Controllers\BlogCategoryController@update')->name('blogcategory.update');
    Route::delete('/blog-category/{category}', 'App\Http\Controllers\BlogCategoryController@destroy')->name('blogcategory.destroy');
    Route::get('/blog-category/{category}/edit', 'App\Http\Controllers\BlogCategoryController@edit')->name('blogcategory.edit');

    //End of Blog categories


    //blog

    Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name('blog.index');
    Route::get('/blogs/create', 'App\Http\Controllers\BlogController@create')->name('blog.create');
    Route::post('/blogs', 'App\Http\Controllers\BlogController@store')->name('blog.store');
    Route::put('/blogs/{blogs}', 'App\Http\Controllers\BlogController@update')->name('blog.update');
    Route::delete('/blogs/{blogs}', 'App\Http\Controllers\BlogController@destroy')->name('blog.destroy');
    Route::get('/blogs/{blogs}/edit', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
    Route::patch('/blogs/{id}/update', 'App\Http\Controllers\BlogController@updateStatus')->name('blog-status.update');

    //End blog

    //sliders

    Route::get('/sliders', 'App\Http\Controllers\SliderController@index')->name('sliders.index');
    Route::get('/sliders/create', 'App\Http\Controllers\SliderController@create')->name('sliders.create');
    Route::post('/sliders', 'App\Http\Controllers\SliderController@store')->name('sliders.store');
    Route::put('/sliders/{sliders}', 'App\Http\Controllers\SliderController@update')->name('sliders.update');
    Route::delete('/sliders/{sliders}', 'App\Http\Controllers\SliderController@destroy')->name('sliders.destroy');
    Route::get('/sliders/{sliders}/edit', 'App\Http\Controllers\SliderController@edit')->name('sliders.edit');
    Route::patch('/sliders/{id}/update', 'App\Http\Controllers\SliderController@updateStatus')->name('sliders-status.update');

    //End sliders

    //teams

    Route::get('/teams', 'App\Http\Controllers\TeamController@index')->name('teams.index');
    Route::get('/teams/create', 'App\Http\Controllers\TeamController@create')->name('teams.create');
    Route::post('/teams', 'App\Http\Controllers\TeamController@store')->name('teams.store');
    Route::put('/teams/{teams}', 'App\Http\Controllers\TeamController@update')->name('teams.update');
    Route::delete('/teams/{teams}', 'App\Http\Controllers\TeamController@destroy')->name('teams.destroy');
    Route::get('/teams/{teams}/edit', 'App\Http\Controllers\TeamController@edit')->name('teams.edit');

    //End of teams

    //specification

    Route::get('/specifications', 'App\Http\Controllers\SpecificationController@index')->name('specification.index');
    Route::get('/specifications/create', 'App\Http\Controllers\SpecificationController@create')->name('specification.create');
    Route::post('/specifications', 'App\Http\Controllers\SpecificationController@store')->name('specification.store');
    Route::put('/specifications/{specification}', 'App\Http\Controllers\SpecificationController@update')->name('specification.update');
    Route::delete('/specifications/{specification}', 'App\Http\Controllers\SpecificationController@destroy')->name('specification.destroy');
    Route::get('/specifications/{specification}/edit', 'App\Http\Controllers\SpecificationController@edit')->name('specification.edit');

    //End of brand

    //brand

    Route::get('/brands', 'App\Http\Controllers\BrandController@index')->name('brands.index');
    Route::get('/brands/create', 'App\Http\Controllers\BrandController@create')->name('brands.create');
    Route::post('/brands', 'App\Http\Controllers\BrandController@store')->name('brands.store');
    Route::put('/brands/{brands}', 'App\Http\Controllers\BrandController@update')->name('brands.update');
    Route::delete('/brands/{brands}', 'App\Http\Controllers\BrandController@destroy')->name('brands.destroy');
    Route::get('/brands/{brands}/edit', 'App\Http\Controllers\BrandController@edit')->name('brands.edit');

    //End of brand

    //brand

    Route::get('/brand-series', 'App\Http\Controllers\BrandSeriesController@index')->name('brand-series.index');
    Route::get('/brand-series/create', 'App\Http\Controllers\BrandSeriesController@create')->name('brand-series.create');
    Route::post('/brand-series', 'App\Http\Controllers\BrandSeriesController@store')->name('brand-series.store');
    Route::put('/brand-series/{series}', 'App\Http\Controllers\BrandSeriesController@update')->name('brand-series.update');
    Route::delete('/brand-series/{series}', 'App\Http\Controllers\BrandSeriesController@destroy')->name('brand-series.destroy');
    Route::get('/brand-series/{series}/edit', 'App\Http\Controllers\BrandSeriesController@edit')->name('brand-series.edit');

    //End of brand


    //Product Primary categories

    Route::get('/product-categories', 'App\Http\Controllers\ProductPrimaryCategoryController@index')->name('proprimarycat.index');
    Route::get('/product-categories/create', 'App\Http\Controllers\ProductPrimaryCategoryController@create')->name('proprimarycat.create');
    Route::post('/product-categories', 'App\Http\Controllers\ProductPrimaryCategoryController@store')->name('proprimarycat.store');
    Route::put('/product-categories/{category}', 'App\Http\Controllers\ProductPrimaryCategoryController@update')->name('proprimarycat.update');
    Route::delete('/product-categories/{category}', 'App\Http\Controllers\ProductPrimaryCategoryController@destroy')->name('proprimarycat.destroy');
    Route::get('/product-categories/{category}/edit', 'App\Http\Controllers\ProductPrimaryCategoryController@edit')->name('proprimarycat.edit');

    //End of Product Primary  categories

    //Product Secondary categories

    Route::get('/product-secondary-categories', 'App\Http\Controllers\ProductSeacondaryController@index')->name('secondarycat.index');
    Route::get('/product-secondary-categories/create', 'App\Http\Controllers\ProductSeacondaryController@create')->name('secondarycat.create');
    Route::post('/product-secondary-categories', 'App\Http\Controllers\ProductSeacondaryController@store')->name('secondarycat.store');
    Route::put('/product-secondary-categories/{category}', 'App\Http\Controllers\ProductSeacondaryController@update')->name('secondarycat.update');
    Route::delete('/product-secondary-categories/{category}', 'App\Http\Controllers\ProductSeacondaryController@destroy')->name('secondarycat.destroy');
    Route::get('/product-secondary-categories/{category}/edit', 'App\Http\Controllers\ProductSeacondaryController@edit')->name('secondarycat.edit');

    //End of Product Primary  categories

    //Product Attribute

    Route::get('/product-attribute', 'App\Http\Controllers\ProductAttributeController@index')->name('productattribute.index');
    Route::get('/product-attribute/create', 'App\Http\Controllers\ProductAttributeController@create')->name('productattribute.create');
    Route::post('/product-attribute', 'App\Http\Controllers\ProductAttributeController@store')->name('productattribute.store');
    Route::put('/product-attribute/{attribute}', 'App\Http\Controllers\ProductAttributeController@update')->name('productattribute.update');
    Route::delete('/product-attribute/{attribute}', 'App\Http\Controllers\ProductAttributeController@destroy')->name('productattribute.destroy');
    Route::get('/product-attribute/{attribute}/edit', 'App\Http\Controllers\ProductAttributeController@edit')->name('productattribute.edit');

    //End of Product Attribute

    //Product Secondary categories

    Route::get('/attribute-value', 'App\Http\Controllers\AttributeValueController@index')->name('values.index');
    Route::get('/attribute-value/create', 'App\Http\Controllers\AttributeValueController@create')->name('values.create');
    Route::post('/attribute-value', 'App\Http\Controllers\AttributeValueController@store')->name('values.store');
    Route::put('/attribute-value/{value}', 'App\Http\Controllers\AttributeValueController@update')->name('values.update');
    Route::delete('/attribute-value/{value}', 'App\Http\Controllers\AttributeValueController@destroy')->name('values.destroy');
    Route::get('/attribute-value/{value}/edit', 'App\Http\Controllers\AttributeValueController@edit')->name('values.edit');

    //End of Product Primary  categories


    //Product

    Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
    Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('products.create');
    Route::post('/products', 'App\Http\Controllers\ProductController@store')->name('products.store');
    Route::put('/products/{product}', 'App\Http\Controllers\ProductController@update')->name('products.update');
    Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
    Route::get('/products/{product}/edit', 'App\Http\Controllers\ProductController@edit')->name('products.edit');
    Route::patch('/products/{id}/update', 'App\Http\Controllers\ProductController@updateStatus')->name('products-status.update');
    Route::get('/products-attribute/', 'App\Http\Controllers\ProductController@attributeGetValues')->name('products-attribute.fetch');
    Route::get('/products-secondary-cat/', 'App\Http\Controllers\ProductController@primaryGetSecondary')->name('products-secondary.fetch');
    Route::get('/brands-series/', 'App\Http\Controllers\ProductController@brandGetSeries')->name('product-brand-series.fetch');

    //product gallery
    Route::get('/product-gallery/{id}', 'App\Http\Controllers\ProductController@galleryindex')->name('products.galleryindex');
    Route::put('/products-upload-gallery/{id}', 'App\Http\Controllers\ProductController@uploadGallery')->name('products-gallery.update');
    Route::post('/products/image-delete', 'App\Http\Controllers\ProductController@deleteGallery')->name('products-gallery.delete');
    Route::get('/products/gallery/{id}', 'App\Http\Controllers\ProductController@getGallery')->name('products-gallery.display');

    //product seo

    Route::get('/product-seo', 'App\Http\Controllers\ProductSeoController@index')->name('product-seo.index');
    Route::get('/product-seo/create/{id}', 'App\Http\Controllers\ProductSeoController@create')->name('product-seo.create');
    Route::post('/product-seo', 'App\Http\Controllers\ProductSeoController@store')->name('product-seo.store');
    Route::put('/product-seo/{productseo}', 'App\Http\Controllers\ProductSeoController@update')->name('product-seo.update');
    Route::delete('/product-seo/{productseo}', 'App\Http\Controllers\ProductSeoController@destroy')->name('product-seo.destroy');
    Route::get('/product-seo/{productseo}/edit', 'App\Http\Controllers\ProductSeoController@edit')->name('product-seo.edit');

    //End of Product


    //Site Banners

    Route::get('/site-banners', 'App\Http\Controllers\SiteBannerController@index')->name('banner.index');
    Route::get('/site-banners/create', 'App\Http\Controllers\SiteBannerController@create')->name('banner.create');
    Route::post('/site-banners', 'App\Http\Controllers\SiteBannerController@store')->name('banner.store');
    Route::put('/site-banners/{banners}', 'App\Http\Controllers\SiteBannerController@update')->name('banner.update');
    Route::delete('/site-banners/{banners}', 'App\Http\Controllers\SiteBannerController@destroy')->name('banner.destroy');
    Route::get('/site-banners/{banners}/edit', 'App\Http\Controllers\SiteBannerController@edit')->name('banner.edit');
    Route::put('/product-banner-gallery', 'App\Http\Controllers\SiteBannerController@uploadGallery')->name('banner-gallery.update');
    Route::post('/product-banner-gallery/image-delete', 'App\Http\Controllers\SiteBannerController@deleteGallery')->name('banner-gallery.delete');
    Route::get('/product-banner-gallery/gallery/', 'App\Http\Controllers\SiteBannerController@getGallery')->name('banner-gallery.display');
    //End of Site Banners


    //for menu
    Route::get('/manage-menus/{slug?}', 'App\Http\Controllers\MenuController@index')->name('menu.index');
    Route::post('/create-menu', 'App\Http\Controllers\MenuController@store')->name('menu.store');
    Route::get('/add-category-to-menu','App\Http\Controllers\MenuController@addCategory')->name('menu.cat');
    Route::get('add-post-to-menu','App\Http\Controllers\MenuController@addPost')->name('menu.post');
    Route::get('add-custom-link','App\Http\Controllers\MenuController@addCustomLink')->name('menu.custom');
    Route::get('/update-menu','App\Http\Controllers\MenuController@updateMenu')->name('menu.updateMenu');
    Route::post('/update-menuitem/{id}','App\Http\Controllers\MenuController@updateMenuItem')->name('menu.updatemenuitem');
    Route::get('/delete-menuitem/{id}/{key}/{in?}/{inside?}','App\Http\Controllers\MenuController@deleteMenuItem')->name('menu.deletemenuitem');
    Route::get('/delete-menu/{id}','App\Http\Controllers\MenuController@destroy')->name('menu.delete');

});
