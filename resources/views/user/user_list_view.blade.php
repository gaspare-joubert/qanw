<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Q.A.N.W. | Users List View</title>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
                <div class="html h3" data-column="column1">
                    List of all users
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
                                        {{--<svg id="edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit" width="20">
                                            <g>
                                                <a xlink:href="{{}}" class="underline text-gray-900 dark:text-white">Edit<path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                                                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/></a>
                                            </g>
                                        </svg>--}}
                                        <a href="" class="underline text-gray-900 dark:text-white">Edit</a>
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
    <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../vendor/bootstrap/js/popper.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../js/main.js"></script>

</body>
</html>
