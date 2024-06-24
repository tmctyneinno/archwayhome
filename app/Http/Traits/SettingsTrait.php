<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait SettingsTrait
{
  

    public function uploadImageAboutUs($request, $fieldName, $destinationPath)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path($destinationPath), $imageName);
            return $destinationPath . '/' . $imageName;
        }
        return null;
    }

    public function handleUpdateAboutUsImage($request, $aboutUs){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('aboutUsImages'), $imageName);
            if ($aboutUs->image) {
                unlink(public_path($aboutUs->image));
            }
            $aboutUs->image = 'aboutUsImages/' . $imageName;
            $aboutUs->save();
        }
    }
}