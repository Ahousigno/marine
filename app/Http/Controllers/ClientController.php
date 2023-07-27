<?php

namespace App\Http\Controllers;

use App\Models\DemandeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rapport;

class ClientController extends Controller
{
    public function indexe()
    {
        return view('client.accueil');
    }

    public function ajout_agent()
    {
        return view('admin.users.index');
    }
    public function demande_permission()
    {
        return view('client.demande_permission');
    }

    public function stone(Request $request)
    {
        $request->validate([
            'motif' => ['required'],
            'date_depart' => ['required'],
            'date_retour' => ['required'],
        ]);
        $demande = new DemandeModel();
        $demande->motif = $request->motif;
        $demande->date_depart = $request->date_depart;
        $demande->date_retour = $request->date_retour;
        $demande->save();
        return redirect()->route("client.demande_permission")->with("demande effectuée avec succès, vous pourriez faire une autre dmande dans 3 mois!");
    }

    public function demande_detail($id)
    {
        $demandes = DB::table('demande_models')->select('*')->get($id);
        return view('admin.infos_demande', compact('demandes'));
    }

    public function edit_demande($id)
    {

        $demande = DemandeModel::find($id);
        return view('client.edit_demande', compact('demande'));
    }

    public function demande_update(Request $request)
    {
        $request->validate([
            'motif' => ['required'],
            'date_depart' => ['required'],
            'date_retour' => ['required'],
        ]);
        $demande = new DemandeModel();
        $demande->motif = $request->motif;
        $demande->date_depart = $request->date_depart;
        $demande->date_retour = $request->date_retour;
        $demande->save();
        return redirect()->route("client.edit_demande")->with("demande modifiée avec succès!");
    }

    public function statut()
    {
        $demande = DemandeModel::all();
        return view('client.statut_demande');
    }

    public function depot_rapport(Request $request)
    {
        $request->validate([
            'rapport' => ['required'],

        ]);
        $rapport = new Rapport();
        $rapport->rapport = $request->rapport;

        $rapport->save();
        return back()->with("dépôt effectué avec succès!");
    }
}