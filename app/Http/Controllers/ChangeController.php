<?php

namespace App\Http\Controllers;

use Hamcrest\BaseDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChangeController extends Controller
{
    //
    public function Changealbum(Request $request)
    {
        $artist = $request->input('artist');
        $album = $request->input('album');
        $image = $request->input('image');
        $description = $request->input('description');
        $id = $request->id;

        $primory_record = DB::table('album')->where('id', $id)->first();

        $log_string = "";
        if($primory_record->name != $album)
        {
            $log_string = $log_string."changed name from".$primory_record->name." to ".$album.". ";
        }
        if($primory_record->executor != $artist)
        {
            $log_string = $log_string."changed artist from".$primory_record->executor." to ".$artist.". ";
        }
        if($primory_record->image !=  $image)
        {
            $log_string = $log_string."changed image from".$primory_record->image." to ".$image.". ";
        }
        if($primory_record->description !=  $description)
        {
            $log_string = $log_string."changed description from ".$primory_record->description." to ".$description.". ";
        }



        DB::table('album')->where('id', $id)->update(['name'=> $album , 'executor' => $artist, 'image' => $image, 'description' => $description ]);
        $user_id = Auth::user()->id;
        if(strlen($log_string)>0)
        {
        DB::table('logs')->insert(['id'=>null,'changes' =>$log_string,'created_at' =>  date("Y-m-d H:i:s"),'updated_at'=> null, 'user_id' => $user_id, 	'album_id'=>$id]);
        return view('change_album',['id'=>$id])->with('msg',"Изменение прошло успешно");
        }
        return view('change_album',['id'=>$id])->with('msg',"Вы ничего не изменили");





    }
    public function change_album($id)
    {
        $record_info = DB::table('album')->where('id',$id)->first();
if(auth()->check()) {
    return view('change_album', ['record_info' => $record_info, 'id' => $id]);
}
else return redirect(url()->previous());
    }

    public function DeleteAlbum(Request $request)
    {
        $id =  $request->id;
        DB::table('album')->where('id',$id)->delete();
        return view('welcome');
    }


}


