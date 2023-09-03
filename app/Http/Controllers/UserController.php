<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'statusCheck']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
        
    }

    public function getData()
    {
        $users = user::all();

        foreach ($users as $user) {
            $user->statusClass  = $this->getStatusClass($user->status);
            $user->date  = $user->created_at->format('Y-m-d h:i');
            $user->equipe  = User::find($user->id)->equipe->nom;
        }

        return response()->json($users);
        
    }

    private function getStatusClass($status)
    {
        switch ($status) {
            case 'Confirmé':
                return 'bg-green-500 text-whitee';
            case 'En période de teste':
                return 'bg-gray-600 text-white';
            default:
                return 'bg-red-500 text-white';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $equipes = Equipe::all();

        return view('users.create', compact('equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'equipe_id' => $request->equipe,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'cin' => $request->cin,
            'role' => $request->role,
            'status' => $request->status,
            'email' => $request->email,
            'password' => bcrypt('123456789')
        ]);

        notify()->success('Votre nouveau collaborateur a été créer avec succèss ', 'Bravo !');

        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $equipes = Equipe::all();
        $currentEquipe = User::find($user->id)->equipe->id;
        return view('users.modifier', compact('user', 'equipes', 'currentEquipe'));
    }

    public function profileShow(User $user){

        $collaboorateurs = User::where('equipe_id', User::find(auth()->user()->id)->equipe_id)->get();
        $equipe = User::find(auth()->user()->id)->equipe->nom;

        return view('users.profile', compact('user', 'collaboorateurs', 'equipe'));

    }

    public function setProfile(User $user, Request $request){

        User::where('id', auth()->user()->id)->update([
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password)
        ]);

        notify()->success('Votre compte a été modifié avec succèss ', 'Bravo !');

        return to_route('user.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        User::where('id', $user->id)->update([
            'equipe_id' => $request->equipe,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'role' => $request->role,
            'status' => $request->status,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        notify()->success('Votre collaborateur a été modifié avec succèss ', 'Bravo !');

        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        notify()->success('Votre collaborateur a été supprimé avec succèss ', 'Bravo !');

        return to_route('user.index');
    }
}
