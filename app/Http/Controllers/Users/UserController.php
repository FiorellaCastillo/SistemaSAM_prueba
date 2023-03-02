<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('roles', 'users.rol_id', '=', 'roles.id')
            ->join('locations', 'users.user_location_id', '=', 'locations.id')
            ->select('users.*', 'roles.description','locations.location_address')
            ->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new User;
        $roles = Role::all();
        $locations = Location::all();
        return view('users.create', compact('users', 'roles', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'identity_doc' => 'required',
            'string',
            'max:10',
            'name' => 'required',
            'string',
            'max:50',
            'first_lastname' => 'required',
            'string',
            'max:100',
            'second_lastname' => 'required',
            'string',
            'max:100',
            'email_address' => 'required',
            'string',
            'email',
            'max:255',
            'unique:users',
            'rol_id' => 'required',
            'int',
            'user_location_id' => 'required',
            'int',
            'user_phone_number' => 'required',
            'string',
            'max:10',
            'password' => [
                'required',
                'max:50',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirm' => 'required | same:password',
        ]);

        $user = new User();



        $user->identity_doc = $request->identity_doc;
        $user->name = $request->name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->email_address = $request->email_address;
        $user->rol_id = $request->rol_id;
        $user->user_location_id = $request->user_location_id;
        $user->user_phone_number = $request->user_phone_number;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index', $user)->with('create_user', 'El usuario se creó correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        //$roles = Role::pluck('description', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'identity_doc' => 'required',
            'string',
            'max:10',
            'name' => 'required',
            'string',
            'max:50',
            'first_lastname' => 'required',
            'string',
            'max:100',
            'second_lastname' => 'required',
            'string',
            'max:100',
            'email_address' => 'required',
            'string',
            'email',
            'max:255',
            'unique:users',
            'rol_id' => 'required',
            'int',
            'user_phone_number' => 'required',
            'string',
            'max:10',
        ]);





        $user->identity_doc = $request->identity_doc;
        $user->name = $request->name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->email_address = $request->email_address;
        $user->rol_id = $request->rol_id;
        $user->user_phone_number = $request->user_phone_number;
        $user->save();

        return redirect()->route('users.index', $user)->with('update_user', 'El usuario se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index', $user)->with('delete_user', 'El usuario se ha eliminado correctamente!');
    }
}