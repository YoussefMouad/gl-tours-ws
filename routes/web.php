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

use App\Ad;
use App\Place;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
//    $place = new Place;
//    $place->name = "Afriquia Gas Station";
//    $place->picture = "http://127.0.0.1:8000/storage/places/April2019/GacoyjXq6njZDWf9AJz8.png";
//    $place->location = ["latitude" => 34.060319, "longitude" => -4.9438143];

    $place = Place::find("5cd99c840dcd78306c003cae");

    $ad = new Ad;
    $ad->title = "Barrows LLC";
    $ad->description = "Vel totam dolor consequatur cupiditate molestiae. Error autem temporibus ad qui reiciendis. Corrupti laborum quia voluptatem perspiciatis est. In unde eum cumque dicta natus aut similique.";
    $ad->date = new DateTime();
    $ad->picture = "ads\\April2019\\9Yra17GtutakLQZJXTNO.png";
    $ad->save();

    $place->save();
    $ad = $place->ads()->save($ad);


    dd($place->id, $ad);
});

Route::get('/test2', function () {
    $places = Place::where('location', 'near', [
        '$geometry' => [
            'type' => 'Point',
            'coordinates' => [
                "latitude" => 34.0600814, "longitude" => -4.9457359
            ],
        ],
        '$maxDistance' => 500,
    ]);
    return $places->get();
});
