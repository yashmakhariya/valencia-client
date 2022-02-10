<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('images/logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('images/logo.png') }}">

    {{-- Sweet Alerts --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Push Js --}}
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js" integrity="sha512-DjIQO7OxE8rKQrBLpVCk60Zu0mcFfNx2nVduB96yk5HS/poYZAkYu5fxpwXj3iet91Ezqq2TNN6cJh9Y5NtfWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/serviceWorker.min.js" integrity="sha512-gZN7SatPzB7LiGjOd4Sree/ecjktoLPgWt22wfApKrzuCpS9KsK7uKEDB+AAGY96NHCW1sAEm1JdaHDDP4MsIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Admin Panel | {{env('APP_NAME')}} </title>

    <!-- Custom fonts for this template-->
    <link href="{{url('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('admin-assets/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{url('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    {{-- Datatables Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

</head>
