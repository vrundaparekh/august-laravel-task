<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Movie</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="{{url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/dmuy/duDatepicker/dist/duDatepicker.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/dmuy/duDatepicker/dist/duDatepicker.js"></script>  
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<style>
    .error{
        font-size: 12px;
        color: #ff0000;
    }
</style>
</head>

<body id="page-top">
   
    <!-- Page Wrapper -->
    <div id="wrapper">

      
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    Front Panel

                    <!-- Topbar Search -->
                    
                   

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{{ url('assets/js/jquery-easing/jquery.easing.min.js') }}"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>
    
    <!-- Core plugin JavaScript-->
    
    <!-- Custom scripts for all pages-->

    <!-- Page level plugins -->
    <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('assets/js/datatables-demo.js') }}"></script>
    <script src="{{ url('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>

    @yield('script')
</body>

</html>