<?php

Route::get('/', 'CustomController@welcomePage');

Route::get('/socialmedia-application-form', 'CustomController@socialmedia');

Route::post('postApplication', 'CustomController@postApp')->name('postApplication');

Route::get('/application-pondichery', 'CustomController@pondicheryApplicationForm');

Route::post('postPondicheryApplication', 'CustomController@postPondicheryApplicationForm')->name('postPondicheryApplication');

Route::get('/meeting-application', 'CustomController@meetingApplicationForm');

Route::post('postMeetingApplication', 'CustomController@postMeetingApplicationForm')->name('postMeetingApplication');

Route::get('get-subcategory-list','CustomController@getSubcategoryList');

Route::get('get-post-list','CustomController@getPostList');

Route::get('get-block-list','CustomController@getBlockList');

Route::get('get-panchayat-list','CustomController@getPanchayatList');

Route::get('get-townpanchayat-list','CustomController@getTownpanchayatList');

Route::get('get-townvattam-list','CustomController@getTownvattamList');

Route::get('get-municipality-list','CustomController@getMunicipalityList');

Route::get('get-municipalityvattam-list','CustomController@getMunicipalityvattamList');

Route::get('get-metropolitan-list','CustomController@getMetropolitanList');

Route::get('get-area-list','CustomController@getAreaList');

Route::get('get-metrovattam-list','CustomController@getMetrovattamList');

Route::get('get-pandisubcategory-list','CustomController@getPandiSubcategoryList');

Route::get('get-pandisubsubcategory-list','CustomController@getPandiSubsubcategoryList');

Route::get('advance-search', 'SearchController@search')->name('advance-search');

Route::post('search-results', 'SearchController@search_results')->name('searchresults');

Route::get('district-postings', 'SearchController@getPosting')->name('district-postings');

Route::post('district-postings', 'SearchController@getPosting')->name('postingresult');

Route::get('idcard', 'SearchController@idCard')->name('idcarddesign');

