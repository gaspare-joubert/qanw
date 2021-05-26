<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="width:2050px;">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Q.A.N.W. | Users List View</title>

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
                    List of all users
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
                                @foreach($data['headers'] as $header)
                                    <th id="{{ $header }}" class="column100 column1" data-column="column1">{{ $header }}</th>
                                @endforeach
                                <th id="edit" class="column100 column1" data-column="column1">Edit</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($data['rows'] as $row)
                                <tr id="{{ $row['id'] }}">
                                    @foreach($row as $key => $value)
                                        @if($key !== 'created_at' && $key !== 'updated_at')
                                            <td>{{ $value }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <a href="{{route('user_edit_view', ['id' => $row['id']])}}" class="underline text-gray-900 dark:text-white">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
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
