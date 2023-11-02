<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConnexionControlle extends Controller
{
    public function se_connecter(Request $request)
    {
        $request->validate([
            'email_mobile_user_connexion' => 'required',
            'password_user_connexion' => 'required|min:8|max:30',
        ]);


        $verifs = DB::select('select * from users where email = ?', [$request->email_mobile_user_connexion]);


        if ($verifs) {

            foreach ($verifs as $verif) {

                if (Auth::attempt([
                    'email' => $request->email_mobile_user_connexion,
                    'password' => $request->password_user_connexion,
                ]) and $verif->is_active != 0) {
                    return response()->json(['success' => 'Successfull login']);
                } else if ($verif->is_active == 0 and Auth::attempt([
                    'email' => $request->email_mobile_user_connexion,
                    'password' => $request->password_user_connexion,
                ])) {
                    return response()->json(['compteinactif' => 'Votre compte n\'est pas encore activer,veuiller verifier votre boite email']);
                } else {
                    return response()->json(['error' => 'Erreur de de connexion,veuiller verifier votre email ou votre mot de pass']);
                }
            }
        } else {
            return response()->json(['error' => 'Erreur de de connexion,veuiller verifier votre email ou votre mot de pass']);
        }
    }

    public function validate_compte(Request $request)
    {
        $validates = DB::select('select * from users where id = ?', [Auth::user()->id]);
        if ($validates) {
            foreach ($validates as $validate) {
                $key = $validate->key;
                if ($key == $request->code_confirm) {
                    $update = User::find(Auth::user()->id);
                    $update->update([
                        'is_active' => 1,
                    ]);
                    return response()->json(['active' => 'Votre compte a éte activer avec success!']);
                } else {
                    return response()->json(['Nactive' => 'Votre code de confirmation est incorrecte']);
                }
            }
        }
    }

    public function update_profil(Request $request)
    {
        $request->validate([
            'nom_user_edit' => 'required|min:5|max:30',
            'prenom_user_edit' => 'required|min:5|max:30',
            'adress_user_edit' => 'required',
            'phone1_user_edit' => 'required',
            'password_user' => 'required|min:5|max:30',
        ]);

        if ($request->phone2_user_edit) {

            $phone = $request->phone1_user_edit . '|' . $request->phone2_user_edit;
        } else {
            $phone = $request->phone1_user_edit;
        }


        if (Hash::check($request->password_user, Auth::user()->password)) {
            $update = User::find(Auth::user()->id);
            $update->update([
                'nom_user' => $request->nom_user_edit,
                'prenom_user' => $request->prenom_user_edit,
                'adress' => $request->adress_user_edit,
                'phone_user' => $phone,
                'site' => $request->web_site,
            ]);
            return response()->json(['success' => 'mise à jour effectuer avec success']);
        } else {
            return response()->json(['error' => 'veuiller verifier votre mot de passe']);
        }
    }
    public function maj_pp(Request $request)
    {
        $request->validate([
            'profil_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:5048'
        ]);
        $image_name = md5(rand(1000, 10000));

        $fileName = $image_name . '.' . $request->profil_image->extension();

        $request->profil_image->move(public_path('profil_user'), $fileName);

        $update = User::find(Auth::user()->id);
        $update->update([
            'profil' => $fileName,
        ]);

        return response()->json(['success' => 'mise à jour de votre profil effectuer!']);
    }
}
