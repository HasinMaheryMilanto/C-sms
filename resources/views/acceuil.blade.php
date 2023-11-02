<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- liaison css========================================================================== -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/sweetalert.min.css">
    <link rel="stylesheet" href="css/emojionearea.min.css">
    <link rel="icon" href="image/smsLogo1.png">
    <!-- liaison css======================================================================= -->


    <title>Csms</title>
</head>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #0099cc;
    }
</style>

<body class="d-flex align-items-center justify-content-center"
    style="background-image: url('login/images/bg-01.jpg');
                                                                    background-repeat: no-repeat;
                                                                    background-size: cover;
                                                                    background-position: center;">
    <section class="bg-light shadow section1 p-md-5 p-sm-2 p-1"
        style="border-radius: 10px;min-width: 90%;max-width: 90%;">
        <div class="row px-0 mx-0">
            <!-- *side bar left================================================================================= -->
            <div class="col-md-4 side_bar_left bg-light mx-0 ">
                <!-- !Menu user===================================================================== -->
                <div style="position: sticky;top: 0;z-index: 100;" class="bg-light shadow p-2">

                    <div class=" d-flex align-items-center justify-content-between header_sidebar_left">
                        <div class="d-flex align-items-center justify-content-start" style="width: 70%">
                            <div>
                                <img src="profil_user/{{ Auth::user()->profil }}" class="rounded-circle" alt=""
                                    style="width: 80px;height: 80px;">
                            </div>
                            <h5 class="mx-2">{{ Auth::user()->nom_user . ' ' . Auth::user()->prenom_user }}<br> <small
                                    class="m-0 text-muted"><i class="fas fa-circle text-success"></i> En ligne</small>
                            </h5>
                        </div>
                        <div style="width: 30%;" class=" d-flex align-items-center justify-content-end">

                            
                            <!-- setign_menu_sidebar_left======================================= -->
                            <div class="btn settign_menu_sidebar_left">

                                <i class="fas fa-ellipsis-h text-muted"></i>
                                <div class="bg-light text-start colapps_setting_menu_sidebar_left"
                                    style="position: absolute;min-width: 200px;margin-left: -160px;z-index: 200;display: none;">
                                    <div class="list-group">

                                        <div
                                            class="list-group-item list-group-item-action d-flex justify-content-between">
                                            <span><i class="fa fa-moon text-dark" style="font-size: 0.7rem;"></i>
                                                Mode sombre</span>
                                            <a href="#"><i class="fa fa-toggle-on text-dark"></i></a>
                                        </div>

                                        <a href="javascript:void(0)" id="page_edit"
                                            class="list-group-item list-group-item-action">
                                            <i class="fa fa-edit text-muted"></i> Modifier</a>
                                        <!-- !setign discution en ligne -->
                                        <div
                                            class="list-group-item list-group-item-action d-flex justify-content-between">
                                            <span><i class="fa fa-circle text-success" style="font-size: 0.7rem;"></i>
                                                Discution</span>
                                            <a href="#"><i class="fa fa-toggle-on text-dark"></i></a>
                                        </div>


                                        <!-- !setign discution en ligne -->
                                        <a href="{{ route('deconnexion') }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="fa fa-power-off text-danger"></i> Deconnection</a>
                                    </div>
                                </div>
                            </div>
                            <!-- setign menu_sidebar_left======================================= -->


                        </div>

                    </div>
                    <hr>
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0)" id="click_search_conversation" class="btn shadow-none"><i
                                class="text-muted fas fa-search"></i></a>
                        <input type="text" id="search_conversation" class="form-control shadow-none outline-none"
                            placeholder=" Search..............">
                    </div>
                </div>

                <!-- !Menu user===================================================================== -->

                <!-- !liste des message=============================================================== -->
                <div class="my-2" id="page_liste_conversation">

                    <!-- single message ==========================================================-->

                    <!-- single message ==========================================================-->
                    <!-- single message ==========================================================-->
                    {{-- <div class="card mb-2" id="chatwith" style="cursor: pointer;">
                        <div class="p-2 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between">
                                <div style="width: 50px;">
                                    <img src="image/1692039273.jpg" class="rounded-circle w-100" alt="">
                                </div>
                                <h6 class="mx-2">Hasina Mahery <br><small>Bonjours</small></h6>
                            </div>
                            <div class="d-flex align-items-end justify-content-center flex-column">
                                <i class="fas fa-circle text-success mb-2" style="font-size: 10px;"></i>
                                <small>il y a 2h</small>
                            </div>

                        </div>
                    </div> --}}
                    <!-- single message ==========================================================-->

                </div>
                <!-- !liste des message=============================================================== -->

                <!-- !recherche conversation ========================================================-->
                <div class="my-2" id="page_search_conversation" style="display: none;">
                    <a href="#" class="btn p-0 text-muted">Resultat de votre recherche.............</a>
                    <!-- recherche aver message !=0========================================= -->

                    <!-- recherche aver message !=0========================================= -->
                    <!-- recherche aver message ==0========================================= -->

                    <!-- recherche aver message ==0========================================= -->

                </div>
                <!-- !recherche conversation ========================================================-->
            </div>
            <!-- *side bar left================================================================================= -->


            <!-- !contenu message================================================================================ -->
            <div class="col-md-8 all_content">
                <!-- ?chat_messenger============================================================================ -->
                <div class="card mt-2" id="page_chat" style="min-height: 73vh;display: none;">
                    <!-- header contenu================================================================ -->
                    <div class="card-header">

                        <div class="d-flex align-items-center justify-content-between">

                            <div class="d-flex align-items-center user_status_header">
                                <div>
                                    <img id="content_profil_chatwith" class="rounded-circle"
                                        style="width: 50px;height: 50px;" alt="">
                                </div>
                                <h6 class="mx-2" id="content_chatwith">

                                </h6>
                            </div>
                            <div class=" d-flex align-items-center justify-content-evenly">
                                <input type="text" id="search_message" class="form-control shadow-none"
                                    style="border-radius: 20px;" placeholder="Search........................."
                                    style="min-width: 150px;">
                                <a href="javascript:void(0)" class="btn">
                                    <i class="fa fa-search text-muted"></i></a>

                                <!-- !menu chat crogs============================================================= -->
                                <div class="btn setting_chat" style="cursor: pointer;z-index: 100;">
                                    <i class="fa fa-cogs text-muted"></i>
                                    <div class="bg-light text-start colapps_setting_chat"
                                        style="position: absolute;min-width: 270px;margin-left: -10%;display: none;">
                                        <div class="list-group">
                                            <a href="javascript:void(0)" id="supprimer_conversation"
                                                class="list-group-item list-group-item-action"><i
                                                    class="fas fa-trash text-muted"></i> Supprimer votre
                                                conversatrion</a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <i class="fa fa-lock text-muted"></i> Bloquer</a>

                                            <a href="javascript:void(0)" id="show_file_type"
                                                class="list-group-item list-group-item-action" data-toggle="modal"
                                                data-target="#content_media"><i
                                                    class="fa fa-camera  text-muted mx-1"></i>Fichier images</a>
                                            <a href="javascript:void(0)" id=check_profil_chatwith data-toggle="modal"
                                                data-target="#view_profil_with"
                                                class="list-group-item list-group-item-action"><i
                                                    class="fa fa-user-tie  text-muted"></i> Voir profil</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- !menu chat crogs============================================================= -->

                            </div>
                        </div>
                    </div>
                    <!-- header contenu================================================================ -->

                    <!--? body contenu================================================================== -->
                    <div class="card-body" id="scroll_message"
                        style="min-height: 50vh;max-height: 50vh;overflow-y: auto;">
                        {{-- !! liste des message================================================= --}}



                    </div>
                    <!--? body contenu================================================================== -->

                    <!-- !FORM SEND MESSAGE ====================================================================-->
                    <div id="listes_images_file" class="d-flex align-items-center rounded "
                        style="position: absolute;bottom: 13vh ;max-width: 100%;z-index: 100">

                    </div>
                    <div class="card-footer">
                        <span class="error_message text-muted"></span>
                        <form class="d-flex align-items-center" id="form_send_message" enctype="multipart/form-data">

                            <div class=" input-group mb-3">
                                <input type="file" name="send_image[]" multiple id="send_image" hidden>
                                <input type="hidden" id="identifient_chat_with" name="identifient_chat_with">
                                {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                                <textarea type="text" id="text_message" name="text_message" class="form-control shadow-none mb-2"
                                    placeholder="Votre message........................."
                                    style="height: 5vh; min-width: 300px;border-radius: 20px;outline: none!important;"></textarea>

                                <div class="input-group-prepend">
                                    <label for="send_image"><span class="input-group-text text-muted"
                                            style="background-color: transparent;border: 0;"><i
                                                class="fa fa-file-image"></i></span></label>
                                </div>
                                <div class="input-group-prepend">
                                    <a href="#" class="text-decoration-none"><span
                                            class="input-group-text text-muted"
                                            style="background-color: transparent;border: 0;"><i
                                                class="fa fa-link"></i></span></a>
                                </div>
                                <div class="input-group-prepend">

                                    <button type="submit" class="btn text-decoration-none"><span
                                            class="input-group-text btn btn-primary">Envoyer<i
                                                class="fas fa-paper-plane mx-2"></i></span></button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- !FORM SEND MESSAGE ====================================================================-->
                </div>
                <!-- ?chat_messenger============================================================================ -->

                <!-- !edit profil)===================================================================== -->
                <div class="card mt-2" id="page_profil" style="min-height: 73vh;display: none;">
                    <!-- header edit================================= -->
                    <div class="card-header">
                        <a href="javascript:void(0)" class="text-muted"><i class="fa fa-bars"></i></a>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center user_status_header">
                                <div>
                                    <img src="profil_user/{{ Auth::user()->profil }}" class="rounded-circle"
                                        alt="" style="width: 50px;height: 50px;">
                                </div>
                                <h6 class="mx-2 text-muted">
                                    {{ Auth::user()->nom_user . ' ' . Auth::user()->prenom_user }}
                                    <br>
                                    {{ Auth::user()->email }}<br>
                                    <i class="fas fa-circle text-success" style="font-size: 10px;"></i> <small>En
                                        ligne</small>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- header edit================================= -->
                    <!-- body edit========================================= -->
                    <div class="card-body">
                        <div class="row mx-0 px-0">
                            <!-- !content left modifier================================ -->
                            <div class="col-md-5" style="border: 1px solid rgb(206, 202, 202);">
                                <div style="max-height: 63vh;min-height: 63vh; overflow-y: auto;">
                                    <div class="d-flex flex-column align-items-start mt-2">
                                        <h3 class="w-100 text-center text-muted" style="font-weight: lighter;">Votre
                                            profil</h3>

                                        <div class="mx-auto d-flex justify-content-center"
                                            style="position: relative;">


                                            <img id="image_name" real_profil="{{ Auth::user()->profil }}"
                                                src="profil_user/{{ Auth::user()->profil }}" class="rounded-circle"
                                                alt="" style="width: 200px;height: 200px;">

                                            <form id="edit_p_p" style="position: absolute;margin-top: 100%!important"
                                                class="align-self-end d-flex flex-column shadow">
                                                <input type="file" name="profil_image" id="add_profil" hidden
                                                    onchange="display_image(this)">
                                                <label for="add_profil" style="cursor: pointer;" class="mx-auto"><i
                                                        class="fas fa-camera fa-3x text-light shadow"></i></label>
                                                <div class="d-flex">
                                                    <button class="btn btn-success" style="display: none"
                                                        id="save_change" type="submit">Modifier</button>
                                                    <span class="btn btn-danger mx-2" id="annuler_chache"
                                                        style="display: none"><i class="fa fa-times"></i></span>
                                                </div>


                                            </form>
                                        </div>

                                        <div class="list-group w-100 mt-4">
                                            <h6 class="list-group-item list-group-item-action"><b><i
                                                        class="fa fa-user-md text-muted"></i> Nom et prénom(s) :
                                                </b>{{ Auth::user()->nom_user . ' ' . Auth::user()->prenom_user }}
                                            </h6>
                                            <h6 class="list-group-item list-group-item-action"><b><i
                                                        class="far fa-envelope text-muted"></i> E-mail :
                                                </b> {{ Auth::user()->email }}</h6>
                                            <?php
                                            if (strstr(Auth::user()->phone_user, '|') > -1) {
                                                $table = explode('|', Auth::user()->phone_user);
                                                $phone1 = $table[0];
                                                $phone2 = $table[1];
                                            } else {
                                                $phone1 = Auth::user()->phone_user;
                                                $phone2 = '.........';
                                            }
                                            ?>
                                            <h6 class="list-group-item list-group-item-action"><b>
                                                    <i class="fa fa-phone text-muted"></i> Phone 01 :
                                                </b>{{ $phone1 }}
                                            </h6>
                                            <h6 class="list-group-item list-group-item-action"><b>
                                                    <i class="fa fa-phone text-muted"></i> Phone 02 :
                                                </b>{{ $phone2 }}
                                            </h6>
                                            <h6 class="list-group-item list-group-item-action"><b><i
                                                        class="fa fa-map text-muted"></i> Adresse :
                                                </b>{{ Auth::user()->adress }}
                                            </h6>
                                            <h6 class="list-group-item list-group-item-action"><b><i
                                                        class="fa fa-globe text-muted"></i> Votre site :
                                                </b><a href="{{ Auth::user()->site }}">{{ Auth::user()->site }}</a>
                                            </h6>


                                        </div>

                                        <small class="w-100 text-center mt-2"><i class="fa fa-lock text-muted"></i>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil vel sit qui
                                            ad dolorum consequuntur enim, voluptatum sequi tempore voluptates.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <!-- !content left modifier================================ -->
                            <!-- !content center edit============================================== -->
                            <div class="col-md-7 py-3" style="border: 1px solid rgb(206, 202, 202);">
                                <div style="max-height: 63vh;min-height: 45vh; overflow-y: auto;">
                                    <h4 style="font-weight: lighter;" class="text-muted">Modifier votre profil</h4>
                                    <form id="edit_profil_user">
                                        <div class="row mx-0">
                                            <div class="col-md-6 colsm-12 mb-2">
                                                <input type="text" name="nom_user_edit"
                                                    value="{{ Auth::user()->nom_user }}"
                                                    class="form-control shadow-none"
                                                    placeholder="Nom.................">
                                            </div>
                                            <div class="col-md-6 colsm-12 mb-2">
                                                <input type="text" name="prenom_user_edit"
                                                    value="{{ Auth::user()->prenom_user }}"
                                                    class="form-control shadow-none"
                                                    placeholder="Prénom(s).................">
                                            </div>
                                            <div class="col-md-12 colsm-12 mb-2">
                                                <input type="text" value="{{ Auth::user()->email }}"
                                                    name="email_user_edit" disabled class="form-control shadow-none"
                                                    placeholder="E-mail.................">
                                            </div>
                                            <div class="col-md-12 colsm-12 mb-2">
                                                <input type="text" name="adress_user_edit"
                                                    value="{{ Auth::user()->adress }}"
                                                    class="form-control shadow-none"
                                                    placeholder="Adresse.................">
                                            </div>



                                            <div class="col-md-6 colsm-12 mb-2">
                                                <label for="tel1" class="text-muted">Tél:01</label>
                                                <input type="text" id="tel1" value="{{ $phone1 }}"
                                                    name="phone1_user_edit" class="form-control shadow-none"
                                                    placeholder=".................">
                                            </div>
                                            <div class="col-md-6 colsm-12 mb-2">
                                                <label for="tel1" class="text-muted">Tél:02</label>
                                                <input type="text" id="tel2" value="{{ $phone2 }}"
                                                    name="phone2_user_edit" class="form-control shadow-none"
                                                    placeholder=".................">
                                            </div>
                                            <div class="col-md-12 colsm-12 mb-2">
                                                <small class="text-muted">Facultatif</small>
                                                <input type="text" name="web_site"
                                                    value="{{ Auth::user()->site }}" name="site_user_edit"
                                                    class="form-control shadow-none"
                                                    placeholder="Votre site.................">
                                            </div>
                                            <div class="col-md-12 colsm-12 my-4">
                                                <i class="fas fa-lock text-muted"></i>Veuiller resisir votre mot de
                                                passe
                                                pour confirmer votre modification
                                                <input type="password" name="password_user"
                                                    class="form-control shadow-none"
                                                    placeholder="Votre mot de passe.................">
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <button class="btn shadow" type="submit"
                                                style="background-color: #3399ff;">Enregistrer
                                                votre
                                                modification</button>
                                            <button class="btn shadow"
                                                style="background-color:rgba(0,0,0,0.5) ;">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- !content center edit============================================== -->
                            </div>
                        </div>
                        <!-- body edit========================================= -->
                    </div>
                </div>
                <!-- !edit profil)===================================================================== -->

                <!-- !bienvenu sur chat============================================================== -->
                <div class="card mt-2" id="page_bienvenu" style="min-height: 73vh;">
                    <!-- header bienvenu chat================================= -->
                    <div class="card-header">

                        <div class="d-flex w-100 align-items-center justify-content-between">

                            <div class="d-flex align-items-center user_status_header w-75">
                                <div>
                                    <img src="profil_user/{{ Auth::user()->profil }}" class="rounded-circle"
                                        style="width: 50px;height: 50px;" alt="">
                                </div>
                                <h6 class="mx-2">{{ Auth::user()->nom_user . ' ' . Auth::user()->prenom_user }}<br>
                                    {{ Auth::user()->email }}
                                    <i class="fas fa-circle text-success" style="font-size: 10px;"></i> <small>En
                                        ligne</small>
                                </h6>
                            </div>
                            <div class="mobile_toggle_2">
                                <div class="bar_2"></div>
                                <div class="bar_2"></div>
                                <div class="bar_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- header bienvenu chat================================= -->

                    <div class="card-body">
                        <div class="w-100">
                            <img src="image/11-48-15-802_512.gif" class="w-100" alt=""
                                style="max-height: 67.5vh;min-height: 60vh">
                        </div>

                    </div>
                </div>
                <!-- !bienvenu sur chat============================================================== -->
            </div>
            <!-- !contenu message================================================================================ -->
        </div>
    </section>
    {{-- !modal partage massage====================================================== --}}
    <div class="modal fade" id="shareImage">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" class="mx-1">
                        <h4 class="modal-title m-0">Toutes selectionner</h4>
                    </div>

                    <button type="button" class="close btn" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="liste_user_share">
                    {{-- !shar conversation single==================================================== --}}

                    {{-- !shar conversation single==================================================== --}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Envoyer</button>
                </div>

            </div>
        </div>
    </div>
    {{-- !modal partage massage====================================================== --}}

    {{-- !modal show image message===================================================== --}}
    <div class="modal fade" id="modal_image">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: transparent!important;border: none!important">

                <!-- Modal Header -->


                <!-- Modal body -->
                <div class="modal-body">

                    <div class="w-75 mx-auto d-flex justify-content-end">

                        <button type="button" class="close btn btn-light shadow rounded-circle"
                            style="position: absolute;" data-dismiss="modal">&times;</button>
                        <a id="lien_download" data-toggle="tooltip" title="Télecharger"
                            class="btn btn-light d-flex align-items-center justify-content-centrer rounded-circle"
                            style="position: absolute;margin-right: 45px;height: 40px;width: 40px"><i
                                class="fas fa-download text-muted"></i></a>



                        <img src="" id="check_image_message" alt="" class="w-100">
                    </div>

                </div>

                <!-- Modal footer -->


            </div>
        </div>
    </div>
    {{-- !modal show image message===================================================== --}}


    {{-- !modal view profil chat with============================================ --}}
    <div class="modal fade" id="view_profil_with">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                    <button type="button" class="btn btn-light shadow rounded-circle close"
                        data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12" style="border: 1px solid rgb(206, 202, 202);">
                        <div style="max-height: 63vh; overflow-y: auto;">
                            <div class="d-flex flex-column align-items-start mt-2">


                                <div class="mx-auto d-flex justify-content-center" style="position: relative;">


                                    <img id="check_p_p_chat" real_profil="{{ Auth::user()->profil }}"
                                        class="rounded-circle" alt="" style="width: 200px;height: 200px;">


                                </div>

                                <div class="list-group w-100 mt-4">
                                    <h6 class="list-group-item list-group-item-action"><b><i
                                                class="fa fa-user-md text-muted"></i> Nom et prénom(s) :
                                        </b><span id="check_nom_prenom_chat"></span>
                                    </h6>
                                    <h6 class="list-group-item list-group-item-action"><b><i
                                                class="far fa-envelope text-muted"></i> E-mail :
                                        </b> <span id="check_email_chat"></span></h6>
                                    <?php
                                    if (strstr(Auth::user()->phone_user, '|') > -1) {
                                        $table = explode('|', Auth::user()->phone_user);
                                        $phone1 = $table[0];
                                        $phone2 = $table[1];
                                    } else {
                                        $phone1 = Auth::user()->phone_user;
                                        $phone2 = '.........';
                                    }
                                    ?>
                                    <h6 class="list-group-item list-group-item-action"><b>
                                            <i class="fa fa-phone text-muted"></i> Phone 01 :
                                        </b><span id="check_phone1_chat"></span>
                                    </h6>
                                    <h6 class="list-group-item list-group-item-action"><b>
                                            <i class="fa fa-phone text-muted"></i> Phone 02 :
                                        </b><span id="check_phone2_chat"></span>
                                    </h6>
                                    <h6 class="list-group-item list-group-item-action"><b><i
                                                class="fa fa-map text-muted"></i> Adresse :
                                        </b><span id="check_adress_chat"></span>
                                    </h6>
                                    <h6 class="list-group-item list-group-item-action"><b><i
                                                class="fa fa-globe text-muted"></i> Site web :
                                        </b><a id="link_check_site_chat"><span id="check_site_chat"></span></a>
                                    </h6>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    {{-- !modal view profil chat with============================================ --}}


    {{-- !modal message file======================================== --}}
    <!-- The Modal -->
    <div class="modal fade" id="content_media">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="max-height: 50vh;overflow-y: auto">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tous les contenus images</h4>
                    <button type="button" class="close btn rounded-circle" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="max-height: 50vh">
                    <div class="row mx-0 px-0" id="content_file_messages">
                        {{-- <div class="col-md-4 colsm-4 my-2">
                        <img src="photo_image/0a66e17d3ccde15bdecb253e7e293294.jpg" class="w-100" alt="">
                    </div> --}}

                    </div>



                </div>
            </div>
        </div>
        {{-- !modal message file======================================== --}}

        <!-- liaison js===================================================================== -->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/all.min.js"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="js/emojionearea.min.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- fin liaison js======================================================================= -->

        <script>
            const bar_menu = document.querySelector('.mobile_toggle_2');
            const show_menu = document.querySelector('.side_bar_left');

            const mobilmenu2 = () => {
                show_menu.classList.toggle('active')
                console.log('test')
            }
            bar_menu.addEventListener('click', mobilmenu2)

            window.addEventListener('load', () => {
                const input = document.getElementById('send_image')
                input.addEventListener('change', (e) => {
                    let fileName = e.target.files;
                    var list = '<span class="delete_file" style="font-size:2rem;cursor:pointer;">&#215;</span>';
                    for (var i = 0; i < fileName.length; i++) {
                        list += '<span class="mx-2">' + fileName[i].name + '</span>'
                    }
                    $('#listes_images_file').html(list)
                })

            })

            function display_image(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_name').attr('src', e.target.result)
                        $('#save_change').show()
                        $('#annuler_chache').show()
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }

            $(document).on('click', '#annuler_chache', function() {
                var profil_image = $('#image_name').attr('real_profil')
                $('#add_profil').val('');
                $('#image_name').attr('src', 'profil_user/' + profil_image)
                $(this).hide()
                $('#save_change').hide()
            })
        </script>

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                // search message ===========================================================
                $(document).on('keyup', '#search_message', function() {
                    var value = $(this).val().toLowerCase();
                    $("#scroll_message *").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                })
                // search message ===========================================================


                //sharmessage_to===================================================================
                $(document).on('click', '#shareImage_to', function() {
                    var chat_with = $('#identifient_chat_with').val()
                    $.ajax({
                        url: 'chare_message/' + chat_with,
                        type: 'get',
                        success: (response) => {
                            console.log(response)
                            $('#liste_user_share').html(response)
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                //sharmessage_to===================================================================


                // check_profil_chatwith =====================================
                $(document).on('click', '#check_profil_chatwith', function() {
                    var chat_with = $('#identifient_chat_with').val()
                    $.ajax({
                        url: '{{ route('check_profil_chat') }}',
                        type: 'post',
                        data: {
                            'chat_with': chat_with
                        },
                        success: (response) => {


                            $('#check_p_p_chat').attr('src', 'profil_user/' + response.profil)
                            $('#check_email_chat').text(response.email)
                            $('#check_phone1_chat').text(response.phone1)
                            $('#check_phone2_chat').text(response.phone2)
                            $('#check_adress_chat').text(response.adress)
                            $('#check_site_chat').text(response.site)
                            $('#link_check_site_chat').attr('href', response.site)
                            $('#check_nom_prenom_chat').text(response.nom_user + ' ' + response
                                .prenom_user)



                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // check_profil_chatwith =====================================


                // show_file_type message =============================================
                $(document).on('click', '#show_file_type', function() {
                    var chat_with = $('#identifient_chat_with').val()

                    $.ajax({
                        url: '{{ route('check_file_message') }}',
                        type: 'post',
                        data: {
                            'chat_with': chat_with,
                        },
                        success: (response) => {
                            if (response.empty) {
                                $('#content_file_messages').html(response.empty)
                            } else {
                                $('#content_file_messages').html(response)
                            }

                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // show_file_type message =============================================

                // show_image_message=========================================================
                $(document).on('click', '#show_image_message', function() {
                    var image = $(this).attr('image');
                    $('#check_image_message').attr('src', image)
                    $('#lien_download').attr('href', image)

                })

                // show_image_message=========================================================


                // midifcation photo de profil
                $(document).on('submit', '#edit_p_p', function(e) {
                    e.preventDefault()
                    var form = $(this)[0];
                    var formdata = new FormData(form);

                    $.ajax({
                        url: '{{ route('maj_profil') }}',
                        type: 'post',
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: (response) => {
                            swal("Success!", response.success,
                                "success");
                            window.location.reload()
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // modification p_p 
                // scrol to bottom message============================================
                function scrollToBottom() {
                    $('#scroll_message').animate({
                        scrollTop: $('#scroll_message')[0].scrollHeight
                    }, 1000);
                }
                // scrol to bottom message============================================


                $(document).on('click', '.delete_file', function() {
                    $('#send_image').val('')
                    $('#listes_images_file').html('')
                })

                // gerer contenu message==============================
                $(document).on('click', '#chatwith', function() {
                    $('#page_bienvenu').hide()
                    $('#page_chat').show()
                    $('#page_profil').hide()


                    var chatwith = $(this).attr('identifient')
                    $.ajax({
                        url: '{{ route('chatwith') }}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            'chatwith': chatwith
                        },

                        success: (response) => {
                            $('#content_chatwith').html(response.chat_with_name)
                            $('#content_chatwith').append(response.chat_with_status)
                            $('#content_profil_chatwith').attr('src', 'profil_user/' + response
                                .chat_with_profil)
                            $('#identifient_chat_with').val(chatwith)
                            get_all_message();
                            fetchData();
                            setInterval(fetchData, 10000)
                            scrollToBottom()



                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                $(document).on('click', '#page_edit', function() {
                    $('#page_bienvenu').hide()
                    $('#page_chat').hide()
                    $('#page_profil').show()
                })
                // gerer contenu message==============================

                // gere contenu side bar left=========================
                {{-- !cherche conversation===================================== --}}
                $(document).on('input', '#search_conversation', function() {
                    if ($(this).val() == "") {
                        $('#page_search_conversation').hide()
                        $('#page_liste_conversation').show()
                    } else {
                        $('#page_search_conversation').show()
                        $('#page_liste_conversation').hide()
                        var data = $(this).val();
                        $.ajax({
                            url: '{{ route('chearch_conversation') }}',
                            type: 'post',
                            data: {
                                'data': data
                            },
                            success: (response) => {
                                if (response.empty) {
                                    $('#page_search_conversation').html(response.empty)
                                } else {
                                    $('#page_search_conversation').html(response)
                                }
                            },
                            error: (error) => {
                                console.log(error)
                            }
                        })
                    }

                })
                $(document).on('click', '#click_search_conversation', function() {
                    if ($('#search_conversation').val() == "") {
                        $('#page_search_conversation').hide()
                        $('#page_liste_conversation').show()
                    } else {
                        $('#page_search_conversation').show()
                        $('#page_liste_conversation').hide()
                        var data = $('#search_conversation').val();
                        $.ajax({
                            url: '{{ route('chearch_conversation') }}',
                            type: 'post',
                            data: {
                                'data': data
                            },
                            success: (response) => {
                                if (response.empty) {
                                    $('#page_search_conversation').html(response.empty)
                                } else {
                                    $('#page_search_conversation').html(response)
                                }
                            },
                            error: (error) => {
                                console.log(error)
                            }
                        })
                    }

                })
                {{-- !cherche conversation===================================== --}}
                // gere contenu side bar left=========================


                // get Conversation

                var fechmessage = function() {
                    $.ajax({
                        url: '{{ route('getConverstion') }}',
                        type: 'get',

                        success: (response) => {
                            if (response.empty) {
                                $('#page_liste_conversation').html(response.empty)
                            } else {
                                $('#page_liste_conversation').html(response)
                            }
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                }
                fechmessage();
                setInterval(fechmessage, 10000)
                // get Conversation


                // check enligne
                var check_enligne = function() {
                    $.ajax({
                        url: '{{ route('check_enligne') }}',
                        type: 'get',

                        success: (response) => {
                            console.log(response)
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                }
                check_enligne();
                setInterval(check_enligne, 10000)
                // check enligne

                // SEND message==============================================================
                $('#text_message').emojioneArea({
                    pickerPosition: 'top'
                })
                $('#form_send_message').on('submit', function(e) {
                    e.preventDefault()
                    $('.error_message').text('')
                    var form = $(this)[0]
                    var formData = new FormData(form)
                    $.ajax({
                        url: '{{ route('send_message') }}',
                        type: 'post',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: (response) => {

                            form.reset()
                            $('.emojionearea-editor').text('')
                            $('#listes_images_file').html('')
                            if (response.empty) {
                                $('.error_message').text(response.empty)
                            }
                            $('.empty_message').html('')
                            $('#scroll_message').append(response)
                            scrollToBottom()
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // SEND message==============================================================

                // ! get All message =========================================================
                function get_all_message() {
                    var chat_with = $('#identifient_chat_with').val()
                    $.ajax({
                        url: '{{ route('get_all_message') }}',
                        type: 'post',
                        data: {
                            'chat_with': chat_with
                        },
                        success: (response) => {

                            if (response.empty) {
                                $('#scroll_message').html(response.empty)

                            } else {
                                $('#scroll_message').html(response)
                            }
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                }
                // ! get All message =========================================================

                // fetch message=============================================
                let fetchData = function() {
                    var chat_with = $('#identifient_chat_with').val()
                    $.ajax({
                        url: '{{ route('fetchData') }}',
                        type: 'post',
                        data: {
                            'id_2': chat_with,
                        },
                        success: (response) => {
                            if (response) {
                                scrollToBottom()
                                $('#scroll_message').append(response)
                            }



                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                }
                // fetch message=============================================

                // start conversation=====================================================
                $(document).on('click', '#add_message', function() {
                    $('#page_bienvenu').hide()
                    $('#page_chat').show()
                    $('#page_profil').hide()


                    var chatwith = $(this).attr('identifient')
                    $.ajax({
                        url: '{{ route('chatwith') }}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            'chatwith': chatwith
                        },

                        success: (response) => {
                            $('#content_chatwith').html(response.chat_with_name)
                            $('#content_chatwith').append(response.chat_with_status)
                            $('#content_profil_chatwith').attr('src', 'profil_user/' + response
                                .chat_with_profil)
                            $('#identifient_chat_with').val(chatwith)
                            get_all_message();
                            fetchData();
                            setInterval(fetchData, 10000)




                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // start conversation=====================================================

                // noullel conversation=====================================
                $(document).on('click', '#add_new_conversation', function() {
                    var chatwith = $(this).attr('identifient')
                    $.ajax({
                        url: '{{ route('noulelle_conversation') }}',
                        type: 'post',
                        data: {
                            'chat_with': chatwith
                        },
                        success: (response) => {
                            $('#page_bienvenu').hide()
                            $('#page_chat').show()
                            $('#page_profil').hide()
                            $('#page_search_conversation').hide()
                            $('#page_liste_conversation').show()
                            $.ajax({
                                url: '{{ route('chatwith') }}',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    'chatwith': chatwith
                                },

                                success: (response) => {
                                    $('#content_chatwith').html(response.chat_with_name)
                                    $('#content_chatwith').append(response
                                        .chat_with_status)
                                    $('#content_profil_chatwith').attr('src',
                                        'profil_user/' + response
                                        .chat_with_profil)
                                    $('#identifient_chat_with').val(chatwith)
                                    get_all_message();
                                    fetchData();
                                    setInterval(fetchData, 10000)
                                },
                                error: (error) => {
                                    console.log(error)
                                }
                            })
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })

                })
                // noullel conversation=====================================

                // show image message===================================
                $(document).on('mouseenter', '#show_image', function() {

                    $(this).css("transform", "scale(.9)")


                })
                $(document).on('mouseleave', '#show_image', function() {

                    $(this).css("transform", "scale(1)")

                })
                // show image message===================================



                // delete single message=============================================================================
                $(document).on('click', '#delete_single_message', function() {
                    var identifient = $(this).attr('identifient')
                    $.ajax({
                        url: '{{ route('delete_single_message') }}',
                        type: 'post',
                        data: {
                            'identifient': identifient
                        },
                        success: (response) => {

                            get_all_message();


                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // delete single message=============================================================================

                //    supprimer conversation=====================================================
                $(document).on('click', '#supprimer_conversation', function() {
                    var identifient = $('#identifient_chat_with').val()
                    $.ajax({
                        url: '{{ route('supprimer_conversation') }}',
                        type: 'post',
                        data: {
                            'identifient': identifient
                        },
                        success: (response) => {
                            get_all_message();

                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                //    supprimer conversation=====================================================

                // Modification profil===================================================================

                $(document).on('submit', '#edit_profil_user', function(e) {
                    e.preventDefault();
                    var form = $(this)[0];
                    var formData = new FormData(form);

                    $.ajax({
                        url: '{{ route('update_profil') }}',
                        type: 'post',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: (response) => {
                            if (response.success) {
                                swal("Success!", response.success,
                                    "success");
                                form.reset()
                                window.location.reload()

                            } else if (response.error) {
                                swal('Error', response.error, 'error')
                            }

                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })
                // Modification profil===================================================================


                // media query=============================================================

                // .show_side_bar_left
                //side_bar_left

                // media query=========================================================
            })
            
        </script>
</body>

</html>
