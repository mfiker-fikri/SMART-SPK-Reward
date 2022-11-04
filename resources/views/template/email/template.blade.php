<!DOCTYPE html>

<html lang="en" 
    class="light-style layout-menu-fixed" 
    dir="ltr" 
    data-theme="theme-default" 
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
    <head>
        <!-- Meta Tag -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, 
            initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            .button-primary {
                background-color: #006eff;
                border: none;
                color: white !important;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 12px;
            }
        </style>
    </head>
    <body>

        <!-- Content -->
        @yield('content')
        <!--/ Content -->

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    <!-- Greeting Morning, Afternoon, etc -->
    <script type="text/javascript">
        // Get Date
        var day = new Date();
        // Get Hour
        var hr = day.getHours();
        // 
        let greeting;
        // 
        if (hr >= 5 && hr < 11) {
            greeting = "Good Morning";
        } else if (hr >= 11 && hr < 18) {
            greeting = "Good Afternoon"
        } else if (hr >= 18 && hr < 23) {
            greeting = "Good Evening"
        } else {
            greeting = "Good Night"
        }
        document.getElementById("greeting").innerHTML = greeting;
    </script>
    <!--/ Greeting Morning, Afternoon, etc -->

    </body>
</html>