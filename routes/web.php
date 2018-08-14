<?php

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







Route::get('/available', [
		'uses' => 'FrontEndController@caritgl',
		'as' => 'caritgl'

	]);

Route::get('/available/book', [
		'uses' => 'FrontEndController@cariTglStatus',
		'as' => 'caritgl.status'
	]);



Route::get('/book/create', [

	'uses' => 'BooksController@index',
	'as' => 'books'
]);

Route::post('/book/store',[

	'uses' => 'BooksController@store',
	'as' => 'book.store'
		
]);




Route::get('/test', function(){
	return App\User::find(1)->profile;
});

Route::post('/subscribe', function(){

	$email = request('email');

	Newsletter::subscribe($email);

	Session::flash('success', 'sukses subs bro');

	return redirect()->back();

});

Route::get('/', [

	'uses' => 'FrontEndController@index',
	'as' => 'index'
]);


Route::get('/new', [
	'uses' => 'PagesController@new'
]);

Route::get('/posts/{slug}', [
	'uses' => 'FrontEndController@singlePost',
	'as' => 'post.single'

]);

Route::get('/category/{id}',[

	'uses' => 'FrontEndController@category',
	'as' => 'category.single'

]);

Route::get('/gallery/photos',[

	'uses' => 'FrontEndController@gallery',
	'as' => 'gallery.index'

]);

Route::get('/gallery/photos/{id}',[

	'uses' => 'FrontEndController@gallerySingle',
	'as' => 'gallery.single'

]);

Route::get('/tag/{id}',[

	'uses' => 'FrontEndController@tag',
	'as' => 'tag.single'

]);

Route::get('/results',function(){

	$posts = \App\Post::where('title','like', '%' . request('query') . '%')->get();
	

	return view('result')->with('posts', $posts)
		->with('title', 'Search results : ' . request('query'))
    	->with('categories', \App\Category::take(4)->get())
    	->with('settings', \App\Setting::first())
    	->with('query', request('query'));

});

