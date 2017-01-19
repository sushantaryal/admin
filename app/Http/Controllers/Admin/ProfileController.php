<?php

namespace Source\Http\Controllers\Admin;

use Image;
use Source\Models\User;
use Illuminate\Http\Request;
use Source\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
    * Get Profile page
    * 
    * @return Response
    */
    public function profile()
    {
        $user = auth()->user();

        return view('admin.users.profile', compact('user'));
    }

    /**
    * Update profile
    * 
    * @return Response
    */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->save();

        flash('Profile has been updated successfully.', 'success');
        return back();
    }

    /**
    * Change password
    * 
    * @return Response
    */
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        flash('Password has been changed successfully.', 'success');
        return back();
    }

    /**
    * Update avatar
    * 
    * @return Response
    */
    public function updateAvatar(Request $request)
    {
        $avatar = $request->file('avatar');
        $path = 'uploads/users/';
        $extension = $avatar->getClientOriginalExtension();
        $filename = generateFilename($path, $extension);

        // Upload Original
        $image = Image::make($avatar)->save($path . $filename);
        // Upload thumbnail
        $thumbimage = Image::make($avatar)->fit(200)->save($path . 'thumbs/' . $filename);

        if( !$image || !$thumbimage ) {
            flash('Server error while uploading.', 'danger');
            return back();
        }

        $user = auth()->user();
        if($user->avatar && app('files')->exists($user->avatar)) {
            app('files')->delete($user->avatar);
            app('files')->delete($user->avatar_thumb);
        }
        $user->avatar = $path . $filename;
        $user->avatar_thumb = $path . 'thumbs/' . $filename;
        $user->save();
        
        flash('Avatar has been updated successfully.', 'success');
        return back();
    }

    /**
    * Remove avatar
    * 
    * @return Response
    */
    public function removeAvatar(Request $request)
    {
        $user = auth()->user();
        if($user->avatar && app('files')->exists($user->avatar)) {
            app('files')->delete($user->avatar);
            app('files')->delete($user->avatar_thumb);
        }
        $user->avatar = null;
        $user->avatar_thumb = null;
        $user->save();
        
        flash('Avatar has been removed successfully.', 'success');
        return back();
    }

}
