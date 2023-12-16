<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use PHPUnit\Exception;

class CreateAlbumController extends Controller
{
    //
    public function create_album()
    {
        return view('create_album');
    }

    public function Addalbum(Request $request)
    {

            $executor = $request->input('artist');
            $name = $request->input('album');
            $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=910dff93a7217da36fa3b5bf256c34f1&artist='.$executor.'&album='.$name.'&format=json');

        if($response->status() == 200)
        {

                $record = json_decode($response);
                $img_arry = (array)$record->album->image[3];
                $img = $img_arry['#text'];

                $count = DB::select("select COUNT(*) as count FROM album as t1 WHERE t1.name = '$name' AND t1.executor = '$executor'");


                    if($count[0]->count != 0)
                    {
                        return view('create_album', ['count' => $count])->with('msg', 'Запись уже существует');
                    }
                    else if ($request->input('image') == null or $request->input('description') == null) {

                        return view('create_album', ['img' => $img, 'artist' => $name, 'album' => $executor, 'record' => $record]);

                    }

                    else
                    {

                        DB::table('album')->insert(['id'=>null,'name'=> $name , 'executor' => $executor , 'image' => $img_arry['#text'],'description'=> $request->input('description')]);
                        return view('create_album')->with('msg', 'Запись успешно добавлена');
                    }


        }
        else
        {

            return view('create_album')->with('msg', 'Запись не найдена');

        }
    }

}
