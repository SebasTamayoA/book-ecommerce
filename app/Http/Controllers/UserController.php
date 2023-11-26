<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequestCreate;
use App\Http\Requests\UserRequestUpdate;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $updateUserProfileInformation;
    protected $updateUserPassword;

    public function __construct(
        UpdateUserProfileInformation $updateUserProfileInformation,
        UpdateUserPassword $updateUserPassword
    ) {
        $this->updateUserProfileInformation = $updateUserProfileInformation;
        $this->updateUserPassword = $updateUserPassword;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequestCreate $request)
    {
        $createNewUser = new CreateNewUser();
        $createNewUser->create($request->all());
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateProfile(UserRequestUpdate $request, User $user)
    {
        // Actualizar la información del perfil
        $this->updateUserProfileInformation->update($user, $request->only('name', 'email'));

        return redirect('/users');
    }

    public function updatePassword(UserRequestUpdate $request, User $user)
    {
        $this->updateUserPassword->update($user, $request->all());

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
