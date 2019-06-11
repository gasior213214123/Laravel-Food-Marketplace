<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function __contruct()
    {
        $this->middleware('permission', ['except' => ['show']]);
    }
    */
    public function index()
    {
        //
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
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (intval($id) !== Auth::id()) {
            abort(403, 'Brak dostępu do konta użytkownika');
        }
        $user = User::FindOrFail($id);
        return view('users.show', compact('user')); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        if (intval($id) !== Auth::id()) {
            abort(403, 'Brak dostępu do konta użytkownika');
        }
        $user = Auth::user();
        
        return view('users.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (intval($id) !== Auth::id()) {
            abort(403, 'Brak dostępu do konta użytkownika');
        }
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                'email',
                Rule::unique('users')->ignore($id), 
            ],
            'phone' => 'required|string|min:6|max:15',
            'city' => 'required|string|min:2|max:20',
            'adress' => 'required|string|min:6|max:40',
        ]);
        
        $user = User::Find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->occupation = $request->occupation;
        $user->city = $request->city;
        $user->adress = $request->adress;
        $user->save();
        
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::FindOrFail($id);
        $admin = User::FindOrFail(Auth::id());
        $restaurant = Restaurant::Where('worker_id', $user->id)->exists();

        if ($admin->occupation !== 'Admin') {
            abort(403, 'Tylko administrator może usuwać użytkowników');
        }
        elseif ($user->occupation == 'Admin' ) {
            abort(403, 'Nie można usuwać konta administratora');
        }
        elseif ($user->occupation == 'Worker' && $restaurant == 'true') {           
            abort(403, 'Użytkownik posiada restauracje, która najpierw musisz usunać');
        }
        User::where([
            'id' => $id
        ])->delete();

        return back();
    }
}