Route::get('/cari',function(){

	$posts = \App\Booklist::where('date', '%' . request('query') . '%')->get();
	

	return view('cari')->with('posts', $posts)
		->with('title', 'Search results : ' . request('query'))
    	->with('categories', \App\Category::take(4)->get())
    	->with('settings', \App\Setting::first())
    	->with('query', request('query'));

});

Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/home', [
		
		'uses' => 'HomeController@index',
		'as' => 'home'

	]);

	Route::get('/post/create',[

		'uses' => 'PostsController@create',
		'as' => 'post.create'

	]);

	Route::get('/post/create/video',[

		'uses' => 'PostsController@video',
		'as' => 'post.video'

	]);

	Route::get('/posts',[

		'uses' => 'PostsController@index',
		'as' => 'posts'

	]);


	Route::post('/post/store',[

		'uses' => 'PostsController@store',
		'as' => 'post.store'
		
	]);

	Route::post('/post/store/video',[

		'uses' => 'PostsController@stvideo',
		'as' => 'post.stvideo'
		
	]);

	Route::get('/post/trashed',[

		'uses' => 'PostsController@trashed',
		'as' => 'post.trashed'

	]);

	Route::get('/post/kill/{id}',[

		'uses' => 'PostsController@kill',
		'as' => 'post.kill'

	]);

	Route::get('/post/restore/{id}',[

		'uses' => 'PostsController@restore',
		'as' => 'post.restore'

	]);

	Route::get('/post/edit/{id}',[

		'uses' => 'PostsController@edit',
		'as' => 'post.edit'

	]);

	Route::post('/post/update/{id}',[

		'uses' => 'PostsController@update',
		'as' => 'post.update'

	]);




	Route::get('/post/delete/{id}',[

		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
		
	]);

	Route::get('/todos', [
		'uses' => 'TodosController@index',
		'as' => 'todos'

	]);

	Route::post('/create/todo', [
		'uses' => 'TodosController@store',
		'as' => 'todo.create'
	]);

	Route::get('/todo/delete/{id}',[

		'uses' => 'TodosController@delete',
		'as' => 'todo.delete'
	]);

	Route::get('/todo/update/{id}',[

		'uses' => 'TodosController@update',
		'as' => 'todo.update'
	]);

	Route::post('/todo/save/{id}', [
		
		'uses' => 'TodosController@save',
		'as' => 'todo.save'

	]);

	Route::get('/todo/completed/{id}',[
		
		'uses' => 'TodosController@completed',
		'as' => 'todo.completed'

	]);

	Route::get('/category/create',[

		'uses' => 'CategoriesController@create',
		'as' => 'category.create'

	]);

	Route::post('/category/store',[

		'uses' => 'CategoriesController@store',
		'as' => 'category.store'

	]);

	Route::get('/categories',[

		'uses' => 'CategoriesController@index',
		'as' => 'categories'

	]);

	Route::get('/category/edit/{id}',[

		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'

	]);

	Route::get('/category/delete/{id}',[

		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'

	]);

	Route::post('/category/update/{id}',[

		'uses' => 'CategoriesController@update',
		'as' => 'category.update'

	]);

	Route::get('/tags',[

		'uses' => 'TagsController@index',
		'as' => 'tags'

	]);

	Route::get('/tag/edit/{id}',[

		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'

	]);

	Route::get('/tag/create',[

		'uses' => 'TagsController@create',
		'as' => 'tag.create'

	]);

	Route::post('/tag/store',[

		'uses' => 'TagsController@store',
		'as' => 'tag.store'

	]);

	Route::post('/tag/update/{id}',[

		'uses' => 'TagsController@update',
		'as' => 'tag.update'

	]);

	Route::get('/tag/delete/{id}',[

		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'

	]);

	Route::get('/users', [

		'uses' => 'UsersController@index',
		'as' => 'users'

	]);

	Route::get('/user/create', [

		'uses' => 'UsersController@create',
		'as' => 'user.create'

	]);

	Route::post('/user/store', [

		'uses' => 'UsersController@store',
		'as' => 'user.store'

	]);

	Route::get('/user/admin/{id}', [

		'uses' => 'UsersController@admin',
		'as' => 'user.admin'

	]);

	Route::get('/user/not-admin/{id}', [

		'uses' => 'UsersController@not_admin',
		'as' => 'user.not.admin'

	]);

	Route::get('/user/profile',[

		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'

	]);

	Route::post('/user/profile/update',[

		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'

	]);

	Route::get('/user/delete/{id}',[

		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'

	]);

	Route::get('/settings',[

		'uses' => 'SettingsController@index',
		'as' => 'settings'

	]);

	Route::post('/setting/update', [

		'uses' => 'SettingsController@update',
		'as' => 'settings.update'

	]);

	Route::get('/product/create',[

		'uses' => 'ProductsController@create',
		'as' => 'product.create'

	]);

	

	Route::get('/product',[

		'uses' => 'ProductsController@index',
		'as' => 'products'

	]);


	Route::post('/product/store',[

		'uses' => 'ProductsController@store',
		'as' => 'product.store'
		
	]);

	

	Route::get('/product/edit/{id}',[

		'uses' => 'ProductsController@edit',
		'as' => 'product.edit'

	]);

	Route::post('/product/update/{id}',[

		'uses' => 'ProductsController@update',
		'as' => 'product.update'

	]);




	Route::get('/product/delete/{id}',[

		'uses' => 'ProductsController@destroy',
		'as' => 'product.delete'
		
	]);

	Route::get('/book',[

		'uses' => 'BooksController@adminIndex',
		'as' => 'books.admin'

	]);

	Route::get('/book/rekap/',[

		'uses' => 'BooksController@rekapIndex',
		'as' => 'books.rekapbln'

	]);
	Route::get('/book/rekap2/',[

		'uses' => 'BooksController@rekapIndexx',
		'as' => 'books.rekapblnn'

	]);

	Route::post('/book/rekap/bln',[

		'uses' => 'BooksController@rekapIndex1',
		'as' => 'rekap.bln'

	]);

	Route::post('/book/rekap/thn',[

		'uses' => 'BooksController@rekapIndex2',
		'as' => 'rekap.thn'

	]);

	Route::get('/book/edit/{id}',[

		'uses' => 'BooksController@edit',
		'as' => 'book.edit'

	]);

	Route::get('/book/delete/{id}',[

		'uses' => 'BooksController@destroy',
		'as' => 'book.delete'
		
	]);


	Route::get('/member',[

		'uses' => 'BooksController@adminIndex1',
		'as' => 'member.admin'

	]);

	Route::get('/member/history/{id}',[

		'uses' => 'BooksController@history',
		'as' => 'member.history'

	]);

	Route::get('/member/delete/{id}',[

		'uses' => 'BooksController@destroy1',
		'as' => 'member.delete'
		
	]);
	Route::get('/upload/gallery',[
		'uses' => 'UploadController@uploadForm', 
		'as' => 'gallery'
	] );
	Route::post('/upload/gallery', [
		'uses' => 'UploadController@uploadSubmit',
		'as' => 'gallery'
	] );

	Route::get('/gallery/index',[
		'uses' => 'UploadController@index', 
		'as' => 'gallery.index2'
	] );

	Route::get('/gallery/edit/{id}',[

		'uses' => 'UploadController@edit',
		'as' => 'gallery.edit'

	]);

	Route::get('/gallery/delete/{id}',[

		'uses' => 'UploadController@destroy',
		'as' => 'gallery.delete'
		
	]);
	Route::get('/gallery/edit2/{id}',[

		'uses' => 'UploadController@edit2',
		'as' => 'gallery.edit2'

	]);

	Route::get('/gallery/delete2/{id}',[

		'uses' => 'UploadController@destroy2',
		'as' => 'gallery.delete2'
		
	]);

	Route::post('/gallery/update/{id}',[

		'uses' => 'UploadController@update',
		'as' => 'gallery.update'

	]);

	Route::get('/gallery/add/{id}',[
		'uses' => 'UploadController@add', 
		'as' => 'gallery.add'
	] );

	Route::post('/upload/photo', [
		'uses' => 'UploadController@uploadSubmit2',
		'as' => 'gallery.photo'
	] );

	

});



  Route::prefix('customer')->group(function() {
    Route::get('/login/customer', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::get('/login/customers', 'Auth\CustomerLoginController@showLoginForm2')->name('customer.login2');
    Route::post('/login/customer', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::post('/login/customers', 'Auth\CustomerLoginController@login2')->name('customer.login.submit2');
    // Route::get('/forgot/customer', 'Auth\CustomerLoginController@showForgotForm')->name('regis.request');
    Route::get('/customer/view', 'CustomersController@index1')->name('customer.dashboard');
    Route::get('/regis', 'BooksController@index1')->name('regis.customer');
    Route::get('/regiss', 'BooksController@index12')->name('regis.customer2');
    Route::get('/customer/create', [

		'uses' => 'CustomersController@index',
		'as' => 'customers'
	]);

	Route::post('/customer/store',[

		'uses' => 'BooksController@store1',
		'as' => 'customer.store'
			
	]);

	Route::post('/customers/store',[

		'uses' => 'BooksController@store12',
		'as' => 'customer.store2'
			
	]);

	Route::post('/password/email','Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    Route::get('/password/reset','Auth\CustomerForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::post('/password/reset','Auth\CustomerResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\CustomerResetPasswordController@showResetForm')->name('customer.password.reset');


    Route::post('/customer/update',[

		'uses' => 'CustomersController@update2',
		'as' => 'customer.profile.update'

	]);

  });


