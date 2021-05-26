<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="margin: auto;">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Q.A.N.W. | Albums List View</title>

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

	<div class="limiter" style="margin: auto;">
		<div class="container-table100" style="margin: auto;">
			<div class="wrap-table100" style="width:700px; margin: auto;">
                <div class="html h3" data-column="column1">
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
                    List of all albums
                </div>
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
                                @foreach($data['headers'] as $header)
                                    <th id="{{ $header }}" class="column100 column1" data-column="column1">{{ $header }}</th>
                                @endforeach
							</tr>
						</thead>
						<tbody>
                            @foreach($albums as $album)
                                <tr id="{{ $album->id }}" class="border border-dark">
                                    <td>{{ $album->id }}</td>
                                    <td>{{ $album->title }}</td>
                                </tr>
                            @endforeach
						</tbody>
					</table>
                    <div style="margin-left:200px;">
                        {{ $albums->links() }}
                    </div>
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
