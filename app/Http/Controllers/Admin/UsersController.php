<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate('10')->all();
        // return view('admin.users.index')->with('users', $users);
        // $users = DB::table('users')->select('*')->orderBy('nom', 'asc')->get();
        return view('admin.users.index', compact('users'));
        // ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'cni' => ['required'],
            'naissance' => ['required'],
            'fonction' => ['required'],
            'photo' => ['required'],
            'matricule' => ['nullable'],
            'password' => ['required', 'same:password_confirm'],
            // 'password_confirm' => ['required', 'same:password'],
        ]);
        $user = new User();
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->prenom = $request->prenom;
        $user->contact = $request->contact;
        $user->matricule = $request->matricule;
        $user->cni = $request->cni;
        $user->fonction = $request->fonction;
        $user->naissance = $request->naissance;
        $user->password = $request->password;
        $user['password'] = Hash::make($request['password']);
        $user['password_confirm'] = Hash::make($request['password_confirm']);
        // $user->password_confirm = $request->password_confirm;
        if ($request->photo) {
            $doc_lm = $request->photo;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $user->photo = $lm_name;
        }

        $user->save();
        // Alert::success('succes', "nouvel agent ajouté!");
        // return Redirect::back('admin.users.index')->with("success", "agent ajouté avec succès!");
        return redirect()->route("admin.users.index")->with("success",  "agent ajouté avec succès!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'cni' => ['required'],
            'naissance' => ['required'],
            'fonction' => ['required'],
            'photo' => ['required'],
            'matricule' => ['nullable'],
            'password' => ['required', 'same:password_confirm'],
            // 'password_confirm' => ['required', 'same:password'],
        ]);
        $user = new User();
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->prenom = $request->prenom;
        $user->contact = $request->contact;
        $user->matricule = $request->matricule;
        $user->cni = $request->cni;
        $user->fonction = $request->fonction;
        $user->naissance = $request->naissance;
        $user['password'] = Hash::make($request['password']);
        $user['password_confirm'] = Hash::make($request['password_confirm']);
        // $user->password_confirm = $request->password_confirm;
        if ($request->photo) {
            $doc_lm = $request->photo;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $user->photo = $lm_name;
        }

        //     $mailinterne = ['signo.aviet@uvci.edu.ci', 'georgette.assemian@uvci.edu.ci'];
        //     $maildata = [];
        //     $maildata['presse'] = $presse;
        //     Mail::to($mailinterne)->send(new Pressenotificate($maildata));
        $user->save();

        // return Redirect::back('admin.users.index')->with("success", "information de l'agent mise à jour avec succès!");
        return redirect()->route("admin.users.index")->with("success",  "information de l'agent mise à jour avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        // return Redirect::back()->with("success", "agent supprimé avec succès!");
        return redirect::back()->with("success",  "agent supprimé avec succès!");
    }
}