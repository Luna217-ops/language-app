<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

/*
 Laboratorio 1
 */

// Crea una ruta en Laravel que responda a la URL /hello y devuelva el texto “¡Hola,Laravel!” cuando se acceda a ella.
Route::get("/hello", function () {
    return "¡Hola, Laravel!";
});

// Define una ruta que acepte un parámetro id y devuelva un mensaje que diga “El ID del artículo es [id]”, donde [id] es el valor del parámetro.
Route::get("/item/{input_id}", function ($input_id) {
    return "El ID del artículo es $input_id";
});

// Crea una ruta que acepte un parámetro opcional name. Si se proporciona, devuelve “Hola, [name]”; si no se proporciona, devuelve “Hola, invitado”.
Route::get("/call-me/{who?}", function ($who = "invitado") {
    return "Hola, $who";
});


// Define una ruta que acepte solo números en el parámetro orderId. Asegúrate de que la ruta solo se pueda acceder si orderId es un número entero.
Route::get("/only-number/{orderId}", function ($orderId) {
    return "Soy un entero $orderId";
})->whereNumber('orderId', '[0-9]+');

// Asigna el nombre profile a una ruta que acepte un parámetro username y muestra una vista que salude al usuario con su nombre. Usa el nombre de la ruta para generar la URL en una vista.
Route::get("/profile/{username}", function ($username) {
    return view('profile', ['username' => $username]);
})->name('profile');

// Crea una ruta /welcome que devuelva la vista welcome.blade.php. Asegúrate de que la vista se muestre cuando se accede a esta ruta.
Route::get("/welcome", function () {
    return view('welcome');
});

// Crea una ruta /old-page que redirija a /new-page. Asegúrate de que la redirección funcione correctamente cuando accedas a /old-page.
Route::redirect("/old-page", '/new-page');
Route::get("/new-page", function () {
    return view('new-page');
});

// Define una ruta /items que llame al método list del ItemController. Asegúrate de que esta ruta esté correctamente vinculada al método del controlador.
Route::get("/items", [ItemController::class, 'list']);
