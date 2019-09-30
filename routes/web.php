<?php
 

 
Route::get('/', 'home\welcomeController@home')->name('frontEnd.master');

Route::get('/product/{name}/{id}', 'home\category\productMainCategoryController@mainCategoryDetails');
Route::get('/products/{name}/{id}', 'home\category\productMiniCategoryController@miniCategoryDetails');
Route::get('/{product_name}/product-details/{id}', 'home\product\productDetailsController@singleProductDetails');

/***
 * Cart start
 */

Route::match(['get','post'],'/add/to/cart/{id}', 'home\cart\cartController@addCart');
Route::get('/show/cart', 'home\cart\cartController@showCart');
Route::Post('/update/cart/product', 'home\cart\cartController@updateCart');
Route::get('/delete/cart/{id}', 'home\cart\cartController@deleteCart');
/***
 * Cart End
 */


/***
 * Checkout start
 */



 

Route::get('/checkout/products', 'checkout\checkoutController@home');
Route::post('/checkout/check/customer/login', 'checkout\checkoutController@userCheckLogin');

  

Route::post('/checkout/save/customer', 'checkout\checkoutController@customer');
Route::get('/checkout/shipping', 'checkout\checkoutController@shipping');
Route::post('/checkout/shipping/save', 'checkout\checkoutController@saveShipping');
Route::get('/checkout/payment', 'checkout\checkoutController@showPaymentForm');
Route::post('/checkout/save/order', 'checkout\checkoutController@saveOrderInfo');


/***
 * Checkout End
 */


/***
 * customer  start
 * 
 */


//Route::get('customer/registration', 'customer\login\customerRegController@home');
Route::get('customer/login', 'customer\login\customerLoginController@showLoginForm');
Route::post('customer/login/check/user/', 'customer\login\customerLoginController@userCheckLogin');
Route::get('customer/dashboard', 'customer\dashboard\customerController@home');

Route::get('customer/profile/view', 'customer\profile\customerProfileController@profileView');

Route::get('customer/shipping/address', 'customer\profile\customerProfileController@shippinsAddressView');

Route::get('customer/order/view', 'customer\order\customerOrderController@orderView');
Route::get('customer/total/order/view/{id}', 'customer\order\customerOrderController@totalOrderView');


Route::get('customer/dashboard/logout', 'customer\dashboard\customerController@customerLogout');
 



/***
 * customer  End
 * 
 */




/****
 * 
 * Admin Part
 * 
 * 
 */


Route::get('/wp-admin/reg/form', 'admin\adminRegController@showRegForm')->name('admin.login.regContent');
Route::post('/wp-admin/reg/checking/', 'admin\adminRegController@storeInfo');

Route::get('/wp/admin/master/login/form/showing', 'admin\adminLoginController@showLoginForm')->name('admin.login.loginContent');
Route::post('/admin/master/login/checking/', 'admin\adminLoginController@adminCheckLogin');

Route::get('/wp-admin/master/dashboard', 'admin\dashboard\homeController@dashboard')->name('admin.home.homeContent');






////////////////////////////////////main Category Controller/////////////////////////////////////////////////////////
Route::get('/wp-admin/master/category/main/add', 'admin\category\mainCategoryController@index')->name('admin.category.main-category.createCategory');
Route::post('/wp-admin/master/category/main/save', 'admin\category\mainCategoryController@saveMainCategory');

Route::get('/wp-admin/master/category/main/manage', 'admin\category\mainCategoryController@showMainCategory');

Route::get('/wp-admin/master/category/main/unpublished/{id}', 'admin\category\mainCategoryController@unpublishedMainCategory');
Route::get('/wp-admin/master/category/main/published/{id}', 'admin\category\mainCategoryController@publishedMainCategory');


////////////////////////////////////Sub Category Controller/////////////////////////////////////////////////////////
Route::get('/wp-admin/master/category/sub/add', 'admin\category\subCategoryController@index')->name('admin.category.sub-category.createSubCategory');
Route::POST('/wp-admin/master/category/sub/store', 'admin\category\subCategoryController@saveSubCategory');
Route::get('/wp-admin/master/category/sub/manage', 'admin\category\subCategoryController@showSubCategory')->name('admin.category.sub-category.manageSubCategory');
Route::get('/wp-admin/master/category/sub/unpublished/{id}', 'admin\category\subCategoryController@unpublishedSubCategory');
Route::get('/wp-admin/master/category/sub/published/{id}', 'admin\category\subCategoryController@publishedSubCategory');

 
////////////////////////////////////Mini Category Controller/////////////////////////////////////////////////////////
Route::get('/wp-admin/master/category/mini/add', 'admin\category\miniCategoryController@index')->name('admin.category.mini-category.createMiniCategory');
Route::post('/wp-admin/master/category/mini/save', 'admin\category\miniCategoryController@saveMiniCategory');
Route::get('/wp-admin/master/category/mini/manage', 'admin\category\miniCategoryController@showMimiCategory')->name('admin.category.mini-category.createMiniCategory');



////////////////////////////////////Manufacture Controller/////////////////////////////////////////////////////
Route::get('/wp-admin/master/manufacture/add', 'admin\manufacture\manufactureController@createManufacture')->name('admin.manufacture.createManufacture');
Route::post('/wp-admin/master/manufacture/save', 'admin\manufacture\manufactureController@saveManufacture');
Route::get('/wp-admin/master/manufacture/manage', 'admin\manufacture\manufactureController@manageManufacture');
Route::get('/wp-admin/master/manufacture/edit/{id}', 'admin\manufacture\manufactureController@editManufacture');
Route::Post('/wp-admin/master/manufacture/update/', 'admin\manufacture\manufactureController@updateManufacture');
Route::get('/wp-admin/master/manufacture/unpublished/{id}', 'admin\manufacture\manufactureController@unpublishedManufacture');
Route::get('/wp-admin/master/manufacture/published/{id}', 'admin\manufacture\manufactureController@publishedManufacture');
Route::get('/wp-admin/master/manufacture/delete/{id}', 'admin\manufacture\manufactureController@deleteManufacture');







////////////////////////////////////Product Controller/////////////////////////////////////////////////////////
Route::get('/wp-admin/master/product/add', 'admin\product\productController@createProduct')->name('admin.product.createProduct');
Route::post('/wp-admin/master/product/store', 'admin\product\productController@storeProduct');
Route::get('/wp-admin/master/product/manage', 'admin\product\productController@manageProduct')->name('admin.product.manageProduct');
Route::get('/wp-admin/master/product/view/{id}', 'admin\product\productController@viewProduct');

Route::get('/wp-admin/master/product/unpublished/{id}', 'admin\product\productController@unpublishedProduct');
Route::get('/wp-admin/master/product/published/{id}', 'admin\product\productController@publishedProduct');


Route::get('/wp-admin/master/dashboard/logout', 'admin\dashboard\homeController@logout');

////////////////////////////////////End Product Controller/////////////////////////////////////////////////////////


////////////////////////////////////start Product Order Controller/////////////////////////////////////////////////////////
Route::get('/wp-admin/master/all/order/view', 'admin\order\OrderController@orderView');
Route::get('/wp-admin/master/single/view/order/{id}', 'admin\order\OrderController@singleOrderView');


Route::get('/wp-admin/master/single/order/invoice/pdf/{id}', 'admin\order\OrderController@viewPDF');
Route::get('/wp-admin/master/single/view/order/invoice/generate/pdf/{id}', 'admin\order\OrderController@generatePDF');
////////////////////////////////////start Product Order Controller/////////////////////////////////////////////////////////