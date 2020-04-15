<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

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

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Employees
    Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/media', 'EmployeesController@storeMedia')->name('employees.storeMedia');
    Route::resource('employees', 'EmployeesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Appointments
    Route::delete('appointments/destroy', 'AppointmentsController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentsController');

    // Availabilities
    Route::delete('availabilities/destroy', 'AvailabilitiesController@massDestroy')->name('availabilities.massDestroy');
    Route::resource('availabilities', 'AvailabilitiesController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});

$router->group(['prefix' => 'api/'], function () use ($router) {
    
        Route::get('appointment', 'AppointmentsController@showAllAppointments');
        Route::get('appointment/{appointment}', 'AppointmentsController@showOneAppointment');
        Route::post('appointment', 'AppointmentsController@create');
        Route::put('appointment/{appointment}', 'AppointmentsController@update');
        Route::delete('appointment/{appointment}', 'AppointmentsController@delete');


        Route::get('client', 'ClientController@showAllClients');
        Route::get('client/{client}', 'ClientController@showOneClient');
        Route::post('client', 'ClientController@store');
        Route::put('client/{client}', 'ClientController@update');
        Route::delete('client/{client}', 'ClientController@delete');



        Route::get('employee', 'EmployeeController@showAllEmployees');
        Route::get('employee/{employee}', 'EmployeeController@showOneEmployee');
        Route::post('employee', 'EmployeeController@store');
        Route::put('employee/{employee}', 'EmployeeController@update');
        Route::delete('employee/{employee}', 'EmployeeController@delete');

        Route::get('services', 'ServicesController@showAllServices');
        Route::get('services/{services}', 'ServicesController@showOneService');
        Route::post('services', 'ServicesController@store');
        Route::put('services/{services}', 'ServicesController@update');
        Route::delete('services/{services}', 'ServicesController@delete');

        Route::get('availability', 'AvailabilityController@showAllAvailabilities');
        Route::get('availability/{availability}', 'AvailabilityController@showOneAbility');
        // Route::post('availability', 'AvailabilityController@post');
        Route::put('availability/{availability}', 'AvailabilityController@update');
        Route::delete('availability/{availability}', 'AvailabilityController@delete');

});

$router->post('availability', 'BrianController@postAvailability');
