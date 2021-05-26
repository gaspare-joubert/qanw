<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Q.A.N.W. | Home</title>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('vendor/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100" style="width: 500px; margin: auto;">
            <div class="html h3" data-column="column1">
                Select from these options:
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="table100 ver1 m-b-110">
                <table data-vertable="ver1">
                    <thead>
                    <tr class="row100 head">
                        <th id="1column" class="column100 column1" data-column="column2"></th>
                        <th id="2column" class="column100 column2" data-column="column2"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr id="1row" class="border border-dark">
                            <td>Fetch the user and album data using an api call and update the database records.</td>
                            <td>
                                <a href="{{route('api')}}" class="text-gray-900 dark:text-white"><img border="0" alt="" src="{{asset('vendor/images/icons/select.png')}}" width="30" height="30"></a>
                            </td>
                        </tr>
                        <tr id="2row" class="border border-dark">
                            <td>View a list of all users. Use the edit button in the list view to edit the user's details.</td>
                            <td>
                                <a href="{{route('users_list_view')}}" class="text-gray-900 dark:text-white"><img border="0" alt="" src="{{asset('vendor/images/icons/select.png')}}" width="30" height="30"></a>
                            </td>
                        </tr>
                        <tr id="3row" class="border border-dark">
                            <td>View a list of all albums.</td>
                            <td>
                                <a href="{{route('albums_list_view')}}" class="text-gray-900 dark:text-white"><img border="0" alt="" src="{{asset('vendor/images/icons/select.png')}}" width="30" height="30"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="html h6" data-column="column1" style="text-align: center">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</div>




<!--===============================================================================================-->
{{--<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>--}}
<!--===============================================================================================-->
<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/js/main.js')}}"></script>

</body>
</html>
