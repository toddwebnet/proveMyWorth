<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getUserDataCollection()
    {
        $user = Auth::user();
        if ($user === null) {
            return [];
        }
        $userProfile = $user->userProfile()->get()->first();
        $address = $userProfile->address()->get()->first();

        $data = array_merge(
            $user->toArray(),
            $userProfile->toArray(),
            $address->toArray()
        );
        unset($data['created_at']);
        unset($data['updated_at']);
        return $data;
    }

    public function dashboard()
    {
        $data = $this->getUserDataCollection();
        return view('ajax.dashboard', $data);
    }

    public function profileForm()
    {
        $data = $this->getUserDataCollection();
        return view('ajax.profileform', $data);
    }

    protected function saveProfileValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150',
            'birthdate' => 'required|date',
            'phone_number' => 'required|max:150',
            'street'=> 'required|max:150',
            'city'=> 'required|max:150',
            'state'=> 'required|max:150',
            'zip'=> 'required|max:150',
            'latitude'=> 'required|max:150',
            'longitude'=> 'required|max:150',
        ]);
    }
    public function saveProfile(Request $request)
    {
        $this->saveProfileValidator($request->all())->validate();

        $user = Auth::user();
        $userProfile = $user->userProfile()->get()->first();
        $address = $userProfile->address()->get()->first();

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $userProfile->update([
            'birthdate' => $request->input('birthdate'),
            'phone_number' => $request->input('phone_number'),
        ]);

        $address->update([
            'street'=> $request->input('street'),
            'city'=> $request->input('city'),
            'state'=> $request->input('state'),
            'zip'=> $request->input('zip'),
            'latitude'=> $request->input('latitude'),
            'longitude'=> $request->input('longitude'),
        ]);

        return $this->dashboard();
    }
}