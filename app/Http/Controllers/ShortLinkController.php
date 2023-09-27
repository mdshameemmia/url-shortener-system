<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Exception;
use Illuminate\Http\Request;

class ShortLinkController extends Controller

{
    public function dashboard()
    {
        $urls = ShortLink::orderBy('id','DESC')->where('user_id',auth()->user()->id)->get();

        return view('dashboard',compact('urls'));
    }
    public function generateShortUrl(Request $request)
    {
        try{
            $request->validate([
                'original_url' => 'required|url'
             ]);

             ShortLink::createShortLink($request->original_url);

             $urls = ShortLink::orderBy('id','DESC')->get();

             return redirect()->to('/dashboard');


        }catch(Exception $e){
            dd($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function redirect($url)
    {
       $url = ShortLink::where('short_url',$url)->first();
       $prev_visit = $url->total_visit;

       // db update
       $total_visit = $prev_visit + 1;
       $url->total_visit = $total_visit;
       $url->save();

        return redirect()->to($url->original_url);
    }

    public function api()
    {
        $urls = ShortLink::orderBy('id','DESC')->get()->toJson();
        return $urls;

    }
}
