<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AcceuilControlller extends Controller
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

    public function index()
    {
        $verifs = DB::select('select * from users where id = ?', [Auth::user()->id]);
        if ($verifs) {
            foreach ($verifs as $verif) {
                if ($verif->is_active == 0) {
                    return redirect('/');
                } else {
                    return view('acceuil');
                }
            }
        }
    }
    public function deconnexion()
    {
        Auth::logout();
        return redirect('/');
    }

    // !get conversation =============================================================================
    public function getConversation()
    {
        $get_conversations = DB::select('select * from conversations where user_1 = ? or user_2 = ?', [Auth::user()->id, Auth::user()->id]);

        if ($get_conversations) {
            foreach ($get_conversations as $get_conversation) {

                if ($get_conversation->user_1 == Auth::user()->id) {
                    $chatwiths = DB::select('select * from users where id = ?', [$get_conversation->user_2]);
                    foreach ($chatwiths as $chatwith) {

                        $last_chats = DB::select('select * from chats where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by id desc limit 1', [$chatwith->id, Auth::user()->id, Auth::user()->id, $chatwith->id]);

                        if ($chatwith->laste_see == $this->date) {
                            $status = '<i class="fas fa-circle text-success mb-2" style="font-size: 10px;"></i>
                            ';
                        } else {
                            $date_laste_status = explode('/', $chatwith->laste_see);
                            $status = '<i class="fas fa-circle text-secondary mb-2" style="font-size: 10px;"></i>
                            <small>En ligne le ' . $date_laste_status[0] . ' ' . $date_laste_status[1] . ' ' . $date_laste_status[3] . ':' . $date_laste_status[4] . '</small>';
                        }
                        if ($last_chats) {
                            foreach ($last_chats as $last_chat) {
                                if ($last_chat->message) {
                                    $last_message = $last_chat->message;
                                } else {
                                    $last_message = '<i class="fas fa-file mx-2"></i>file picture';
                                }
                            }

                            $id_2 = $chatwith->id;
                            $id_1 = Auth::user()->id;
                            $countMessages = DB::select('select * from chats where  to_id=? and from_id=?', [$id_1, $id_2]);
                            $count = 0;
                            foreach ($countMessages as $countMessage) {
                                if ($countMessage->opened == 0) {
                                    $count += 1;
                                }
                            }
?>
                            <div class="card mb-2" id="chatwith" style="cursor: pointer;" identifient="<?= $chatwith->id ?>">
                                <div class="p-2 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <?php
                                            if ($count != 0) { ?>
                                                <small style="position: absolute; width: 20px;height: 20px;" class="bg-danger d-flex align-items-center justify-content-center rounded-circle text-light"><?= $count ?></small>
                                            <?php
                                            }
                                            ?>

                                            <img src="profil_user/<?= $chatwith->profil ?>" class="rounded-circle" style="width:50px;height:50px" alt="">
                                        </div>
                                        <?php
                                        if ($count == 0) { ?>
                                            <h6 class="mx-2"><?= $chatwith->nom_user ?><br><small id="show_last_message"><?= $last_message ?></small></h6>
                                        <?php
                                        } else { ?>
                                            <h6 class="mx-2"><?= $chatwith->nom_user ?><br><small id="show_last_message" style="font-weight: bold;"><?= $last_message ?></small></h6>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-center flex-column">
                                        <?= $status ?>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    }
                } else {
                    $chatwiths = DB::select('select * from users where id = ?', [$get_conversation->user_1]);
                    foreach ($chatwiths as $chatwith) {
                        $last_chats = DB::select('select * from chats where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by id desc limit 1', [$chatwith->id, Auth::user()->id, Auth::user()->id, $chatwith->id]);



                        if ($chatwith->laste_see == $this->date) {
                            $status = '<i class="fas fa-circle text-success mb-2" style="font-size: 10px;"></i>
                            ';
                        } else {
                            $date_laste_status = explode('/', $chatwith->laste_see);
                            $status = '<i class="fas fa-circle text-secondary mb-2" style="font-size: 10px;"></i>
                            <small>En ligne le ' . $date_laste_status[0] . ' ' . $date_laste_status[1] . ' ' . $date_laste_status[3] . ':' . $date_laste_status[4] . '</small>';
                        }
                        if ($last_chats) {
                            foreach ($last_chats as $last_chat) {
                                if ($last_chat->message) {
                                    $last_message = $last_chat->message;
                                } else {
                                    $last_message = '<i class="fas fa-file mx-2"></i>file picture';
                                }
                            }
                            $id_2 = $chatwith->id;
                            $id_1 = Auth::user()->id;
                            $countMessages = DB::select('select * from chats where  to_id=? and from_id=?', [$id_1, $id_2]);
                            $count = 0;
                            foreach ($countMessages as $countMessage) {
                                if ($countMessage->opened == 0) {
                                    $count += 1;
                                }
                            }
                        ?>
                            <div class="card mb-2" id="chatwith" style="cursor: pointer;" identifient="<?= $chatwith->id ?>">
                                <div class="p-2 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <?php
                                            if ($count != 0) { ?>
                                                <small style="position: absolute; width: 20px;height: 20px;" class="bg-danger d-flex align-items-center justify-content-center rounded-circle text-light"><?= $count ?></small>
                                            <?php
                                            }
                                            ?>
                                            <img src="profil_user/<?= $chatwith->profil ?>" class="rounded-circle" style="width:50px;height:50px" alt="">
                                        </div>
                                        <?php
                                        if ($count == 0) { ?>
                                            <h6 class="mx-2"><?= $chatwith->nom_user ?><br><small id="show_last_message"><?= $last_message ?></small></h6>
                                        <?php
                                        } else { ?>
                                            <h6 class="mx-2"><?= $chatwith->nom_user ?><br><small id="show_last_message" style="font-weight: bold;"><?= $last_message ?></small></h6>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="d-flex align-items-end justify-content-center flex-column">
                                        <?= $status ?>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                }
            }
        } else {
            return response()->json(['empty' => '<div class="alert alert-success text-center d-flex flex-column"> <strong><i class="fas fa-comment fa-2x"></i></strong> Vous n\'avez pas aucune message</div>']);
        }
    }
    // !get conversation ====================================================================

    // !check en ligne=====================================================================
    public function chek_enligne()
    {
        $update = User::find(Auth::user()->id);
        $update->update([
            'laste_see' => $this->date,
        ]);
    }
    // !check en ligne=====================================================================


    // !search conversation=========================================================
    public function chearch_conversation(Request $request)
    {
        $key = $request->data;
        $resutlt_searchs = DB::select('select * from users where nom_user like ? or prenom_user like ?', [$key, $key]);
        if ($resutlt_searchs) {
            foreach ($resutlt_searchs as $resutlt_search) {
                if ($resutlt_search->laste_see == $this->date) {
                    $status = '<i class="fas fa-circle text-success mb-2" style="font-size: 10px;"></i>
                    ';
                } else {
                    $date_laste_status = explode('/', $resutlt_search->laste_see);
                    $status = '<i class="fas fa-circle text-secondary mb-2" style="font-size: 10px;"></i>
                    <small>En ligne le ' . $date_laste_status[0] . ' ' . $date_laste_status[1] . ' ' . $date_laste_status[3] . ':' . $date_laste_status[4] . '</small>';
                }
                if ($resutlt_search->id == Auth::user()->id) continue;
                // !vous avez dejà une discution===============================================
                $converstion = DB::select('select * from conversations where (user_1=? and user_2=?) or (user_2=? and user_1=?)', [Auth::user()->id, $resutlt_search->id, Auth::user()->id, $resutlt_search->id]);

                if ($converstion) {

                    $last_chats = DB::select('select * from chats where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by id desc limit 1', [$resutlt_search->id, Auth::user()->id, Auth::user()->id, $resutlt_search->id]);
                    if ($last_chats) {
                        foreach ($last_chats as $last_chat) {
                            if ($last_chat->message) {
                                $message = $last_chat->message;
                            } else {
                                $message = '<i class="fas fa-file mx-2"></i>file picture';
                            }
                        }
                    } else {
                        $message = "Aucune Message";
                    }
                    ?>
                    <div class="card mb-2">
                        <div class="p-2 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <img src="profil_user/<?= $resutlt_search->profil ?>" class="rounded-circle" style="width:50px;height:50px" alt="">
                                </div>
                                <h6 class="mx-2"><?= $resutlt_search->nom_user . ' ' . $resutlt_search->prenom_user ?> <br><small><?= $message ?></small></h6>
                            </div>
                            <div class="d-flex align-items-end justify-content-center flex-column">
                                <?= $status ?>
                                <a href="javascript:void(0)" id="add_message" identifient="<?= $resutlt_search->id ?>" class="btn p-0" data-toggle="tooltip" title="Envoyer une message"><i class="fa fa-comment text-secondary"></i></a></small>
                            </div>

                        </div>
                    </div>
                <?php
                    // !vous avez dejà une discution===============================================
                } else {
                ?>
                    <!-- // !aucune discution une discution=============================================== -->
                    <div class="card mb-2">
                        <div class="p-2 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <img src="profil_user/<?= $resutlt_search->profil ?>" class="rounded-circle" style="width:50px;height:50px" alt="">
                                </div>
                                <h6 class="mx-2"><?= $resutlt_search->nom_user . ' ' . $resutlt_search->prenom_user ?> <br></h6>
                            </div>
                            <div class="d-flex align-items-end justify-content-center flex-column">
                                <?= $status ?>
                                <a href="javascript:void(0)" id="add_new_conversation" identifient="<?= $resutlt_search->id ?>" class="btn p-0" data-toggle="tooltip" title="Demarrer conversation!"><i class="fa fa-plus text-muted"></i></a></small>
                            </div>

                        </div>
                    </div>
                    <!-- // !aucune discution une discution=============================================== -->

        <?php
                }
            }
        } else {
            return response()->json(['empty' => '<div class="alert alert-success text-center d-flex flex-column"> <strong><i class="fas fa-comment fa-2x"></i></strong> Aucune resultat pour votre recherche</div>']);
        }
    }
    // !search conversation=========================================================
    // 

    // !chat with====================================================
    public function chatwith(Request $request)
    {
        $chatwiths = DB::select('select * from users where id=?', [$request->chatwith]);
        if ($chatwiths) {
            foreach ($chatwiths as $chatwith) {

                if ($chatwith->laste_see == $this->date) {
                    $status = '<div class="d-flex align-items-center mt-1"><i class="fas fa-circle text-success" style="font-size: 10px;"></i><small class="mx-2 my-0">En ligne</small></div>
                    ';
                } else {
                    $date_laste_status = explode('/', $chatwith->laste_see);
                    $status = '<div class="d-flex align-items-center mt-1"><i class="fas fa-circle text-secondary" style="font-size: 10px;"></i>
                    <small class="mx-2">En ligne le ' . $date_laste_status[0] . ' ' . $date_laste_status[1] . ' ' . $date_laste_status[3] . ':' . $date_laste_status[4] . '</small></div>';
                }
                $chat_with_name = $chatwith->nom_user . ' ' . $chatwith->prenom_user;
                $chat_profil = $chatwith->profil;
                $chat_status = $status;

                $response = [
                    'chat_with_name' => $chat_with_name,
                    'chat_with_profil' => $chat_profil,
                    'chat_with_status' => $chat_status
                ];
            }
            return json_encode($response);
        } else {
            return 'erro chat with';
        }
    }
    // !chat with====================================================

    // !send message=============================================
    public function send_message(Request $request)
    {


        if (!$request->text_message and !$request->file('send_image')) {

            return response()->json(['empty' => 'Veuiller ecrir une message, ou importer une objet']);
        }

        $images = [];
        if ($files = $request->file('send_image')) {

            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $fileName = $image_name . '.' . $file->extension();
                $file->move(public_path('photo_image'), $fileName);
                array_push($images, $fileName);
            }
        } else {
            $images = [];
        }

        if ($request->text_message) {
            $text_message = $request->text_message;
        } else {
            $text_message = "";
        }

        $to_id = $request->identifient_chat_with;
        $from_id = Auth::user()->id;


        $message = new Chat;
        $message->from_id = $from_id;
        $message->to_id = $to_id;
        $message->message = $text_message;
        $message->images = implode('|', $images);
        $message->time = $this->date;
        $message->save();

        ?>
        <!-- !message right ======================================================================-->
        <div class="w-100 d-flex align-items-end justify-content-center flex-column">
            <div class="d-flex align-items-center justify-content-end mb-1">
                <small><?php
                        $date_laste_status = explode('/',  $this->date);
                        echo "le $date_laste_status[0] $date_laste_status[1] $date_laste_status[3]:$date_laste_status[4]";
                        ?></small>
            </div>
            <div class="rounded-circle">
                <img src='profil_user/<?= Auth::user()->profil ?>' class="rounded-circle" alt="" style="width: 20px;height: 20px;">
            </div>
            <div style="float: right; background-color: rgb(195, 188, 188);max-width: 45%;min-width: 40%;border-radius: 20px;" class="px-3 py-2 shadow">
                <div style="float: right;" class=' d-flex-align-items-center' id="content_men_message">

                    <a href="javascript:void(0)" class="text-decoration-none text-light" data-toggle="modal" data-target="#shareImage" id="shareImage_to"><i class="fas fa-share fa-sm"></i></a>
                </div>
                <h6 style="color: rgb(66, 65, 65);"><?= $text_message ?></h6>
                <div class="w-100 mx-0 px-0 row">
                    <?php
                    if ($message->images) {

                        $liste_image = explode('|', $message->images);
                        if (count($liste_image) > 0) {
                            for ($i = 0; $i < count($liste_image); $i++) { ?>

                                <div class="col-md-6 col-sm-6  rounded px-1 mb-1">
                                    <a href="photo_image/<?= $liste_image[$i] ?>" data-toggle="modal" id="show_image_message" image="photo_image/<?= $liste_image[$i] ?>" class="w-100"><img src="photo_image/<?= $liste_image[$i] ?>" class="w-100 rounded" alt="" style="max-height: 150px;min-height: 150px"></a>
                                </div>
                    <?php
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <!-- !message right ======================================================================-->
        <?php
    }
    // !send message=============================================

    public function get_all_message(Request $request)
    {

        $getMessages = DB::select('select * from chats where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by id asc', [$request->chat_with, Auth::user()->id, Auth::user()->id, $request->chat_with]);
        if ($getMessages) {
            foreach ($getMessages as $getMessage) {
                if ($getMessage->from_id == Auth::user()->id) { ?>
                    <!-- !message right ======================================================================-->
                    <div class="w-100 d-flex align-items-end justify-content-center flex-column my-3">
                        <div class="d-flex align-items-center justify-content-end mb-1">
                            <small><?php
                                    $date_laste_status = explode('/',  $getMessage->time);
                                    echo "le $date_laste_status[0] $date_laste_status[1] $date_laste_status[3]:$date_laste_status[4]";
                                    ?></small>
                        </div>
                        <div class="rounded-circle">
                            <img src='profil_user/<?= Auth::user()->profil ?>' class="rounded-circle" alt="" style="width: 20px;height: 20px;">
                        </div>
                        <div style="float: right; background-color: rgb(195, 188, 188);max-width: 45%;min-width: 40%;border-radius: 20px;" id="men_message" class="px-3 py-2 shadow">
                            <div style="float: right;" class=' d-flex-align-items-center' id="content_men_message">
                                <a href="javascript:void(0)" class="text-decoration-none text-light mx-1" identifient="<?= $getMessage->id ?>" id="delete_single_message"><i class="fas fa-trash fa-sm"></i></a>
                                <a href="javascript:void(0)" class="text-decoration-none text-light" data-toggle="modal" data-target="#shareImage" id="shareImage_to"><i class="fas fa-share fa-sm"></i></a>
                            </div>
                            <h6 style="color: rgb(66, 65, 65);"><?= $getMessage->message ?></h6>
                            <div class="w-100 mx-0 px-0 row">
                                <?php
                                if ($getMessage->images) {
                                    $liste_image = explode('|', $getMessage->images);
                                    if (count($liste_image) != 0) {
                                        for ($i = 0; $i < count($liste_image); $i++) { ?>

                                            <div class="col-md-6 col-sm-6 rounded px-1 mb-1 d-flex align-items-center justify-content-center" id="show_image" style="position:relative">
                                                <a href="javascript:void(0)" data-toggle="modal" id="show_image_message" image="photo_image/<?= $liste_image[$i] ?>" data-target="#modal_image" class="w-100"> <img src="photo_image/<?= $liste_image[$i] ?>" class="w-100 rounded" alt="" style="max-height: 150px;min-height: 150px"></a>
                                            </div>
                                <?php
                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- !message right ======================================================================-->
                    <?php

                } else {
                    $p_ps = DB::select('select * from users where id=?', [$request->chat_with]);
                    foreach ($p_ps as $p_p) {
                        $pp = $p_p->profil;
                    }
                    if ($getMessage->opened != 0) {
                    ?>
                        <!-- !message left ======================================================================-->
                        <div class="w-100">
                            <div class="d-flex align-items-center justify-content-start">
                                <small><?php
                                        $date_laste_status = explode('/',  $getMessage->time);
                                        echo "le $date_laste_status[0] $date_laste_status[1] $date_laste_status[3]:$date_laste_status[4]";
                                        ?></small>
                            </div>
                            <div class="rounded-circle">
                                <img src='profil_user/<?= $pp ?>' class="rounded-circle" alt="" style="width: 20px;height: 20px;">
                            </div>

                            <div style="background-color: rgba(0,0,0,0.5);max-width: 45%;min-width: 40%;border-radius: 20px;" class="px-3 py-2 shadow">
                                <div style="float: right;" class=' d-flex-align-items-center' id="content_men_message">
                                    <a href="javascript:void(0)" class="text-decoration-none text-light mx-1" identifient="<?= $getMessage->id ?>" id="delete_single_message"><i class="fas fa-trash fa-sm"></i></a>
                                    <a href="javascript:void(0)" class="text-decoration-none text-light" data-toggle="modal" data-target="#shareImage" id="shareImage_to"><i class="fas fa-share fa-sm"></i></a>
                                </div>
                                <h6 class="text-light"><?= $getMessage->message ?></h6>
                                <div class="w-100 mx-0 px-0 row">
                                    <?php
                                    if ($getMessage->images) {
                                        $liste_image = explode('|', $getMessage->images);
                                        if (count($liste_image) != 0) {
                                            for ($i = 0; $i < count($liste_image); $i++) { ?>

                                                <div class="col-md-6 col-sm-6  rounded px-1 mb-1 d-flex align-items-center justify-content-center" id="show_image" style="position:relative">


                                                    <a href="javascript:void(0)" data-toggle="modal" id="show_image_message" image="photo_image/<?= $liste_image[$i] ?>" data-target="#modal_image" class="w-100"> <img src="photo_image/<?= $liste_image[$i] ?>" class="w-100 rounded" alt="" style="max-height: 150px;min-height: 150px"></a>
                                                </div>
                                    <?php
                                            }
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- !message left ======================================================================-->

                    <?php
                    }
                }
            }
        } else {

            return response()->json(['empty' => '<div class="alert empty_message alert-success text-center d-flex flex-column"> <strong><i class="fas fa-comment fa-2x"></i></strong> Vous n\'avez pas aucune message</div>']);
        }
    }

    // fecth data =============================================
    public function fetchData(Request $request)
    {
        $id_2 = $request->id_2;
        $id_1 = Auth::user()->id;
        $opened = 0;

        $fetchDatas = DB::select('select * from chats where  to_id=? and from_id=?', [$id_1, $id_2]);

        if ($fetchDatas) {
            foreach ($fetchDatas as $fetchData) {
                if ($fetchData->opened == 0) {
                    $opened = 1;
                    $chat_id = $fetchData->id;
                    $update = Chat::find($chat_id);
                    $update->update([
                        'opened' => $opened,
                    ]);
                    $p_ps = DB::select('select * from users where id=?', [$id_2]);
                    foreach ($p_ps as $p_p) {
                        $pp = $p_p->profil;
                    }
                    ?>
                    <!-- !message left ======================================================================-->
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-start mb-1">
                            <small><?php
                                    $date_laste_status = explode('/',  $fetchData->time);
                                    echo "le $date_laste_status[0] $date_laste_status[1] $date_laste_status[3]:$date_laste_status[4]";
                                    ?></small>
                        </div>
                        <div class="rounded-circle">
                            <img src='profil_user/<?= $pp ?>' class="rounded-circle" alt="" style="width: 20px;height: 20px;">
                        </div>
                        <div style="background-color: rgba(0,0,0,0.5);max-width: 45%;min-width: 40%;border-radius: 20px;" class="px-3 py-2 shadow">
                            <div style="float: right;" class=' d-flex-align-items-center' id="content_men_message">
                                <a href="javascript:void(0)" class="text-decoration-none text-light mx-1" identifient="<?= $fetchData->id ?>" id="delete_single_message"><i class="fas fa-trash fa-sm"></i></a>
                                <a href="javascript:void(0)" class="text-decoration-none text-light" data-toggle="modal" data-target="#shareImage" id="shareImage_to"><i class="fas fa-share fa-sm"></i></a>
                            </div>
                            <h6 class="text-light"><?= $fetchData->message ?></h6>
                            <div class="w-100 mx-0 px-0 row">
                                <?php
                                if ($fetchData->images) {

                                    $liste_image = explode('|', $fetchData->images);
                                    if (count($liste_image) > 0) {
                                        for ($i = 0; $i < count($liste_image); $i++) { ?>

                                            <div class="col-md-6 col-sm-6 rounded px-1 mb-1">
                                                <a href="javascript:void(0)" data-toggle="modal" id="show_image_message" image="photo_image/<?= $liste_image[$i] ?>" data-target="#modal_image" class="w-100"> <img src="photo_image/<?= $liste_image[$i] ?>" class="w-100 rounded" alt="" style="max-height: 150px;min-height: 150px"></a>


                                            </div>
                                <?php
                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- !message left ======================================================================-->

        <?php
                }
            }
        }
    }
    // fecth data =============================================

    // nouvelle conversation=======================================
    public function noulelle_conversation(Request $request)
    {
        $chat_with_id = $request->chat_with;
        $conversation = new Conversation;
        $conversation->user_1 = $chat_with_id;
        $conversation->user_2 = Auth::user()->id;
        $conversation->save();

        $chat = new Chat;
        $chat->from_id = Auth::user()->id;
        $chat->to_id = $chat_with_id;
        $chat->message = "Bienvenue à vous deux sur messager";
        $chat->images = "";
        $chat->time = $this->date;
        $chat->save();

        ?>
        <div class="w-100">
            <div class="d-flex align-items-center justify-content-start mb-1">
                <small><?php
                        $date_laste_status = explode('/',  $chat->time);
                        echo "le $date_laste_status[0] $date_laste_status[1] $date_laste_status[3]:$date_laste_status[4]";
                        ?></small>
            </div>
            <div style="background-color: rgba(0,0,0,0.5);max-width: 45%;min-width: 40%;border-radius: 20px;" class="px-3 py-2 shadow">
                <h6 class="text-light"><?= $chat->message ?></h6>

            </div>
        </div>

        <?php


    }



    // nouvelle conversation=======================================



    // delete single message=====================================================================
    public function delete_single_message(Request $request)
    {
        $identifient = $request->identifient;
        $delete_single_message = Chat::find($identifient);

        $delete_single_message->delete();
        return 'supression successfull';
    }
    // delete single message=====================================================================

    // supression conversation======================================================
    public function supprimer_conversation(Request $request)
    {
        $getMessage = DB::select('select * from chats where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by time asc', [$request->identifient, Auth::user()->id, Auth::user()->id, $request->identifient]);

        $count_message = count($getMessage);

        while ($count_message != 0) {
            foreach ($getMessage as $message) {
                DB::table('chats')->where('id', $message->id)->delete();
            }
            return 'supression successfull';
        }
    }
    // supression conversation======================================================



    // !verification du mots de pass si ega==============================================================================================
    public function passwordCorrect()

    {
        if (Hash::check(17052000, Auth::user()->password)) {
            echo 'egal';
        } else {
            echo 'nequal';
        }
    }
    // !verification du mots de pass si ega==============================================================================================

    // !check profil_chat with=================================================================
    public function check_profil_chat(Request $request)
    {
        $chatwith = $request->chat_with;
        $datas = DB::select('select * from users where  id=?', [$chatwith]);
        foreach ($datas as $data) {
            if (strstr($data->phone_user, '|') > -1) {
                $table = explode('|', $data->phone_user);
                $phone1 = $table[0];
                $phone2 = $table[1];
            } else {
                $phone1 = $data->phone_user;
                $phone2 = '';
            }
            return response()->json([
                'nom_user' => $data->nom_user,
                'prenom_user' => $data->prenom_user,
                'email' => $data->email,
                'phone1' => $phone1,
                'phone2' => $phone2,
                'profil' => $data->profil,
                'adress' => $data->adress,
                'site' => $data->site,
            ]);
        }
    }
    // !check profil_chat with=================================================================


    // check file type message============================================================
    public function check_file_message(Request $request)
    {
        $chatwith = $request->chat_with;
        $getMessagefiles = DB::select('select * from chats where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by time asc', [$chatwith, Auth::user()->id, Auth::user()->id, $chatwith]);

        if ($getMessagefiles) {
            foreach ($getMessagefiles as $getMessagefile) {
                if ($getMessagefile->images) {
                    if (strstr($getMessagefile->images, '|')) {
                        $images = explode('|', $getMessagefile->images);
                        for ($i = 0; $i < count($images); $i++) {
        ?>
                            <div class="col-md-4 colsm-4 my-2">
                                <a href="photo_image/<?= $images[$i] ?>" data-toggle="tooltip" title="Télecharger" class="btn btn-light d-flex align-items-center justify-content-centrer rounded-circle" style="position: absolute;margin-right: 45px;height: 40px;width: 40px"><i class="fas fa-download text-muted"></i></a>
                                <img src="photo_image/<?= $images[$i] ?>" class="w-100" alt="" style="min-height:200px;max-height:200px">


                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="col-md-4 colsm-4 my-2">

                            <a href="photo_image/<?= $getMessagefile->images ?>" data-toggle="tooltip" title="Télecharger" class="btn btn-light d-flex align-items-center justify-content-centrer rounded-circle" style="position: absolute;margin-right: 45px;height: 40px;width: 40px"><i class="fas fa-download text-muted"></i></a>
                            <img src="photo_image/<?= $getMessagefile->images ?>" class="w-100" style="min-height:200px;max-height:200px" alt="">
                        </div>
                    <?php
                    }
                }
            }
        }
    }
    // check file type message============================================================


    // share message ==================================================
    public function chare_message($id_to)
    {

        $sharemessages = DB::select('select * from conversations where user_1 = ? or user_2 = ?', [Auth::user()->id, Auth::user()->id]);

        if ($sharemessages) {
            foreach ($sharemessages as $sharemessage) {
                if ($sharemessage->user_1 == Auth::user()->id) {
                    $chatwiths = DB::select('select * from users where id = ?', [$sharemessage->user_2]);
                    foreach ($chatwiths as $chatwith) {
                        if ($chatwith->laste_see == $this->date) {
                            $status = '<i class="fas fa-circle text-success mb-2" style="font-size: 10px;"></i>
                            ';
                        } else {
                            $date_laste_status = explode('/', $chatwith->laste_see);
                            $status = '<i class="fas fa-circle text-secondary mb-2" style="font-size: 10px;"></i>
                            <small>En ligne le ' . $date_laste_status[0] . ' ' . $date_laste_status[1] . ' ' . $date_laste_status[3] . ':' . $date_laste_status[4] . '</small>';
                        }
                        if ($chatwith->id == $id_to) continue;
                    ?>
                        <div class="card mb-2">
                            <div class="p-2 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="mx-2">
                                    <div>
                                        <img src="profil_user/<?= $chatwith->profil ?>" class="rounded-circle" style="width: 50px;height:50px" alt="">
                                    </div>
                                    <h6 class="mx-2"><?= $chatwith->nom_user . ' ' . $chatwith->nom_user ?><br></h6>
                                </div>
                                <div class="d-flex align-items-end justify-content-center flex-column">
                                    <?= $status ?>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                } else {
                    $chatwiths = DB::select('select * from users where id = ?', [$sharemessage->user_1]);
                    foreach ($chatwiths as $chatwith) {
                        if ($chatwith->laste_see == $this->date) {
                            $status = '<i class="fas fa-circle text-success mb-2" style="font-size: 10px;"></i>
                            ';
                        } else {
                            $date_laste_status = explode('/', $chatwith->laste_see);
                            $status = '<i class="fas fa-circle text-secondary mb-2" style="font-size: 10px;"></i>
                            <small>En ligne le ' . $date_laste_status[0] . ' ' . $date_laste_status[1] . ' ' . $date_laste_status[3] . ':' . $date_laste_status[4] . '</small>';
                        }
                        if ($chatwith->id == $id_to) continue;
                    ?>
                        <div class="card mb-2">
                            <div class="p-2 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="mx-2">
                                    <div>
                                        <img src="profil_user/<?= $chatwith->profil ?>" class="rounded-circle" style="width: 50px;height:50px" alt="">
                                    </div>
                                    <h6 class="mx-2"><?= $chatwith->nom_user . ' ' . $chatwith->nom_user ?><br></h6>
                                </div>
                                <div class="d-flex align-items-end justify-content-center flex-column">
                                    <?= $status ?>
                                </div>

                            </div>
                        </div>
<?php
                    }
                }
            }
        }
    }
    // share message ==================================================
}
