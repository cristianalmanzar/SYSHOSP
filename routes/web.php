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
//MEDICO//
Route::get('/medicos', 'MedicoController@index')->name('medicos');
Route::get('/medicos/crear', 'MedicoController@create')->name('medicos.crear');
Route::get('/medicos/{id}', 'MedicoController@show')->name('medicos.mostrar');
Route::post('medicos', 'MedicoController@store')->name('medicos.guardar');
Route::get('medicos/delete/{id}', 'MedicoController@destroy')->name('medicos.eliminar');
Route::post('medicos/update', 'MedicoController@update')->name('medicos.editar');
//MEDICO//

//PACIENTE//
Route::get('/pacientes', 'PacienteController@index')->name('pacientes');
Route::get('/pacientes/crear', 'PacienteController@create')->name('pacientes.crear');
Route::get('/pacientes/{id}', 'PacienteController@show')->name('pacientes.mostrar');
Route::post('pacientes', 'PacienteController@store')->name('pacientes.guardar');
Route::get('pacientes/delete/{id}', 'PacienteController@destroy')->name('pacientes.eliminar');
Route::post('pacientes/update', 'PacienteController@update')->name('pacientes.editar');
//PACIENTE//


//HOSPITAL//
Route::get('/hospitales', 'HospitalController@index')->name('hospitales');
Route::get('/hospitales/crear', 'HospitalController@create')->name('hospitales.crear');
Route::get('/hospitales/{id}', 'HospitalController@show')->name('hospitales.mostrar');
Route::post('hospitales', 'HospitalController@store')->name('hospitales.guardar');
Route::get('hospitales/delete/{id}', 'HospitalController@destroy')->name('hospitales.eliminar');
Route::post('hospitales/update', 'HospitalController@update')->name('hospitales.editar');
//HOSPITAL//


//ENFERMEDAD//
Route::get('/enfermedades', 'EnfermedadController@index')->name('enfermedades');
Route::get('/enfermedades/crear', 'EnfermedadController@create')->name('enfermedades.crear');
Route::get('/enfermedades/{id}', 'EnfermedadController@show')->name('enfermadades.mostrar');
Route::post('enfermedades', 'EnfermedadController@store')->name('enfermedades.guardar');
Route::get('enfermedades/delete/{id}', 'EnfermedadController@destroy')->name('enfermedades.eliminar');
Route::post('enfermedades/update', 'EnfermedadController@update')->name('enfermedades.editar');
//ENFERMEDAD//

//CITAS//
Route::get('/citas', 'CitaController@index')->name('citas');
Route::get('/citas/crear', 'CitaController@create')->name('citas.crear');
Route::get('/citas/{id}', 'CitaController@show')->name('citas.mostrar');
Route::post('citas', 'CitaController@store')->name('citas.guardar');
Route::get('citas/delete/{id}', 'CitaController@destroy')->name('citas.eliminar');
Route::post('citas/update', 'CitaController@update')->name('citas.editar');
//CITAS///

//VISITAS//
Route::get('/visitas', 'VisitaMedicaController@index')->name('visitas');
Route::get('/visitas/crear', 'VisitaMedicaController@create')->name('visitas.crear');
Route::get('/visitas/{id}', 'VisitaMedicaController@show')->name('visitas.mostrar');
Route::post('visitas', 'VisitaMedicaController@store')->name('visitas.guardar');
Route::get('visitas/delete/{id}', 'VisitaMedicaController@destroy')->name('visitas.eliminar');
Route::post('visitas/update', 'VisitaMedicaController@update')->name('visitas.editar');
//VISITAS//

//DIAGNOSTICOS//
Route::get('/diagnosticos', 'DiagnosticoController@index')->name('diagnosticos');
Route::get('/diagnosticos/crear', 'DiagnosticoController@create')->name('diagnosticos.crear');
Route::get('/diagnosticos/{id}', 'DiagnosticoController@show')->name('diagnosticos.mostrar');
Route::post('diagnosticos', 'DiagnosticoController@store')->name('diagnosticos.guardar');
Route::get('diagnosticos/delete/{id}', 'DiagnosticoController@destroy')->name('diagnosticos.eliminar');
Route::post('diagnosticos/update', 'DiagnosticoController@update')->name('diagnosticos.editar');
//DIAGNOSTICOS//


//ADMISION//
Route::get('/admisiones', 'AdmisionController@index')->name('admisiones');
Route::get('/admisiones/crear', 'AdmisionController@create')->name('admisiones.crear');
Route::get('/admisiones/{id}', 'AdmisionController@show')->name('admisiones.mostrar');
Route::post('admisiones', 'AdmisionController@store')->name('admisiones.guardar');
Route::post('admisiones/update', 'AdmisionController@update')->name('admisiones.editar');
Route::get('admisiones/delete/{id}', 'AdmisionController@destroy')->name('admisiones.eliminar');

//ADMISION//


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
