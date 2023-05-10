<!DOCTYPE html>
<html>
    <head>

        <title>Penerimaan Penghargaan Teladan {{ \Carbon\Carbon::parse($created_at)->format('Y') }} - {{ Auth::guard('employees')->user()->full_name }}</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/favicon/favicon.ico') }}">

        <link rel="icon" sizes="192x192"  href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" sizes="32x32" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" sizes="96x96" href="{{ url('assets/favicon/favicon.ico') }}">
        <link rel="icon" sizes="16x16" href="{{ url('assets/favicon/favicon.ico') }}">

        <link rel="manifest" href="{{ url('assets/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ url('assets/favicon/favicon.ico') }}">
        <meta name="theme-color" content="#ffffff">

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <style>
            /* @import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester'); */

            .cursive {
                font-family: 'Pinyon Script', cursive;
            }

            .sans {
                font-family: 'Open Sans', sans-serif;
            }

            .bold {
                font-weight: bold;
            }

            .block {
                display: block;
            }

            .flex {
                display: flex;
            }

            .underline-name {
                border-bottom: 1px solid #777;
                padding: 5px 0;
                /* margin: 15vh; */
                /* width: 4vh; */
                left: 24%;
                /* right: 13.5%; */
                /* position: relative; */
                /* text-align: center; */
                /* display: flex; */
                /* flex-flow: row; */
            }

            .margin-0 {
                margin: 0;
            }

            .padding-0 {
                padding: 0;
            }

            .pm-empty-space {
                height: 40px;
                width: 100%;
            }

            body {
                padding: 20px 0;
                background: #ccc;
            }

            .pm-certificate-container {
                position: relative;
                max-width: 985px;
                min-width: 985px;
                max-height: 700px;
                min-height: 700px;
                background-color: #618597;
                padding: 30px;
                color: #333;
                font-family: 'Open Sans', sans-serif;
                box-shadow: 0 0 5px rgba(0, 0, 0, .5);
                /*background: -webkit-repeating-linear-gradient(
                    45deg,
                    #618597,
                    #618597 1px,
                    #b2cad6 1px,
                    #b2cad6 2px
                );
                background: repeating-linear-gradient(
                    90deg,
                    #618597,
                    #618597 1px,
                    #b2cad6 1px,
                    #b2cad6 2px
                );*/

                .outer-border {
                    width: 900px;
                    height: 747px;
                    position: absolute;
                    left: 35%;
                    margin-left: -380px;
                    top: 35%;
                    margin-top:-297px;
                    border: 2px solid #fff;
                }

                .inner-border {
                    width: 1010px;
                    height: 775px;
                    position: absolute;
                    left: 36.5%;
                    margin-left: -365px;
                    top: 34.5%;
                    margin-top:-265px;
                    border: 2px solid #fff;
                }

                .pm-certificate-border {
                    /* position: relative; */
                    width: 995px;
                    height: 800px;
                    position: relative;
                    left: 32.5%;
                    margin-left: 60px;
                    top: 2px;
                    margin-top: -260px;
                    border: 1px solid #E1E5F0;
                    padding: 0;
                    background-color: rgba(255, 255, 255, 1);
                    background-image: none;

                    .pm-certificate-block {
                        width: 995px;
                        height: 760px;
                        position: relative;
                        left: 32.5%;
                        margin-left: -325px;
                        top: 0px;
                        margin-top: -8px;
                    }

                    .pm-certificate-header {
                        margin-bottom: 10px;
                    }

                    .pm-certificate-img {
                        position: relative;
                        top: 40px;
                        left: 43.5%;
                        display: flex;
                        flex-flow: row;
                    }

                    .pm-certificate-title-h1 {
                        position: relative;
                        top: 40px;
                        left: 20%;
                        h1 {
                            font-size: 34px !important;
                        }
                    }

                    .pm-certificate-title-h2 {
                        position: relative;
                        top: 15px;
                        left: 28%;
                        margin-top: -10px;
                        h2 {
                            font-size: 34px !important;
                        }
                    }

                    .pm-certificate-body {
                        padding: 20px;

                        .pm-name-text {
                            font-size: 20px;
                        }
                    }

                    .pm-earned {
                        margin: 15px 0 20px;
                        .pm-earned-text {
                            font-size: 20px;
                        }
                        .pm-credits-text {
                            font-size: 15px;
                        }
                    }

                    .pm-course-title {
                        .pm-earned-text {
                            font-size: 20px;
                        }
                        .pm-credits-text {
                            font-size: 15px;
                        }
                    }

                    /* .pm-certified {
                        border: 1px solid #777;
                        widows: 50px;
                        width: 10px;
                        display: flex;
                        flex-direction: row;


                        justify-content: space-between;

                        font-size: 12px;

                        .underline {
                            margin-bottom: 5px;
                        }
                    } */

                    /* .pm-certificate-footer {
                        width: 930px;
                        height: 100px;
                        display: flex;
                        flex-direction: row;
                        position: relative;
                        left: 35%;
                        margin-left: -325px;
                        bottom: -105px;
                    } */
                }

                .pm-certified {
                    border: 1px solid #777;
                    width: 10px;
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    position: relative;
                    font-size: 12px;

                    .underline {
                        margin-bottom: 5px;
                    }
                }

                .pm-footer-certificate {
                    display: flex;
                    flex-direction: row;
                    flex-flow: nowrap;
                }

                .pm-certificate-footer {
                    /* border: 1px solid #777; */
                    width: 930px;
                    height: 100px;
                    display: flex;
                    flex-direction: row;
                    flex-flow: nowrap;
                    /* position: relative;
                    left: 35%;
                    margin-left: -325px;
                    bottom: -105px; */
                }

                .headingTitle {
                    margin-top: -25rem;
                    height: 25px;
                }

                .heading1{
                    text-align: center;
                    /* margin: auto; */
                    justify-content: center;
                    position: relative;
                    /* margin-left: 320px; */
                }

                .footer1 {
                    display: flex;
                    position: absolute;
                    margin: -40px 0 -50px 0;
                }

                .footer2 {
                    display: flex;
                    flex-direction: row;
                    flex-wrap: nowrap;
                    position: relative;
                }

                .signature {
                    /* border: 1px solid #777; */
                    display: flex !important;
                    align-items: center;
                    justify-content: center;
                    /* grid-template-columns: auto auto auto; */
                    /* flex-direction: row !important;
                    flex-wrap: wrap !important; */
                    padding: 10px;
                    margin: 0;
                }

                .signature .child {
                    padding: 20px;
                }

                #child1 {
                    width: 250px;
                    height: 150px;
                    left: 25%;
                    margin-left: 0.5rem;
                    margin-top: -40px;
                    position: absolute;
                }

                #child2 {
                    width: 250px;
                    height: 100px;
                    left: 25%;
                    margin-left: 20.5rem;
                    margin-top: 2rem;
                    position: absolute;
                }

                #child3 {
                    width: 250px;
                    height: 100px;
                    left: 25%;
                    margin-left: 42.5rem;
                    margin-top: -40px;
                    position: absolute;
                }

            }

        </style>
    </head>
    <body>

    {{-- <h1>{{ $id }}</h1>
    <p>{{ $score_final_result }}</p> --}}

        <div class="container pm-certificate-container">
            <div class="outer-border"></div>
            <div class="inner-border"></div>

            <div class="pm-certificate-border container-xl">
                <div class="d-flex flex-column justify-content-center mt-5 pm-certificate-header">
                    <div class="d-flex justify-content-center text-center">
                        <span class="text-center">
                            <img src="{{ public_path('assets/icon/KLN.png') }}" alt="logo" width="150" height="150" />
                        </span>
                    </div>
                    <div class="d-flex justify-content-center cursive text-center">
                        {{-- pm-certificate-title-h1  --}}
                        <div class="d-flex justify-content-center mt-2">
                            <h1 style="text-transform:uppercase;text-align: center;">Kementerian Luar Negeri Republik Indonesia</h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center cursive text-center">
                        <div class="d-flex justify-content-center mt-1">
                            <h2 style="text-transform:uppercase;text-align: center;">Sertifikat Penghargaan Teladan {{ \Carbon\Carbon::parse($created_at)->format('Y') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="pm-certificate-body">

                    <div class="pm-certificate-block">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                                    <div class="d-flex justify-content-center text-center headingTitle">
                                        <span class="heading1 text-center">Diberikan kepada :</span>
                                    </div>
                                    <div class="d-flex justify-content-center pm-certificate-name underline-name w-50 h-20 position-relative text-center" style="margin: 0 0.5rem;">
                                        <span class="pm-name-text bold text-center" style="text-align: center;font-size: 24px;">{{ Auth::guard('employees')->user()->full_name }}</span>
                                    </div>
                                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                                <div class="pm-earned col-xs-8 text-center">
                                    <span class="pm-earned-text padding-0 block cursive" style="width: 500px;left: 50%; margin: 0 230px 0.5rem;">Sebagai Pegawai Teladan di Kementerian Luar Negeri Republik Indonesia Pada Tahun {{ \Carbon\Carbon::parse($created_at)->format('Y') }} dengan Predikat</span>
                                    {{-- <span class="pm-earned-text padding-0 block cursive">dengan Predikat Skor</span> --}}
                                    {{-- <span class="pm-credits-text block bold sans" style="width: 500px;left: 20%; margin: 0 225px 0;">
                                        <h1 style="font-size: 32px"> {{ $score_final_result }} </h1>
                                    </span> --}}
                                    @if ($score_final_result > 0.85 && $score_final_result <= 1)
                                        <span class="pm-credits-text block bold sans" style="width: 500px;left: 20%; margin: 0 225px 0;font-size: 32px">Terbaik</span>
                                    @elseif (($score_final_result > 0.75 && $score_final_result <= 0.85))
                                        <span class="pm-credits-text block bold sans" style="width: 500px;left: 20%; margin: 0 225px 0;font-size: 32px">Baik</span>
                                    @endif
                                </div>
                                <div class="pm-earned col-xs-8 text-center">
                                    <span class="pm-earned-text padding-0 block cursive text-center" style="width: 500px;left: 50%; margin: -0.5rem 225px 0;">Semoga Penghargaan ini Dapat Menjadi Dorongan untuk meningkatkan prestasi dan memotivasi rekan kerja agar turut berprestasi pada masa yang akan datang </span>
                                </div>
                                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                                {{-- <div class="col-xs-12"></div> --}}
                            </div>
                        </div>
                    </div>


                </div>

                <div class="footer1">
                    <div class="footer2">
                        <div class="signature">
                            <div class="child text-center" id="child1">
                                {{-- <span class="pm-credits-text flex sans">Date Completed</span> --}}
                                <span class="pm-empty-space flex underline-signature">
                                    <img src="{{ public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/'.$signature_head_of_rewards_discipline_and_pension_subdivision ) }}" alt="signature" width="150" height="60" />
                                </span>
                                <span class="bold flex pt-3">{{ $name_head_of_rewards_discipline_and_pension_subdivision }}</span>
                                <span class="flex">Kepala Subbagian Penghargaan, Disiplin, dan Pensiun </span>
                            </div>
                            <div class="child text-center" id="child2">
                                {{-- <span class="pm-credits-text flex sans">Date Completed</span> --}}
                                <span class="pm-empty-space flex underline-signature">
                                    @if ( empty($signature_head_of_the_human_resources_bureau) )
                                    <span>Not Signature</span>
                                    @else
                                    <img src="{{ public_path('storage/sdm/headOfHumanResources/signature/'.$signature_head_of_the_human_resources_bureau ) }}" alt="signature" width="150" height="60" />
                                    @endif
                                </span>
                                <span class="bold flex pt-3">{{ $name_head_of_the_human_resources_bureau }}</span>
                                <span class="flex">Kepala Sumber Daya Manusia </span>
                            </div>
                            <div class="child text-center" id="child3">
                                {{-- <span class="pm-credits-text flex sans">Date Completed</span> --}}
                                <span class="pm-empty-space flex underline-signature">
                                    <img src="{{ public_path('storage/sdm/headOfDisciplinaryAwardsAndAdministration/signature/'.$signature_head_of_disciplinary_awards_and_administration ) }}" alt="signature" width="150" height="60" />
                                </span>
                                <span class="bold flex pt-3">{{ $name_head_of_disciplinary_awards_and_administration }}</span>
                                <span class="flex">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- <div class="pm-footer-certificate">
                    <div class="row pm-certificate-footer">
                        <div class="col pm-certified">
                            <span class="pm-credits-text flex sans">Date Completed</span>
                            <span class="pm-empty-space flex underline-signature"></span>
                            <span class="bold flex">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</span>
                            <span class="bold flex">Jati Heri Winarto</span>
                        </div>
                        <div class="col pm-certified-2">
                            <span class="pm-credits-text flex sans">Date Completed</span>
                            <span class="pm-empty-space flex underline-signature"></span>
                            <span class="bold flex">Kepala Sumber Daya Manusia </span>
                            <span class="bold flex">Winanto Adi</span>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>-->
    </body>
</html>
