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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
        Route::get('/dashboard', 'DashboardController@index');

        // Barang
        Route::get('/barang', 'BarangController@index');
        Route::resource('barang/tambah','BarangController@create');
        Route::post('/barang/store','BarangController@store');
        Route::get('/barang/hapus/{id}','BarangController@destroy');
        Route::get('/barang/edit/{id}','BarangController@edit');
        Route::post('/barang/update/{id}','BarangController@update');
        Route::get('/barang/detail/{id}','BarangController@detail');
        Route::get('/barang/pdf/{id}','BarangController@pdf');

        // BarangMasuk
        Route::get('/barangmasuk', 'BarangMasukController@index');
        Route::resource('barangmasuk/tambah', 'BarangMasukController@create');
        Route::post('/barangmasuk/store', 'BarangMasukController@store');
        Route::get('/barangmasuk/hapus/{id}', 'BarangMasukController@destroy');
        Route::get('/barangmasuk/edit/{id}', 'BarangMasukController@edit');
        Route::post('/barangmasuk/update/{id}', 'BarangMasukController@update');
        Route::get('/barangmasuk/detail/{id}', 'BarangMasukController@detail');
        Route::get('/barangmasuk/pdf/{id}', 'BarangMasukController@pdf');

        // BarangKeluar
        Route::get('/barangkeluar', 'BarangKeluarController@index');
        Route::resource('barangkeluar/tambah', 'BarangKeluarController@create');
        Route::post('/barangkeluar/store', 'BarangKeluarController@store');
        Route::get('/barangkeluar/hapus/{id}', 'BarangKeluarController@destroy');
        Route::get('/barangkeluar/edit/{id}', 'BarangKeluarController@edit');
        Route::post('/barangkeluar/update/{id}', 'BarangKeluarController@update');
        Route::get('/barangkeluar/detail/{id}', 'BarangKeluarController@detail');
        Route::get('/barangkeluar/pdf/{id}', 'BarangKeluarController@pdf');

        // Supplier
        Route::get('/supplier', 'SupplierController@index');
        Route::resource('supplier/tambah', 'SupplierController@create');
        Route::post('/supplier/store', 'SupplierController@store');
        Route::get('/supplier/hapus/{id}', 'SupplierController@destroy');
        Route::get('/supplier/edit/{id}', 'SupplierController@edit');
        Route::post('/supplier/update/{id}', 'SupplierController@update');
        Route::get('/supplier/detail/{id}', 'SupplierController@detail');
        Route::get('/supplier/pdf/{id}', 'SupplierController@pdf');

        // Stok
        Route::get('/stok', 'StokController@index');
        Route::resource('stok/tambah', 'StokController@create');
        Route::post('/stok/store', 'StokController@store');
        Route::get('/stok/hapus/{id}', 'StokController@destroy');
        Route::get('/stok/edit/{id}', 'StokController@edit');
        Route::post('/stok/update/{id}', 'StokController@update');
        Route::get('/stok/detail/{id}', 'StokController@detail');
        Route::get('/stok/pdf/{id}', 'StokController@pdf');

        // PinjamBarang
        Route::get('/pinjambarang', 'PinjamBarangController@index');
        Route::resource('pinjambarang/tambah', 'PinjamBarangController@create');
        Route::post('/pinjambarang/store', 'PinjamBarangController@store');
        Route::get('/pinjambarang/hapus/{id}', 'PinjamBarangController@destroy');
        Route::get('/pinjambarang/edit/{id}', 'PinjamBarangController@edit');
        Route::post('/pinjambarang/update/{id}', 'PinjamBarangController@update');
        Route::get('/pinjambarang/detail/{id}', 'PinjamBarangController@detail');
        Route::get('/pinjambarang/pdf/{id}', 'PinjamBarangController@pdf');

        // Lokasi
        Route::get('/lokasi', 'LokasiController@index');
        Route::resource('lokasi/tambah', 'LokasiController@create');
        Route::post('/lokasi/store', 'LokasiController@store');
        Route::get('/lokasi/hapus/{id}', 'LokasiController@destroy');
        Route::get('/lokasi/edit/{id}', 'LokasiController@edit');
        Route::post('/lokasi/update/{id}', 'LokasiController@update');
        Route::get('/lokasi/detail/{id}', 'LokasiController@detail');

        // Kategori
        Route::get('/kategori', 'KategoriController@index');
        Route::resource('kategori/tambah', 'KategoriController@create');
        Route::post('/kategori/store', 'KategoriController@store');
        Route::get('/kategori/hapus/{id}', 'KategoriController@destroy');
        Route::get('/kategori/edit/{id}', 'KategoriController@edit');
        Route::post('/kategori/update/{id}', 'KategoriController@update');
        Route::get('/kategori/detail/{id}', 'KategoriController@detail');

});

//Admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', function () {
        return view('admin');
    });
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
