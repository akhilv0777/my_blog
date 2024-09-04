<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminIndex()
    {
        return view('admin.index');
    }
    public function AdminProfile()
    {

        $Profile = User::find(auth()->id());
        return view('admin.profile.index', compact('Profile'));
    }

    public function AdminProfileUpdate(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'profile_picture' => $this->handleProfilePhoto($request, $user->profile_picture) ?? $user->profile_picture,
        ]);
        return redirect()->back()->with('success', 'Record updated successfully.');
    }

    private function handleProfilePhoto(Request $request, $currentPhoto)
    {
        if ($request->hasFile('profile_picture')) {
            if ($currentPhoto && file_exists(public_path($currentPhoto))) {
                unlink(public_path($currentPhoto));
            }
            $imageName = time() . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->move(public_path('admin/uploads/ProfilePhoto/'), $imageName);
            return 'admin/uploads/ProfilePhoto/' . $imageName;
        }

        return $currentPhoto;
    }
    public function Users()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users'));
    }
}
