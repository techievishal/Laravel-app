<?php
Route::get('/', [
    'uses'=>'ProductController@getProducts',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/my-cart', [
    'uses'=>'ProductController@showCart',
    'as' => 'product.myCart'

]);

Route::get('/my-orders', [
    'uses'=>'OrderController@showOrders',
    'as' => 'orders.myOrders',
    'middleware' => 'auth'

]);

Route::get('/checkout', [
    'uses'=>'ProductController@checkout',
    'as' => 'product.checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses'=>'ProductController@postCheckout',
    'as' => 'product.checkout',
    'middleware' => 'auth'
]);


Route::get('/signup', [
    'uses'=>'UserController@getSignup',
    'as'=> 'user.signup',
    'middleware' => 'guest'
]);



Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register');


Route::get('/admin', function () { return redirect('/admin/home'); });
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('add-events', 'Admin\EventController@create')->name('admin.addevents');
Route::post('add-events', 'Admin\EventController@store')->name('admin.addevents');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('product_categories', 'Admin\ProductCategoriesController');
    Route::post('product_categories_mass_destroy', ['uses' => 'Admin\ProductCategoriesController@massDestroy', 'as' => 'product_categories.mass_destroy']);
    Route::resource('product_tags', 'Admin\ProductTagsController');
    Route::post('product_tags_mass_destroy', ['uses' => 'Admin\ProductTagsController@massDestroy', 'as' => 'product_tags.mass_destroy']);
    Route::resource('products', 'Admin\ProductsController');
    Route::post('products_mass_destroy', ['uses' => 'Admin\ProductsController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::resource('orders', 'Admin\OrdersController');

    Route::resource('/events', 'Admin\EventController');


 
});
