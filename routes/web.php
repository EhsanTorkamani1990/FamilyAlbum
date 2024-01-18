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
Route::middleware('auth')->group(function(){
    //chatify
    Route::get('/', 'AlbumsController@index');
    Route::get('/albums', 'AlbumsController@index');
    Route::get('/albums/create', 'AlbumsController@create');
    Route::get('/albums/{id}', 'AlbumsController@show');
    Route::delete('/albums/{id}' , 'AlbumsController@destroy');   
    Route::post('/albums/store', 'AlbumsController@store');
    Route::get('/photos/create/{id}', 'PhotosController@create');
    Route::post('/photos/store', 'PhotosController@store');
    Route::get('/photos/{id}' , 'PhotosController@show');
    Route::delete('/photos/{id}' , 'PhotosController@destroy');
    Route::get('/devices','DevicesController@index');
    Route::get('/sohbat/{id}','DevicesController@sohbat');
    Route::delete('/devices/{id}' , 'DevicesController@destroy');
    Route::get('/devices/create','DevicesController@create');
    Route::post('/devicesaction','DevicesController@storeDevice');
    Route::get('/profile', 'ProfilesController@index')->name('profile.show');
    Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
    Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
    Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
    Route::get('/p/create','PostsController@create');
    Route::get('/p/{pool}','PostsController@show');
    Route::delete('/p/{pool}' , 'ProfilesController@destroy');   
    Route::post('/p','PostsController@store');
    Route::post('follow/{user}' ,'FollowsController@store');
    Route::get('/xs', 'PostsController@index');
    Route::post('/ahmadtorkamani/pool','CommentController@store');
    //softDeltes For Comments
    Route::delete('/ahmadtorkamani/{pool}','CommentController@destroycc');  
    //softDeltes For Comments 
    Route::get('/check', 'UserController@userOnlineStatus');   
    Route::get('image-gallery', 'ImageGalleryController@index');
    Route::post('image-gallery', 'ImageGalleryController@upload');
    Route::delete('image-gallery/{id}', 'ImageGalleryController@destroy');
    //Route::get('dropzone', 'DropzoneController@index');
    //Route::post('dropzone/upload', 'DropzoneController@upload')->name('dropzone.upload');
    //Route::get('dropzone/fetch', 'DropzoneController@fetch')->name('dropzone.fetch');
    //Route::get('dropzone/delete', 'DropzoneController@delete')->name('dropzone.delete');
    //Route::get('/box/share' , 'AlbumsController@boxindex');
    //Route::get('/box/share/{user}' , 'AlbumsController@boxindex');
    //Route::get('/box/share/create/{user}' , 'AlbumsController@boxcreate');
    //Route::post('/box/share/store', 'AlbumsController@boxstore');
    //Route::delete('/box/share/{id}' , 'AlbumsController@boxdestroy'); 
    Route::get('/als', 'AlController@index');
    Route::get('/als/create', 'AlController@create');
    Route::get('/als/{id}', 'AlController@show');
    Route::delete('/als/{id}' , 'AlController@destroy');   
    Route::post('/als/store', 'AlController@store');
    Route::get('/phs/create/{id}', 'PhController@create');
    Route::post('/phs/store', 'PhController@store');
    Route::get('/phs/{id}' , 'PhController@show');
    Route::delete('/phs/{id}' , 'PhController@destroy');
    Route::get('/aghajoon' , function(){return view('dashboard');});
    //Route::post('/albums/storexs', 'AlbumsController@storexs');
    Route::post('/createpost','PostController@postCreatePost')->name('post.create');
    Route::get('/dashboard','PostController@getDashboard');
    Route::delete('/aghajoon/{id}' , 'PostController@destroysher');
    //Route::delete('/post_delete/{id}','PostController@getDeletePost');
    //Route::get('/chats', 'ChatController@index');
    //Route::get('/messages', 'ChatController@fetchAllMessages');
    //Route::post('/messages', 'ChatController@sendMessage');
    //Route::get('/albums/share', 'AlbumsController@createsh');
    Route::get('join-table', 'AlbumsController@taghi');
    //Route::get('join-table', 'JoinTableController@index');
    //querybuilder for users
    Route::get('/negar','AlbumsController@negar');
    //بازیابی یک سطر از جدول 
    Route::get('/negar2','AlbumsController@negar2');
    //بازیابی یک ستون (فیلد از جدول) :
    //pluck method
    Route::get('/negar3','AlbumsController@negar3');
    //Route::get('/naghi' , 'AlbumsController@index');  
    Route::delete('/naghi/{id}' , 'AlbumsController@destroynx'); 
    Route::get('join-table1369', 'AlbumsController@index1369');
    //usersGet
    Route::get('/beta', 'AlbumsController@usersGet');
    //chats
    //Route::get('/chats', 'ChatController@index');
    //Route::get('/messages', 'ChatController@fetchAllMessages');
    //Route::post('/messages', 'ChatController@sendMessage');
    //something for like 
    //Route::get('p/{pool}/islikedbyme', 'PostsController@isLikedByMe');
    //Route::post('p/like', 'PostsController@like');
    //Route::get('/sher/create' ,'PosstController@create')->name('possts.create');
    //create is Ok 
    //Route::get('/xs', 'PostsController@index');
    //Route::get('/ps' ,'PosstController@index')->name('possts.index');
    //index is Ok
    //Route::get('/sher/{id}' ,'PosstController@show')->name('possts.show');
    //show is Ok
    //Route::post('/sher', 'PosstController@store')->name('possts.store');
    //store is ok
    //Route::post('/ahmadtorkamanii/pool' ,'CommenntController@store')->name('commennts.store');
    /*
    Route::delete('/p/{pool}' , 'ProfilesController@destroy');   
    Route::post('/ahmadtorkamani/pool','CommentController@store');
    //softDeltes For Comments
    Route::delete('/ahmadtorkamani/{pool}','CommentController@destroycc');  
    //softDeltes For Comments 
    */
    //Route::get('/possts', 'PosstController@index')->name('possts');
    //Route::get('posst', 'PosstController@create')->name('posst.create');
    //Route::post('posst', 'PosstController@store')->name('posst.store');
    //Route::get('/article/{posst:slug}', 'PosstController@show')->name('posst.show');
    //Route::post('/commennt/store', 'CommenntController@store')->name('commennt.add');
    //Route::post('/reply/store', 'CommenntController@replyStore')->name('reply.add');
    /*Route::get('/homex', 'HomeController@index')->name('homex');
    Route::post('/post', 'PostController@post');
    Route::get('/show', 'PostController@getPost');
    Route::get('/getcomment', 'PostController@getComment');
    Route::post('/writecomment', 'PostController@makeComment');
    */
    Route::get('/post/create', 'PosstController@create')->name('post.create');
    Route::post('/post/store', 'PosstController@store')->name('post.store');
    //env
   Route::get('/posts', 'PosstController@index')->name('posts');
    Route::get('/post/show/{id}', 'PosstController@show')->name('post.show');
    Route::post('/comment/store', 'CommenntController@store')->name('comment.add');
    Route::post('/reply/store', 'CommenntController@replyStore')->name('reply.add');
    Route::delete('/posts/{id}' , 'CommenntController@destroy'); 
    Route::delete('/comment/{id}','CommenntController@destroycc');  

    //Route::get('/posts/{id}/edit', 'PosstController@edit')->name('post.edit');
    //Route::patch('/posts/{id}', 'PosstController@update')->name('post.update');
    //Route::get('/profile', 'ProfilesController@index')->name('profile.show');
    //Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
    //Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
    //Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

    Route::get('/posts/edit/{post}', ['as' => 'post.edit', 'uses' => 'PosstController@edit']);
    Route::patch('/posts/{post}', ['as' => 'post.update','uses' => 'PosstController@update']);
    //Route::get('/post/edit/{post}', 'PosstController@edit')->name('post.edit');
    //Route::patch('/post/{post}',  'PosstController@update')->name('post.update');
  /* Route::get('/posts', 'PosstController@index');
Route::get('/posts/fetch_data', 'PosstController@fetch_data');
Route::post('/posts/add_data', 'PosstController@add_data')->name('posts.add_data');
Route::post('/posts/update_data', 'PosstController@update_data')->name('posts.update_data');
Route::post('/posts/delete_data', 'PosstController@delete_data')->name('posts.delete_data');*/

    //Route::post('/posts/{id}/like', 'PosstController@postLikeCafe');
   // Route::delete('/posts/{id}/like', 'PosstController@deleteLikeCafe');
  // Route::post('/posts/like/{id}', 'PosstController@likes');
    
    Route::get('product/like/{id}', ['as' => 'product.like', 'uses' => 'PosstController@likeProduct']);
    Route::get('posts/like/{id}', ['as' => 'post.like', 'uses' => 'PosstController@likePost']);
    Route::get('post/like/{id}', ['as' => 'post.like2', 'uses' => 'PosstController@likePost2']);

    //up and down from comments 
    //Route::get('/postsup', 'PosstController@index');
    // Route::get('/postsdown', 'PosstController@index');
    //track users 
    Route::get('add-to-log', 'HomeController@myTestAddToLog');
    Route::get('logActivity', 'HomeController@logActivity');
    //Route::get('/vorod', 'PosstController@vorod');
    Route::get('logActivity2', 'HomeController@logActivity2');

    Route::get('logActivity3', 'HomeController@logActivity3');




//posts

//Route::get('/posts', 'LiveTable@index');
Route::get('/posts/fetch_data/{id}', 'PosstController@fetch_data');
Route::post('/posts/add_data', 'PosstController@add_data')->name('posts.add_data');
Route::post('/posts/update_data', 'PosstController@update_data')->name('posts.update_data');
Route::post('/posts/delete_data', 'PosstController@delete_data')->name('posts.delete_data');

    //livetable


    
Route::get('/livetable', 'LiveTable@index');
Route::get('/livetable/fetch_data', 'LiveTable@fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');

    
    });
    Auth::routes();
    
    Route::post('login',[
        'uses' => 'SigninController@signin',
        'as'=> 'auth.signin'
    ]);
    


Route::get('/home', 'HomeController@index')->name('home');
