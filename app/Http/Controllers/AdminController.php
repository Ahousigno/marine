<?php

namespace App\Http\Controllers;

use App\Models\DemandeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function demande_detail()
    {
        $demandes = DB::table('demande_models')
            ->select('*')
            ->where('dg_validated', 0)
            ->orderBy('created_at', 'asc')->get();
        // $demande = DemandeModel::find();
        return view('admin.infos_demande', compact('demandes'));
    }
    public function index_admin()
    {

        return view('admin.index_admin');
    }

    public function demande_accepte()
    {
        $demandes = DB::table('demande_models')->select('*')
            ->where('dg_validated', '1')
            ->orderBy('created_at', 'desc')
            ->paginate('10');
        return view('admin.demande_accepte', compact('demandes'));
    }
    public function demande_rejete()
    {
        $demandes = DemandeModel::where('dg_validated', 0)->where('motif_rejet', '!=', null)->first();
        return view('admin.demande_rejete', compact('demandes'));
    }

    public function valider()
    {
        $demande = DemandeModel::first();
        $demande->motif_rejet = null;
        $demande->dg_validated = 1;
        $demande->update();
        // Alert::success('Succès', 'L\'évènement a bien été validé !');
        return redirect::back()->with("success",  "Demande validée!");
    }

    public function refuse(Request $request)
    {
        $this->validate($request, [
            'motif' => ['required', 'max:600']
        ]);
        $demande = DemandeModel::first();
        $demande->dg_validated = 0;
        $demande->motif_rejet = $request->motif;
        $demande->update();
        // Alert::success('Succès', 'L\'évènement a bien été réfusé !');
        // $recipient = ['secretariat@uvci.edu.ci', 'georgette.assemian@uvci.edu.ci', 'medias@uvci.edu.ci', 'signo.aviet@uvci.edu.ci', 'patrimoine@uvci.edu.ci', 'dg@uvci.edu.ci',  $event->user->email]; //Emails des destinataires
        // $mail_data = [
        //     'recipient' => $recipient, //Emails des autres services et du postulant de l'évènement
        //     'fromEmail' => Auth::user()['email'],
        //     'fromName' => Auth::user()['name'] . ' ' . Auth::user()['pname'],
        //     "subject" => "Validation des évènements",
        //     "motifRejet" => $request->motif,
        //     "event_name" => $event->nom,
        // ];
        // Mail::send('admin.subdirector.emails.rejectEvent', $mail_data, function ($message) use ($mail_data) {
        //     $message->to($mail_data['recipient'])
        //         ->from($mail_data['fromEmail'], $mail_data['fromName'])
        //         ->subject($mail_data['subject']);
        // });
        return redirect::back()->with("success",  "Demande rejetée!");
    }
}