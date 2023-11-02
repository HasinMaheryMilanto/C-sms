<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Csms;

class InscriptionController extends Controller

{
    protected $date;

    public function __construct()
    {
        $aujourdhui = getdate();
        $mois = $aujourdhui['month'];
        $jour = $aujourdhui['mday'];
        $annee = $aujourdhui['year'];
        $hours = $aujourdhui['hours'];
        $minutes = $aujourdhui['minutes'];

        $this->date = "$jour/$mois/$annee/$hours/$minutes";
    }
    // inscription ===============================================
    public function s_inscrir(Request $request)
    {
        $request->validate([
            'nom_inscription' => 'required|min:5',
            'prenom_inscription' => 'required|min:5',
            'email_inscription' => 'required|email',
            'phone_inscription' => 'required|min:10',
            'password_iscription' => 'required|min:8',
            'cpassword_inscription' => 'required',
        ]);
        if ($files = $request->file('photo_profil')) {
            $request->validate([
                'photo_profil' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
            ]);
            $image_name = md5(rand(1000, 10000));
            $fileName = $image_name . '.' . $files->extension();
            $files->move(public_path('profil_user'), $fileName);
        } else {
            $fileName = "avatar.png";
        }
        if ($request->password_iscription != $request->cpassword_inscription) {
            return response()->json(['Nmdp' => 'Le mot de passe doit etre identique']);
        } else {

            // !verif si l'adress email existe déja=================================================
            $verif_user = User::where('email', $request->email_inscription)->first();
            if ($verif_user) {
                return response()->json(['email_existe' => 'cette adresse email existe deja,veuiler essayer une autre']);
                // !verif si l'adress email existe déja=================================================
            } else {
                $key = rand(1000000, 9000000);
                $laste_see = $this->date;
                $user = new User;
                $user->nom_user = $request->nom_inscription;
                $user->prenom_user = $request->prenom_inscription;
                $user->email = $request->email_inscription;
                $user->phone_user = $request->phone_inscription;
                $user->password = bcrypt($request->password_iscription);
                $user->key = $key;
                $user->profil = $fileName;
                $user->laste_see = $laste_see;

                $user->save();

                $mailData = [
                    'title' => "Bonjour $request->nom_inscription $request->prenom_inscription",
                    'content' => "Votre code de confirmation sur CSMS-chat",
                    'key' => $key,
                ];

                Mail::to($request->email_inscription)->send(new Csms($mailData));
                return response()->json(['success' => 'Votre compte a été créer avec success,apres confirmation par votre email, votre compte sera activer']);
            }
        }
    }
    // inscription ===============================================
}
