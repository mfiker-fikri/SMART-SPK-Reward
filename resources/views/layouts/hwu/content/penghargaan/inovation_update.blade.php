@extends('template.hwu.template')

<!-- Header CSS -->
@section('css_header')
    <style>
    @media (min-width: 992px) {
        .mercadoCountdown1 {
            padding: 0;
            margin: 1em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 24px;
            line-height: 100%;
            text-align: center;
            min-height: 7vh;
            max-height: 7vh;
        }

        .mercadoCountdown1 span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }
    }

    @media (max-width: 991.98px) {
        .mercadoCountdown1 {
            padding: 0;
            margin: 0.5em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 30px;
            line-height: 100%;
            text-align: center;
            /* min-height: 5vh;
            max-height: 5vh; */
        }

        .mercadoCountdown1 span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }
    }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/skins/content/default/content.min.css" integrity="sha512-AQlh8pNI8GdH0sbUsSACzz37sCq68PohXzXYt/YOJt581nIiqnMjF4YM9lp5YVBMLR90GzkJLQNQjcfLn2yhUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
<!--/ Header CSS -->

<!-- Footer Js -->
@section('js_footer')
    <!-- Edit/Update -->
    <!-- Pdf/Word Preview -->
    <script type="text/javascript">
    function preview_pdf(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_pdf');
            var inputUpdate = document.getElementById('uploadFileUpdate');
            output.src = reader.result;
            inputUpdate.value = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Pdf/Word Preview -->

    <!-- Image Preview -->
    <script type='text/javascript'>
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            var inputUpdate = document.getElementById('uploadPhotoUpdate');
            output.src = reader.result;
            inputUpdate.value = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Image Preview -->

    <!-- Video Preview -->
    <script type="text/javascript">
    function preview_video(event)
    {
        let source = event.target.files[0];
        let blobURL = URL.createObjectURL(source);
        document.getElementById('video_here').src = blobURL;
        document.getElementById('uploadVideoUpdate').value = blobURL;
    }
    </script>
    <!--/ Video Preview -->

    <!-- Reset Preview -->
    <!-- Reset Pdf Preview -->
    <script type="text/javascript">
    function reset_pdf() {
        var old = document.getElementById("oldFile").getAttribute("value");
        var preview = document.getElementById('output_pdf').getAttribute("src");

        if (old != preview) {
            document.getElementById('output_pdf').setAttribute("src", old);
            // console.log(oldReset);
        }
        // console.log(preview);
        // a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Pdf Preview -->

    <!-- Reset Image Preview -->
    <script type="text/javascript">
    function reset_image() {
        var old = document.getElementById("oldPhoto").getAttribute("value");
        var preview = document.getElementById('output_image').getAttribute("src");

        if (old != preview) {
            document.getElementById('output_image').setAttribute("src", old);
            // console.log(oldReset);
        }
        // console.log(preview);
        // a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Image Preview -->

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <!-- Reject Formulir Inovation Id -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('#reject_inovation').on('click', function(e) {
            e.preventDefault();
            // if ($("#formInovationUpdate").valid()) {

            let id = $(this).attr('data-id');
            let description_back = $("textarea#description_back").val();
            // console.log(description_back);

            Swal.fire({
                title: 'Apakah kamu ingin menolak formulir ini?',
                icon: 'warning',
                text: 'Data formulir ini akan ditolak dan dikembalikan ke pegawai',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $('#formInovationUpdate').validate({
                        highlight: function(element) {
                            $(element).addClass("is-invalid").removeClass("is-valid");
                        },
                        unhighlight: function(element) {
                            $(element).addClass("is-valid").removeClass("is-invalid");
                        },
                        debug: false,
                        errorElement: "strong",
                        errorClass: 'text-danger',
                        rules: {
                            description_back: {
                                required: true
                            },
                        },
                        messages:{
                            description_back :
                            {
                                required: "Wajib Diisi"
                            },
                        },
                        errorPlacement: function (error, element) {
                            if (element.attr("name") == "description_back") {
                                error.appendTo("#errorTextArea").addClass("strong");
                            } else {
                                error.insertAfter(element)
                            }
                        },
                    });
                    if ($("#description_back").valid()) {
                        $.ajax({
                            headers: {
                                Accept: "application/json"
                            },
                            method: 'post',
                            url: "{{ url('ksk/form-innovation/list/update') }}" + '/' + id + '/reject',
                            data: {
                                id: id,
                                description_back: description_back,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = "/ksk/form-innovation/list";
                                    }
                                })
                            },
                            error: function(event,xhr,options,exc){
                                if (event.status == 401) {
                                    Swal.fire({
                                        icon: xhr,
                                        title: event.status + ' ' +event.statusText,
                                        text: 'Oops! 😖 Your Authorized Failed!',
                                        confirmButtonText: 'Ok',
                                    })
                                }else if (event.status == 500) {
                                    Swal.fire({
                                        icon: xhr,
                                        title: event.status + ' ' +event.statusText,
                                        text: 'Oops! 😖 Something Went Wrong!',
                                        confirmButtonText: 'Ok',
                                    })
                                } else {
                                    Swal.fire({
                                        icon: xhr,
                                        title: event.status + ' ' +event.statusText,
                                        text: 'Oops! 😖 Something went wrong!',
                                        confirmButtonText: 'Ok',
                                    })
                                }
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        title: 'Gagal ',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    })
                }
            });
            // }
        });
    });
    </script>
    <!--/ Reject Formulir Inovation Id -->

    <!-- Back Formulir Inovation Id -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('#sendback_inovation').on('click', function(e) {
            e.preventDefault();

            let id = $(this).attr('data-id');
            let description_back = $("textarea#description_back").val();
            // console.log(id);

            Swal.fire({
                title: 'Apakah kamu ingin mengembalikan formulir ini?',
                icon: 'warning',
                text: 'Data formulir ini akan dikembalikan ke pegawai dan diubah kembali oleh pegawai',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $('#formInovationUpdate').validate({
                        highlight: function(element) {
                            $(element).addClass("is-invalid").removeClass("is-valid");
                        },
                        unhighlight: function(element) {
                            $(element).addClass("is-valid").removeClass("is-invalid");
                        },
                        debug: false,
                        errorElement: "strong",
                        errorClass: 'text-danger',
                        rules: {
                            description_back: {
                                required: true
                            },
                        },
                        messages:{
                            description_back :
                            {
                                required: "Wajib Diisi"
                            },
                        },
                        errorPlacement: function (error, element) {
                            if (element.attr("name") == "description_back") {
                                error.appendTo("#errorTextArea").addClass("strong");
                            } else {
                                error.insertAfter(element)
                            }
                        },
                    });
                    if ($("#description_back").valid()) {
                        $.ajax({
                            headers: {
                                Accept: "application/json"
                            },
                            method: 'post',
                            url: "{{ url('ksk/form-innovation/list/update') }}" + '/' + id + '/back',
                            data: {
                                id: id,
                                description_back: description_back,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = "/ksk/form-innovation/list";
                                    }
                                })
                            },
                            error: function(event,xhr,options,exc){
                                if (event.status == 401) {
                                    Swal.fire({
                                        icon: xhr,
                                        title: event.status + ' ' +event.statusText,
                                        text: 'Oops! 😖 Your Authorized Failed!',
                                        confirmButtonText: 'Ok',
                                    })
                                }else if (event.status == 500) {
                                    Swal.fire({
                                        icon: xhr,
                                        title: event.status + ' ' +event.statusText,
                                        text: 'Oops! 😖 Something Went Wrong!',
                                        confirmButtonText: 'Ok',
                                    })
                                } else {
                                    Swal.fire({
                                        icon: xhr,
                                        title: event.status + ' ' +event.statusText,
                                        text: 'Oops! 😖 Something went wrong!',
                                        confirmButtonText: 'Ok',
                                    })
                                }
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        title: 'Gagal ',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    })
                }
            });
        });
    });
    </script>
    <!--/ Back Formulir Inovation Id -->

    <!-- Back Formulir Inovation Id -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('#submit_inovation').on('click', function(e) {
            e.preventDefault();

            let id = $(this).attr('data-id');
            let description_back = $("textarea#description_back").val();
            // console.log(id);

            Swal.fire({
                title: 'Apakah kamu ingin menyetujui formulir ini?',
                icon: 'warning',
                text: 'Data formulir ini akan dikirim ke penilai',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            .then((result) => {
                if (result.isConfirmed) {
                    // if ($("#description_back").valid()) {
                    $.ajax({
                        headers: {
                            Accept: "application/json"
                        },
                        method: 'post',
                        url: "{{ url('ksk/form-innovation/list/update') }}" + '/' + id + '/process',
                        data: {
                            id: id,
                            description_back: description_back,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "/ksk/form-innovation/list";
                                }
                            })
                        },
                        error: function(event,xhr,options,exc){
                            if (event.status == 401) {
                                Swal.fire({
                                    icon: xhr,
                                    title: event.status + ' ' +event.statusText,
                                    text: 'Oops! 😖 Your Authorized Failed!',
                                    confirmButtonText: 'Ok',
                                })
                            }else if (event.status == 500) {
                                Swal.fire({
                                    icon: xhr,
                                    title: event.status + ' ' +event.statusText,
                                    text: 'Oops! 😖 Something Went Wrong!',
                                    confirmButtonText: 'Ok',
                                })
                            } else {
                                Swal.fire({
                                    icon: xhr,
                                    title: event.status + ' ' +event.statusText,
                                    text: 'Oops! 😖 Something went wrong!',
                                    confirmButtonText: 'Ok',
                                })
                            }
                        }
                    });
                    // }
                } else {
                    Swal.fire({
                        title: 'Gagal ',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    })
                }
            });
        });
    });
    </script>
    <!--/ Back Formulir Inovation Id -->

    <script>
        $(document).ready(function () {
            $('#formInovationUpdate-form').validate({
                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                debug: false,
                errorElement: "strong",
                errorClass: 'text-danger',
                rules: {
                    description_back: {
                        required: true
                    },
                },
                messages:{
                    description_back :
                    {
                        required: "Wajib Diisi"
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "description_back") {
                        error.appendTo("#errorTextArea").addClass("strong");
                    } else {
                        error.insertAfter(element)
                    }
                },
                success: function (element) {
                    element.text('OK!').addClass('valid')
                        .closest('.control-group').removeClass('error').addClass('success');
                }
            });
        });
    </script>

    <!-- Reset -->
    <script type="text/javascript">
    function reset_check() {
        var backBtn                 =   $('#sendback_inovation').hide();
        var rejectBtn               =   $('#reject_inovation').hide();
        var submitBtn               =   $('#submit_inovation').show();
        var textdescription_back    =   $('#description_back').attr("disabled", "disabled");

        // if ($('#description_back').is(":disabled") == false) {
        //     backBtn.hide();
        //     rejectBtn.hide();
        //     submitBtn.show();
        //     textdescription_back.attr("disabled", "disabled");
        //     $('#description_back').removeClass("is-invalid");
        //     $('#errorTextArea').children('label').remove();
        //     // tinymce.activeEditor.getBody().setAttribute('contenteditable', false);
        // }
        backBtn.hide();
        rejectBtn.hide();
        submitBtn.show();
        textdescription_back.attr("disabled", "disabled");
        $('#description_back').removeClass("is-invalid");
        $('#description_back').removeClass("is-valid");
        $('#errorTextArea').children('strong').remove();
    }
    </script>
    <!--/ Reset -->

    <!-- -->
    <script>
        $(document).ready(function () {
            // Btn
            var backBtn     =   $('#sendback_inovation').hide();
            var rejectBtn   =   $('#reject_inovation').hide();
            var submitBtn   =   $('#submit_inovation').show();

            // Text
            var textdescription_back    = $('#description_back').attr("disabled", "disabled");

            // Formulir
            var formId                  =   $('#formInovationUpdate').attr("data-id");
            var routeForm               =   $('#formInovationUpdate').attr("action");

            // URL
            var urlReject                   =   "{{ url('ksk/form-innovation/list/update') }}"+ '/' + formId + '/reject';
            var urlBack                     =   "{{ url('ksk/form-innovation/list/update') }}"+ '/' + formId + '/back';
            var urlProcess                  =   "{{ url('ksk/form-innovation/list/update') }}"+ '/' + formId + '/process';
            // console.log(form.attr("action", url));
            // Switch

            $('input[name="check_description_back"]').change(function(){

                if ($('input[name="check_description_back"]:checked').length > 0 ) {
                    if ($('#description_back').val() == null) {
                        if ($('input[name="check_reject_back"]').is(":checked") == true) {
                            // check
                            $('input[name="check_reject_back"]').prop('checked', false);
                            // Text Area
                            textdescription_back.removeAttr("disabled");
                            textdescription_back.val(null);
                            $('#description_back').attr("required", "required");
                            $('textarea#description_back').removeClass("is-invalid");
                            $('#description_back').removeClass("is-valid");
                            $('#errorTextArea').children('strong').remove();
                            // btn
                            backBtn.show();
                            rejectBtn.hide();
                            submitBtn.hide();
                            // route
                            $('#formInovationUpdate').attr("action", urlBack);
                        }
                        textdescription_back.removeAttr("disabled");
                        textdescription_back.val(null);
                        $('#description_back').attr("required", "required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        // btn
                        backBtn.show();
                        rejectBtn.hide();
                        submitBtn.hide();
                        // Route
                        $('#formInovationUpdate').attr("action", urlBack);
                    }
                    else if (($('#description_back').val() != null)) {
                        if ($('input[name="check_reject_back"]').is(":checked") == true) {
                            // check
                            $('input[name="check_reject_back"]').prop('checked', false);
                            // Text Area
                            textdescription_back.removeAttr("disabled");
                            // textdescription_back.val(null);
                            $('#description_back').attr("required", "required");
                            $('textarea#description_back').removeClass("is-invalid");
                            $('#description_back').removeClass("is-valid");
                            $('#errorTextArea').children('strong').remove();
                            // btn
                            backBtn.show();
                            rejectBtn.hide();
                            submitBtn.hide();
                            // route
                            $('#formInovationUpdate').attr("action", urlBack);
                        }
                        textdescription_back.removeAttr("disabled");
                        // textdescription_back.val(null);
                        $('#description_back').attr("required", "required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        // btn
                        backBtn.show();
                        rejectBtn.hide();
                        submitBtn.hide();
                        // Route
                        $('#formInovationUpdate').attr("action", urlBack);
                    }
                } else {
                    if ($('#description_back').val() == null) {
                        textdescription_back.attr("disabled", "disabled");
                        textdescription_back.val(null);
                        $('#description_back').removeAttr("required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        //
                        backBtn.hide();
                        rejectBtn.hide();
                        submitBtn.show();
                        //
                        $('#formInovationUpdate').attr("action", urlProcess);
                    } else {
                        textdescription_back.attr("disabled", "disabled");
                        // textdescription_back.val(null);
                        $('#description_back').removeAttr("required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        //
                        backBtn.hide();
                        rejectBtn.hide();
                        submitBtn.show();
                        //
                        $('#formInovationUpdate').attr("action", urlProcess);
                    }
                }
            });

            $('input[name="check_reject_back"]').change(function(){

                if ($('input[name="check_reject_back"]:checked').length > 0) {
                    if ($('#description_back').val() == null) {
                        if ($('input[name="check_description_back"]').is(":checked") == true) {
                            // Check
                            $('input[name="check_description_back"]').prop('checked', false);
                            // Text Area
                            textdescription_back.removeAttr("disabled");
                            textdescription_back.val(null);
                            $('#description_back').attr("required", "required");
                            $('textarea#description_back').removeClass("is-invalid");
                            $('#description_back').removeClass("is-valid");
                            $('#errorTextArea').children('strong').remove();
                            //
                            backBtn.hide();
                            rejectBtn.show();
                            submitBtn.hide();
                            //
                            $('#formInovationUpdate').attr("action", urlReject);
                        }
                        textdescription_back.removeAttr("disabled");
                        textdescription_back.val(null);
                        $('#description_back').attr("required", "required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        //
                        backBtn.hide();
                        rejectBtn.show();
                        submitBtn.hide();
                        //
                        $('#formInovationUpdate').attr("action", urlReject);
                    } else {
                        if ($('input[name="check_description_back"]').is(":checked") == true) {
                            // Check
                            $('input[name="check_description_back"]').prop('checked', false);
                            // Text Area
                            textdescription_back.removeAttr("disabled");
                            // textdescription_back.val(null);
                            $('#description_back').attr("required", "required");
                            $('textarea#description_back').removeClass("is-invalid");
                            $('#description_back').removeClass("is-valid");
                            $('#errorTextArea').children('strong').remove();
                            //
                            backBtn.hide();
                            rejectBtn.show();
                            submitBtn.hide();
                            //
                            $('#formInovationUpdate').attr("action", urlReject);
                        }
                        textdescription_back.removeAttr("disabled");
                        // textdescription_back.val(null);
                        $('#description_back').attr("required", "required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        //
                        backBtn.hide();
                        rejectBtn.show();
                        submitBtn.hide();
                        //
                        $('#formInovationUpdate').attr("action", urlReject);
                    }
                } else {
                    if ($('#description_back').val() == null) {
                        textdescription_back.attr("disabled", "disabled");
                        textdescription_back.val(null);
                        $('#description_back').removeAttr("required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        //
                        backBtn.hide();
                        rejectBtn.hide();
                        submitBtn.show();
                        //
                        $('#formInovationUpdate').attr("action", urlProcess);
                    } else {
                        textdescription_back.attr("disabled", "disabled");
                        // textdescription_back.val(null);
                        $('#description_back').removeAttr("required");
                        $('textarea#description_back').removeClass("is-invalid");
                        $('#description_back').removeClass("is-valid");
                        $('#errorTextArea').children('strong').remove();
                        //
                        backBtn.hide();
                        rejectBtn.hide();
                        submitBtn.show();
                        //
                        $('#formInovationUpdate').attr("action", urlProcess);
                    }
                }
            });
        });
    </script>
    <!--/ -->

    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>

    <script>
        $(".mercadoCountdown1").each( function(){
            var _this = $(this);
            var _expire = _this.data('expire');
            flag2 = true;
            _this.countdown(_expire,{
                elapse:     false,
                precision:  1000,
                // defer:      '{bool} Deferred initialization mode'
            })
            .on('update.countdown', function(event) {
                // console.log(event.offset.minutes == 12);
                if(event.offset.totalDays == 1 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Verifikasi Formulir Penghargaan Inovasi Pegawai Ditutup dalam' + ' ' + 2 + 'Hari',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                if(event.offset.totalDays == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Verifikasi Formulir Penghargaan Inovasi Pegawai Ditutup Besok',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                if(event.offset.totalHours == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Verifikasi Formulir Penghargaan Inovasi Pegawai Ditutup dalam' + ' ' + 1 + 'Jam',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                if(event.offset.totalMinutes == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Verifikasi Formulir Penghargaan Inovasi Pegawai Ditutup dalam' + ' ' + 1 + 'Menit',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
            })
            .on('finish.countdown', function(){
                Swal.fire({
                    title: 'Verifikasi Formulir Penghargaan Inovasi Pegawai Ditutup',
                    icon: 'success',
                    html: 'Pop up will close in <b></b> milliseconds.',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    timer: 8000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 300)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    },
                    didClose: () => {
                        window.location = "{{ url('form-innovation/list') }}";
                    },
                });
            });
        });
    </script>
    <!--/ Timer Countdown -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/tinymce.min.js" integrity="sha512-in/06qQzsmVw+4UashY2Ta0TE3diKAm8D4aquSWAwVwsmm1wLJZnDRiM6e2lWhX+cSqJXWuodoqUq91LlTo1EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/icons/default/icons.min.js" integrity="sha512-iZEjj5ZEdiNAMLCFKlXVZkE0rKZ9xRGFtr0aMi8gxbEl1RbMCbpPomRiKurc93QVFdaxcnduQq6562xxqbC6wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
        tinymce.init({
            selector: 'textarea#description_back', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker editimage help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export footnotes mergetags autocorrect',
            menubar: 'file edit view insert format tools tc help',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code',
        });
    </script> --}}
@stop
<!--/ Footer Js -->

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-3">

                <!-- Formulir Inovation Update Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Verifikasi Formulir Penghargaan Inovasi Pegawai - {{ $rewardInovation->full_name }}</h5>
                </div>
                <!--/ Formulir Inovation Update Title -->

                <!-- Formulir Inovation Update Details -->
                <div class="card-body py-md-4 py-4 mx-4 mx-4">

                    <div class="py-3 d-flex flex-column justify-content-start">
                        @if (
                            (
                                ($timer->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation) )
                            ||  ( ($timer->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation) )
                        )
                            <div class="mx-1 mx-1 mx-1">
                                <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Verifikasi Formulir Penghargaan Inovasi Pegawai</div>
                            </div>
                        @else
                            <div class="mx-1 mx-1 mx-1">
                                <h3 class="text-center text-dark">Penutupan Verifikasi Formulir Penghargaan Inovasi Pegawai</h3>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_innovation)->addDays(1)->toDateTimeString()  }}"></div>
                            </div>
                        @endif
                    </div>

                    <form id="formInovationUpdate" class="mx-3 my-3" method="POST" action="{{ route('hwu.postInovationFormData.Read.Process.HWU', $rewardInovation->id) }}" enctype="multipart/form-data" data-id="{{ $rewardInovation->id }}">
                        @csrf
                        <!-- Full Name -->
                        <div class="row my-3 {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                            <label for="full_name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                                    <span id="full_name" class="input-group-text">
                                        <i class="fa-solid fa-user-tie" style="color: #000000;"></i>
                                    </span>
                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('full_name') ? 'is-invalid' : '' }}" id="full_name"
                                        name="full_name" placeholder="*Nama Lengkap" disabled
                                        autofocus autocomplete required value="{{ old('full_name', $rewardInovation->full_name) }}" />
                                </div>

                                <div class="d-flex flex-column">
                                    {{-- <div class="form-text">Nama Lengkap Harus Berisi Huruf</div> --}}

                                    <!-- Error Full_name -->
                                    @if ( $errors->has('full_name') )
                                    <div class="my-3">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('full_name') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Full_name -->
                                </div>

                            </div>
                        </div>
                        <!--/ Full Name -->

                        <!-- Upload Short Description -->
                        <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadFileUpdate" class="col-xl-3 col-form-label">Deskripsi Singkat</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                                    {{-- <input disabled type="hidden" name="oldFile" value="{{ old('oldFile', $rewardInovation->upload_file_short_description) }}" />
                                    <input disabled type="hidden" name="oldFile" id="oldFile" value="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. $rewardInovation->username. '/' . $rewardInovation->upload_file_short_description) }}" />

                                    <label class="input-group-text {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}" for="uploadFile">
                                        <i class="fa-solid fa-file"></i>
                                    </label>
                                    <input disabled type="file" class="form-control {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate')  ? 'is-invalid' : '' }}" id="uploadFile"
                                        value="{{ old('uploadFileUpdate', $rewardInovation->upload_file_short_description) }}"
                                        name="uploadFile" accept=".pdf" onchange="preview_pdf(event)"> --}}

                                    <input disabled type="hidden" name="uploadFileUpdate" id="uploadFileUpdate"
                                        value="{{ $rewardInovation->upload_file_short_description }}"
                                        required />
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    {{-- <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload File 3Mb (3072 Kb)</small> --}}
                                    <!--/ Text Small -->

                                    <!-- Error Upload Short Description -->
                                    @if ( $errors->has('uploadFile') || $errors->has('uploadFileUpdate') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadFile') ?: $errors->first('uploadFileUpdate') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Short Description -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <iframe class="d-block rounded" width="600" height="350" id="output_pdf" allow="fullscreen" loading="lazy" src="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. $rewardInovation->username. '/' . $rewardInovation->upload_file_short_description) }}"></iframe>
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Short Description -->

                        <!-- Upload Photo -->
                        <div class="row my-3 {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadPhoto" class="col-xl-3 col-form-label">Foto</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                                    {{-- <input disabled type="hidden" name="oldPhoto" value="{{ old('oldPhoto',$rewardInovation->upload_file_image_support) }}" />
                                    <input disabled type="hidden" name="oldPhoto" id="oldPhoto" value="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. $rewardInovation->username. '/' . $rewardInovation->upload_file_image_support) }}" />

                                    <label class="input-group-text {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}" for="uploadPhoto">
                                        <i class="fa-solid fa-file-image"></i>
                                    </label>
                                    <input disabled type="file" class="form-control {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}" id="uploadPhoto"
                                        value="{{ old('uploadPhotoUpdate', $rewardInovation->upload_file_image_support) }}"
                                        name="uploadPhoto" accept=".png, .jpg, .jpeg" onchange="preview_image(event)"> --}}

                                    <input disabled type="hidden" name="uploadPhotoUpdate" id="uploadPhotoUpdate"
                                        value="{{ $rewardInovation->upload_file_image_support }}"
                                        required />
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    {{-- <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload Foto 5Mb (5120 Kb)</small> --}}
                                    <!--/ Text Small -->

                                    <!-- Error Upload Photo -->
                                    @if ( $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate'))
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadPhoto') ?: $errors->first('uploadPhotoUpdate') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Photo -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <img class="d-block rounded" width="450" height="350" id="output_image" src="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. $rewardInovation->username. '/' . $rewardInovation->upload_file_image_support) }}">
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Photo -->

                        <!-- Upload Video -->
                        <div class="row my-3 {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadVideo" class="col-xl-3 col-form-label">Video</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                                    {{-- <input disabled type="hidden" name="oldVideo" value="{{ old('oldVideo',$rewardInovation->upload_file_video_support) }}" />
                                    <input disabled type="hidden" name="oldVideo" id="oldVideo" value="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. $rewardInovation->username. '/' . $rewardInovation->upload_file_video_support) }}" />

                                    <label class="input-group-text {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}" for="uploadVideo">
                                        <i class="fa-solid fa-file-video"></i>
                                    </label>
                                    <input disabled type="file" class="form-control {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" id="uploadVideo"
                                        name="uploadVideo" accept="video/*" onchange="preview_video(event)" /> --}}

                                    <input disabled type="hidden" name="uploadVideoUpdate" id="uploadVideoUpdate"
                                        value="{{ $rewardInovation->upload_file_video_support }}"
                                        required />
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    {{-- <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload File 1Gb (1024000 Kb)</small> --}}
                                    <!--/ Text Small -->

                                    <!-- Error Upload Video -->
                                    @if ( $errors->has('uploadVideo') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadVideo') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Video -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <video class="d-block rounded" style="max-width: 650px; min-width: 450px; max-height: 450px; min-height: 350px" controls id="video_here" src="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. $rewardInovation->username. '/' . $rewardInovation->upload_file_video_support) }}"></video>
                                </div>

                            </div>
                        </div>
                        <!--/ Upload Video -->


                        {{-- @if ($rewardInovation->status_process == 1 && $rewardInovation->description_back != null) --}}


                        {{-- <label class="switch">
                            <input type="checkbox" class="switch-input" />
                            <span class="switch-toggle-slider">
                                <span class="switch-on">
                                    <i class="fa-solid fa-check" style="color: #000000;"></i>
                                </span>
                                <span class="switch-off">
                                    <i class="fa-solid fa-x" style="color: #000000;"></i>
                                </span>
                            </span>
                            <span class="switch-label">With icon</span>
                        </label> --}}

                        <div class="row my-3 {{ $errors->has('description_back') ? 'is-invalid' : '' }}">
                            <label for="description_back" class="col-xl-3 col-form-label">Keterangan </label>
                            <div class="col-md-9 col-xl-9">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="check_description_back">Dikembalikan</label>
                                    <input class="form-check-input" name="check_description_back" type="checkbox" role="switch" id="check_description_back">

                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="check_reject_back">Ditolak</label>
                                    <input class="form-check-input" name="check_reject_back" type="checkbox" role="switch" id="check_reject_back">
                                </div>

                                <div class="input-group">
                                    <textarea class="form-control" aria-label="With textarea"
                                    id="description_back" placeholder="Keterangan"
                                    autocomplete="on" autofocus name="description_back"
                                    spellcheck="true" rows="10" cols="50">{{ old('description_back', $rewardInovation->description_back) }}</textarea>
                                </div>

                                <div class="d-flex flex-column" id="errorTextArea">
                                    <!-- Text Small -->
                                    <small class="form-text text-muted text-break text-monospace text-sm-left">**Diisi jika dikembalikan atau ditolak</small>
                                    <!--/ Text Small -->

                                    <!-- Error Upload Video -->
                                    @if ( $errors->has('description_back') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong class="errorTextArea">{{ $errors->first('description_back') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Video -->
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}

                        <input type="hidden" name="status_process" value="{{ $rewardInovation->status_process }}" />

                        <!-- Action Button -->
                        <div class="my-md-4 d-flex flex-row justify-content-end">
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('/ksk/form-innovation/list') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                    <i class="fa-solid fa-rotate mx-auto me-1"></i>Reload
                                </a>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <button type="reset" class="btn btn-warning btn-lg" onclick="reset_check()">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i>Reset
                                </button>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <button type="button" class="btn btn-primary btn-lg" style="color: black" id="reject_inovation" data-id="{{ $rewardInovation->id }}">
                                    <i class="fa-solid fa-file-circle-xmark mx-auto me-2" style="color: #000000;"></i>Kirim Penolakan File
                                </button>
                                <button type="button" class="btn btn-primary btn-lg" style="color: black" id="sendback_inovation" data-id="{{ $rewardInovation->id }}">
                                    <i class="fa-solid fa-file-circle-minus mx-auto me-2" style="color: #000000;"></i>Kirim Pengembalian File
                                </button>
                                <button type="button" class="btn btn-primary btn-lg" style="color: black" id="submit_inovation" data-id="{{ $rewardInovation->id }}">
                                    <i class="fa-solid fa-file-circle-check mx-auto me-2" style="color: #000000;"></i>Kirim Persetujuan File
                                </button>
                            </div>
                        </div>
                        <!--/ Action Button -->

                    </form>

                </div>
                <!--/ Formulir Inovation Update Details -->

            </div>

        </div>
    </div>
</div>

@endsection