Route::get('letterhead', 'SearchController@letterHead')->name('letterheaddesign');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

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

    // Districtpostings
    Route::delete('districtpostings/destroy', 'DistrictpostingController@massDestroy')->name('districtpostings.massDestroy');
    Route::post('districtpostings/media', 'DistrictpostingController@storeMedia')->name('districtpostings.storeMedia');
    Route::post('districtpostings/ckmedia', 'DistrictpostingController@storeCKEditorImages')->name('districtpostings.storeCKEditorImages');
    Route::resource('districtpostings', 'DistrictpostingController');

    // Applications
    Route::delete('applications/destroy', 'ApplicationsController@massDestroy')->name('applications.massDestroy');
    Route::post('applications/media', 'ApplicationsController@storeMedia')->name('applications.storeMedia');
    Route::post('applications/ckmedia', 'ApplicationsController@storeCKEditorImages')->name('applications.storeCKEditorImages');
    Route::resource('applications', 'ApplicationsController');

    // Categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::resource('posts', 'PostsController');

    // Districts
    Route::delete('districts/destroy', 'DistrictsController@massDestroy')->name('districts.massDestroy');
    Route::resource('districts', 'DistrictsController');

    // Blocks
    Route::delete('blocks/destroy', 'BlocksController@massDestroy')->name('blocks.massDestroy');
    Route::resource('blocks', 'BlocksController');

    // Panchayats
    Route::delete('panchayats/destroy', 'PanchayatsController@massDestroy')->name('panchayats.massDestroy');
    Route::resource('panchayats', 'PanchayatsController');

    // Townpanchayats
    Route::delete('townpanchayats/destroy', 'TownpanchayatsController@massDestroy')->name('townpanchayats.massDestroy');
    Route::resource('townpanchayats', 'TownpanchayatsController');

    // Townvattams
    Route::delete('townvattams/destroy', 'TownvattamController@massDestroy')->name('townvattams.massDestroy');
    Route::resource('townvattams', 'TownvattamController');

    // Municipalities
    Route::delete('municipalities/destroy', 'MunicipalityController@massDestroy')->name('municipalities.massDestroy');
    Route::resource('municipalities', 'MunicipalityController');

    // Municipalityvattams
    Route::delete('municipalityvattams/destroy', 'MunicipalityvattamController@massDestroy')->name('municipalityvattams.massDestroy');
    Route::resource('municipalityvattams', 'MunicipalityvattamController');

    // Metropolitans
    Route::delete('metropolitans/destroy', 'MetropolitanController@massDestroy')->name('metropolitans.massDestroy');
    Route::resource('metropolitans', 'MetropolitanController');

    // Areas
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Metrovattams
    Route::delete('metrovattams/destroy', 'MetrovattamController@massDestroy')->name('metrovattams.massDestroy');
    Route::resource('metrovattams', 'MetrovattamController');

    // Subcategories
    Route::delete('subcategories/destroy', 'SubcategoryController@massDestroy')->name('subcategories.massDestroy');
    Route::resource('subcategories', 'SubcategoryController');

    // Assemblies
    Route::delete('assemblies/destroy', 'AssemblysController@massDestroy')->name('assemblies.massDestroy');
    Route::resource('assemblies', 'AssemblysController');

    // Postings
    Route::delete('postings/destroy', 'PostingsController@massDestroy')->name('postings.massDestroy');
    Route::post('postings/media', 'PostingsController@storeMedia')->name('postings.storeMedia');
    Route::post('postings/ckmedia', 'PostingsController@storeCKEditorImages')->name('postings.storeCKEditorImages');
    Route::resource('postings', 'PostingsController');

    // Category Pondicheries
    Route::delete('category-pondicheries/destroy', 'CategoryPondicheryController@massDestroy')->name('category-pondicheries.massDestroy');
    Route::resource('category-pondicheries', 'CategoryPondicheryController');

    // Subcategory Pondicheries
    Route::delete('subcategory-pondicheries/destroy', 'SubcategoryPondicheryController@massDestroy')->name('subcategory-pondicheries.massDestroy');
    Route::resource('subcategory-pondicheries', 'SubcategoryPondicheryController');

    // Subsubcategories
    Route::delete('subsubcategories/destroy', 'SubsubcategoryController@massDestroy')->name('subsubcategories.massDestroy');
    Route::resource('subsubcategories', 'SubsubcategoryController');

    // Pondicheryapplications
    Route::delete('pondicheryapplications/destroy', 'PondicheryapplicationsController@massDestroy')->name('pondicheryapplications.massDestroy');
    Route::post('pondicheryapplications/media', 'PondicheryapplicationsController@storeMedia')->name('pondicheryapplications.storeMedia');
    Route::post('pondicheryapplications/ckmedia', 'PondicheryapplicationsController@storeCKEditorImages')->name('pondicheryapplications.storeCKEditorImages');
    Route::resource('pondicheryapplications', 'PondicheryapplicationsController');

    // Pondicherypostings
    Route::delete('pondicherypostings/destroy', 'PondicherypostingsController@massDestroy')->name('pondicherypostings.massDestroy');
    Route::post('pondicherypostings/media', 'PondicherypostingsController@storeMedia')->name('pondicherypostings.storeMedia');
    Route::post('pondicherypostings/ckmedia', 'PondicherypostingsController@storeCKEditorImages')->name('pondicherypostings.storeCKEditorImages');
    Route::resource('pondicherypostings', 'PondicherypostingsController');

    // Districtspondicheries
    Route::delete('districtspondicheries/destroy', 'DistrictspondicheryController@massDestroy')->name('districtspondicheries.massDestroy');
    Route::resource('districtspondicheries', 'DistrictspondicheryController');

    // Pondicheryassemblies
    Route::delete('pondicheryassemblies/destroy', 'PondicheryassemblysController@massDestroy')->name('pondicheryassemblies.massDestroy');
    Route::resource('pondicheryassemblies', 'PondicheryassemblysController');

        // Meetings
    Route::delete('meetings/destroy', 'MeetingsController@massDestroy')->name('meetings.massDestroy');
    Route::post('meetings/media', 'MeetingsController@storeMedia')->name('meetings.storeMedia');
    Route::post('meetings/ckmedia', 'MeetingsController@storeCKEditorImages')->name('meetings.storeCKEditorImages');
    Route::resource('meetings', 'MeetingsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});