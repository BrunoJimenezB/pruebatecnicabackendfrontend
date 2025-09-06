<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.index'); // dashboard/index.blade.php
});

Route::get('/cliente', function () {
    return view('clientes.index'); // cliente/index.blade.php
});


Route::get('/zona', function () {
    return view('zonas.index'); 
});
Route::get('/zonasinventas', function () {
    return view('zonas.listadozonasinventas'); 
});
Route::get('/vendedorsinventas', function () {
    return view('ventas.listadovendedorsinventas'); 
});
Route::get('/clienteventas', function () {
    return view('ventas.listadoclienteventas'); 
});
Route::get('/productos', function () {
    return view('productos.index'); 
});
Route::get('/ventas', function () {
    return view('ventas.listadoventas'); 
});
Route::get('/crearventa', function () {
    return view('ventas.createventa'); 
});
Route::get('/crearcliente', function () {
    return view('clientes.crearcliente'); 
});
Route::get('/crearproducto', function () {
    return view('productos.crearproducto'); 
});



