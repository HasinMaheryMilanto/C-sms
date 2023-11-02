<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- liaison css========================================================================== -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="icon" href="{{ asset('image/smsLogo1.png') }}">
    <link rel="stylesheet" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/main.css') }}">

    <!-- liaison css======================================================================= -->

    <!-- liaison js===================================================================== -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('js/all.min.js') }}"></script>

    <script src="{{ asset('js/emojionearea.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>



    <title>Autentification</title>
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                {{-- !form connexion================================================================== --}}
                <form class="login100-form validate-form" id="formulaire_connexion">
                    <span class="login100-form-title p-b-49">
                        Connexion
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Email ou mobile</span>


                        <span class="text-danger" id="error_email_connexion"></span>
                        <input class="input100" type="text" name="email_mobile_user_connexion"
                            placeholder="Entrer votre email ou mobile" id="email_mobile_user_connexion">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Mot de passe</span>
                        <span class="text-danger" id="error_password_connexion"></span>
                        <input class="input100" type="password" name="password_user_connexion"
                            id="password_user_connexion" placeholder="Votre mot de pass">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Mot de passe oublier
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Se connecter
                            </button>
                        </div>
                    </div>
                </form>
                {{-- !form connexion================================================================== --}}
                <div class="txt1 text-center p-t-54 p-b-20">
                    <span style="cursor: pointer;" data-toggle="modal" data-target="#myModal">
                        Créer un compte
                    </span>
                </div>
                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="#" class="login100-social-item bg2">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="#" class="login100-social-item bg3">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content px-5">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    {{-- !form inscription ==================================================================================================================== --}}
                    <form class="login100-form validate-form" id="formulaire_inscription">
                        <div style="width: 100px;"
                            class="mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <img src="image/avatar-homme.png" class="w-100 ronded-circle" alt="">
                            <a href="javascript:void(0)" id="select_picture_image"
                                class="btn btn-secondary rounded-circle shadow align-self-end"
                                style="position: absolute;"><i class="fas fa-camera fa-2x"></i></a>
                        </div>
                        <span class="w-100 text-center text-danger error_profil_inscription"></span>


                        <input type="file" name="photo_profil" id="photo_profil" style="display: none;">
                        <div class="row mx-0">
                            <div class="wrap-input100 validate-input m-b-23 col-md-6 "
                                data-validate="Username is reauired">
                                <span class="label-input100">Nom</span>
                                <span class="text-danger error_nom_inscription"></span>
                                <input class="input100" type="text" name="nom_inscription" id="nom_inscription"
                                    placeholder="Entrer votre nom">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>

                            </div>
                            <div class="wrap-input100 validate-input m-b-23 col-md-6 "
                                data-validate="Username is reauired">
                                <span class="label-input100">Prénom</span>
                                <span class="text-danger error_prenom_inscription"></span>
                                <input class="input100" type="text" name="prenom_inscription"
                                    id="prenom_inscription" placeholder="Entrer votre prénom(s)">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>

                            </div>
                            <div class="wrap-input100 validate-input m-b-23 col-md-6 "
                                data-validate="Username is reauired">
                                <span class="label-input100">Email</span>
                                <span class="text-danger error_email_inscription"></span>
                                <input class="input100" type="text" name="email_inscription"
                                    id="email_inscription" placeholder="Entrer votre email">
                                <span class="focus-input100" data-symbol="&#9993;"></span>

                            </div>
                            <div class="wrap-input100 validate-input m-b-23 col-md-6 "
                                data-validate="Username is reauired">
                                <span class="label-input100">Mobile</span>
                                <span class="text-danger error_phone_inscription"></span>
                                <input class="input100" type="text" name="phone_inscription"
                                    id="phone_inscription" placeholder="Entrer votre numero mobile">
                                <span class="focus-input100" data-symbol="&#9742;"></span>

                            </div>
                            <div class="wrap-input100 validate-input m-b-23 col-md-6 "
                                data-validate="Username is reauired">
                                <span class="label-input100">Mot de passe <small>(au moin 8 caractères)</small></span>
                                <span class="text-danger error_password_inscription"></span>
                                <input class="input100" type="password" name="password_iscription"
                                    id="password_iscription" placeholder="Entrer votre mot de passe ">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>

                            </div>
                            <div class="wrap-input100 validate-input m-b-23 col-md-6 "
                                data-validate="Username is reauired">
                                <span class="label-input100">Confirmer</span>
                                <span class="text-danger error_cpassword_inscription"></span>
                                <input class="input100" type="password" name="cpassword_inscription"
                                    id="cpassword_inscription" placeholder="Confirmer">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>

                            </div>
                        </div>
                        <div class="container-login100-form-btn mx-auto" style="min-width: 200px;width: 300px;">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">
                                    Créer votre vompte
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- !form inscription ==================================================================================================================== --}}
                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span style="cursor: pointer;" data-toggle="modal" data-target="#myModal">
                            Avez-vous dejà un compte
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fab fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal confirmation compte======================================================================================================================= -->
    <div class="modal fade" id="confirm_compte">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <small class="text-center"><i class="fas fa-lock text-muted mx-2"></i>Votre compte n'est
                                pas encore activer, Veuiller verifier votre boite email pour avoir votre code de
                                confirmation!</small>

                        </div>
                        <form id="validation">
                            <div class="card-body">
                            <h4>Code de confirmation ici</h4>
                            <div class="input-group mt-3">
                                <span class="input-group-text">Csms - </span>
                                <input type="text" class="form-control shadow-none" name="code_confirm" id="code_confirm" placeholder="Code..........">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Valider</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal confirmation compte======================================================================================================================= -->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            // INSCRIPTION ============================================================================

            $('#select_picture_image').click(function() {
                $('#photo_profil').click()
            })
            $(document).on('submit', '#formulaire_inscription', function(e) {
                e.preventDefault()
                $('.error_nom_inscription').text('');
                $('.error_prenom_inscription').text('');
                $('.error_email_inscription').text('');
                $('.error_phone_inscription').text('');
                $('.error_password_inscription').text('');
                $('.error_cpassword_inscription').text('');
                $('.error_cpassword_inscription').text('');

                var form_iscription = $(this)[0];
                var formData = new FormData(form_iscription);
                $.ajax({
                    url: '{{ route('inscription') }}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        if (response.Nmdp) {
                            $('.error_cpassword_inscription').text(response.Nmdp);
                        } else if (response.email_existe) {
                            $('.error_email_inscription').text(response.email_existe);
                        } else {
                            swal("Success!", response.success,
                                "success");
                            window.location.reload()
                            form_iscription.reset()
                        }
                    },
                    error: (error) => {
                        if (error) {
                            $('.error_nom_inscription').text(error.responseJSON.errors
                                .nom_inscription);
                            $('.error_prenom_inscription').text(error.responseJSON.errors
                                .prenom_inscription);
                            $('.error_email_inscription').text(error.responseJSON.errors
                                .email_inscription);
                            $('.error_phone_inscription').text(error.responseJSON.errors
                                .phone_inscription);
                            $('.error_password_inscription').text(error.responseJSON.errors
                                .password_iscription);
                            $('.error_cpassword_inscription').text(error.responseJSON.errors
                                .cpassword_inscription);
                            $('.error_profil_inscription').text(error.responseJSON.errors
                                .photo_profil);
                        }
                    }
                })

            })
            // INSCRIPTION ============================================================================
            // Connexion===============================================================================
            $(document).on('submit', '#formulaire_connexion', function(e) {
                $('#error_password_connexion').text('');
                $('#error_email_connexion').text('');
                e.preventDefault()
                var form_connexion = $(this)[0];
                var formData = new FormData(form_connexion);

                $.ajax({
                    url: '{{ route('connexion') }}',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {

                        if (response.error) {
                            swal('Error', response.error, 'error')
                        } else if (response.compteinactif) {
                            $('#confirm_compte').modal('show');
                        } else {
                            window.location.href = "{{ route('home') }}"
                            form_connexion.reset()
                        }
                    },
                    error: (error) => {
                        if (error) {
                            $('#error_password_connexion').text(error.responseJSON.errors
                                .password_user_connexion);
                            $('#error_email_connexion').text(error.responseJSON.errors
                                .email_mobile_user_connexion);
                        }
                    }
                })

            })

            //connexion================================================================================

            // validation ==================================================================
            $(document).on('submit','#validation',function(e){
                e.preventDefault()
                var form=$(this)[0];
                var formdata=new FormData(form)
                $.ajax({
                    url:'{{ route("validate_compte") }}',
                    type:'post',
                    processData:false,
                    contentType:false,
                    data:formdata,
                    success:(response)=>{
                        if(response.Nactive){
                            swal('Error', response.Nactive, 'error')
                        }else{
                            swal("Success!", response.active,
                                "success");
                                window.location.href = "{{ route('home') }}"
                                form.reset()
                        }
                    },error:(error)=>{
                        console.log(error)
                    }
                })
            })
            // validation ==================================================================
        })
    </script>


</body>

</html>
