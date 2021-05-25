<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Q.A.N.W. | User Edit View</title>

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
			<div class="wrap-table100">
                <div class="html h3" data-column="column1">
                    Edit user no #???
                </div>
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
                                <th id="1column" class="column100 column2" data-column="column2">1column</th>
                                <th id="2column" class="column100 column2" data-column="column2">2column</th>
                                <th id="3column" class="column100 column2" data-column="column2">3column</th>
                                <th id="4column" class="column100 column2" data-column="column2">4column</th>
							</tr>
						</thead>
						<tbody>
                        <tr class="row100">
                            <td class="column100 column2" data-column="column2">label</td>
                            <td class="column100 column2" data-column="column2">change this to input</td>
                            <td class="column100 column2" data-column="column2">label</td>
                            <td class="column100 column2" data-column="column2">change this to input</td>
                        </tr>
                        <tr class="row100">
                            <td class="column100 column2" data-column="column2">label</td>
                            <td class="column100 column2" data-column="column2">change this to input</td>
                            <td class="column100 column2" data-column="column2">label</td>
                            <td class="column100 column2" data-column="column2">change this to input</td>
                        </tr>
                        <tr class="row100">
                            <td class="column100 column2" data-column="column2">submit</td>
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
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/js/main.js')}}"></script>

</body>
</html>
