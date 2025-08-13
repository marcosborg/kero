<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Vendor
    Route::delete('vendors/destroy', 'VendorController@massDestroy')->name('vendors.massDestroy');
    Route::post('vendors/media', 'VendorController@storeMedia')->name('vendors.storeMedia');
    Route::post('vendors/ckmedia', 'VendorController@storeCKEditorImages')->name('vendors.storeCKEditorImages');
    Route::resource('vendors', 'VendorController');

    // Address
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Cart
    Route::delete('carts/destroy', 'CartController@massDestroy')->name('carts.massDestroy');
    Route::resource('carts', 'CartController');

    // Cart Item
    Route::delete('cart-items/destroy', 'CartItemController@massDestroy')->name('cart-items.massDestroy');
    Route::resource('cart-items', 'CartItemController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Order Item
    Route::delete('order-items/destroy', 'OrderItemController@massDestroy')->name('order-items.massDestroy');
    Route::resource('order-items', 'OrderItemController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Shipment
    Route::delete('shipments/destroy', 'ShipmentController@massDestroy')->name('shipments.massDestroy');
    Route::resource('shipments', 'ShipmentController');

    // Refund
    Route::delete('refunds/destroy', 'RefundController@massDestroy')->name('refunds.massDestroy');
    Route::resource('refunds', 'RefundController');

    // Commission Rule
    Route::delete('commission-rules/destroy', 'CommissionRuleController@massDestroy')->name('commission-rules.massDestroy');
    Route::resource('commission-rules', 'CommissionRuleController');

    // Payout
    Route::delete('payouts/destroy', 'PayoutController@massDestroy')->name('payouts.massDestroy');
    Route::resource('payouts', 'PayoutController');

    // Site Setting
    Route::delete('site-settings/destroy', 'SiteSettingController@massDestroy')->name('site-settings.massDestroy');
    Route::resource('site-settings', 'SiteSettingController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
