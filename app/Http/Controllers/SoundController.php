<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sounds = Sound::orderBy('id', 'DESC')->get();
        return view('admin.sounds.sound_library',compact('sounds'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'sound' => 'required|mimes:audio/mpeg,mpga,mp3,wav,aac,ogg'
        ]);

        if($request->hasFile('sound')){
            $uniqueid=uniqid();
            $original_name=$request->file('sound')->getClientOriginalName();
            $size=$request->file('sound')->getSize();
            $extension=$request->file('sound')->getClientOriginalExtension();
            $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
            $audiopath=url('/storage/upload/files/audio/'.$filename);
            $path=$request->file('sound')->move(public_path("upload/files/audio/"), $filename);
            $all_audios=$audiopath;
        }

        $create = Sound::create([
           'file' => $filename,
        ]);
if($create){
    $notification = array(
        'message' => "Sound is uploaded",
        'type' => "success"
    );
}else{
    $notification = array(
        'message' => "Sound is not uploaded",
        'type' => "error"
    );
}

        return redirect()->route('sound')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sound  $sound
     * @return \Illuminate\Http\Response
     */
    public function show(Sound $sound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sound  $sound
     * @return \Illuminate\Http\Response
     */
    public function edit(Sound $sound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sound  $sound
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sound $sound)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sound  $sound
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sound $sound)
    {
        //
    }
    public function sound_delete($id){
      $sound = Sound::select('file')->find($id);
      $filename = $sound->file;
      unlink(public_path('/upload/files/audio/'.$filename));
      $delete = Sound::where('id',$id)->delete();
      if($delete){
          return redirect()->back();
      }else{
          return redirect()->back();
      }

    }
}
