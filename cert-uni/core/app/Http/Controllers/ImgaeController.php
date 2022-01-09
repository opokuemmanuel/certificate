<?php

namespace App\Http\Controllers;


use App\images;
use App\imgae;
use Illuminate\Http\Request;

use Image;


class ImgaeController extends Controller
{
    public function Image()
    {
        return view('image');
    }

    public function add_image(Request $request)
    {
        $image       = $request->file('photo');

        $filename    = $image->getClientOriginalName();


        $ALL = images::where('school',$request->university_name)->get();

        if (sizeof($ALL)==1){
            return back()->with('success', 'image already added');
        }else{
            Image::make($image)->resize(142,140)->save(public_path('/post/'.$filename));

            $image= new images();

            $image->image = $filename;
            $image->school = $request->university_name;
            $image->save();

            return back()->with('success', 'image saved');
        }

    }

    public function edit_image(Request $request)
    {

        $all['pro'] = images::where('school',$request->university_name)->get();
        return view('All_image')->with($all);
    }

    public function ShowEdit($school=null)
    {

        $arr = images::where('school',$school)->first();

        return view('EditImgae')->with(compact('arr'));

    }

    public function delete($school=null)
    {
        images::where('school',$school)->delete();

        return view('image')->with('successMsg','Image deleted successfully');

    }

    public function updateImage(Request $request)
    {
        $image      = $request->file('photo');

        $filename    = $image->getClientOriginalName();

        Image::make($image)->resize(142,140)->save(public_path('/post/'.$filename));

        $product=  imgae::find($request->university_name);

        $product->image = $filename;

        $product->school = $request->university_name;

        $yourdat =  $product->save();

        $all['pro'] = images::where('school',$request->university_name)->get();
        return view('All_image')->with($all)->with('successMsg','Image updated successfully');
    }
}
