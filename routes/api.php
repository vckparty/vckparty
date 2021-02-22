<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Districtpostings
    Route::post('districtpostings/media', 'DistrictpostingApiController@storeMedia')->name('districtpostings.storeMedia');
    Route::apiResource('districtpostings', 'DistrictpostingApiController');

    // Applications
    Route::post('applications/media', 'ApplicationsApiController@storeMedia')->name('applications.storeMedia');
    Route::apiResource('applications', 'ApplicationsApiController');

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Posts
    Route::apiResource('posts', 'PostsApiController');

    // Districts
    Route::apiResource('districts', 'DistrictsApiController');

    // Blocks
    Route::apiResource('blocks', 'BlocksApiController');

    // Panchayats
    Route::apiResource('panchayats', 'PanchayatsApiController');

    // Townpanchayats
    Route::apiResource('townpanchayats', 'TownpanchayatsApiController');

    // Townvattams
    Route::apiResource('townvattams', 'TownvattamApiController');

    // Municipalities
    Route::apiResource('municipalities', 'MunicipalityApiController');

    // Municipalityvattams
    Route::apiResource('municipalityvattams', 'MunicipalityvattamApiController');

    // Metropolitans
    Route::apiResource('metropolitans', 'MetropolitanApiController');

    // Areas
    Route::apiResource('areas', 'AreaApiController');

    // Metrovattams
    Route::apiResource('metrovattams', 'MetrovattamApiController');

    // Subcategories
    Route::apiResource('subcategories', 'SubcategoryApiController');

    // Assemblies
    Route::apiResource('assemblies', 'AssemblysApiController');

    // Postings
    Route::post('postings/media', 'PostingsApiController@storeMedia')->name('postings.storeMedia');
    Route::apiResource('postings', 'PostingsApiController');

    // Category Pondicheries
    Route::apiResource('category-pondicheries', 'CategoryPondicheryApiController');

    // Subcategory Pondicheries
    Route::apiResource('subcategory-pondicheries', 'SubcategoryPondicheryApiController');

    // Subsubcategories
    Route::apiResource('subsubcategories', 'SubsubcategoryApiController');

    // Pondicheryapplications
    Route::post('pondicheryapplications/media', 'PondicheryapplicationsApiController@storeMedia')->name('pondicheryapplications.storeMedia');
    Route::apiResource('pondicheryapplications', 'PondicheryapplicationsApiController');

    // Pondicherypostings
    Route::post('pondicherypostings/media', 'PondicherypostingsApiController@storeMedia')->name('pondicherypostings.storeMedia');
    Route::apiResource('pondicherypostings', 'PondicherypostingsApiController');

    // Districtspondicheries
    Route::apiResource('districtspondicheries', 'DistrictspondicheryApiController');

    // Pondicheryassemblies
    Route::apiResource('pondicheryassemblies', 'PondicheryassemblysApiController');
        // Trainings
    Route::post('trainings/media', 'TrainingApiController@storeMedia')->name('trainings.storeMedia');
    Route::apiResource('trainings', 'TrainingApiController');
});
