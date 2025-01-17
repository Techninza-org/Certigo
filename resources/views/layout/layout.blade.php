<!DOCTYPE html>



<html lang="en">







<head>



  <meta charset="utf-8">



  <meta name="viewport" content="width=device-width, initial-scale=1">



  <title>Certigo QAS</title>



  <link rel="shortcut icon" type="image/png" href="{{ url('') }}/images/certigoqas-logo.png">



  {{-- csrf token  --}}



  <meta name="csrf-token" content="{{ csrf_token() }}" />







  <script src="{{ url('') }}/js/dist-jquery.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css" integrity="sha512-EJp8vMVhYl7tBFE2rgNGb//drnr1+6XKMvTyamMS34YwOEFohhWkGq13tPWnK0FbjSS6D8YoA3n3bZmb3KiUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css" integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







  {{-- Custom stylesheet  --}}



  <link rel="stylesheet" href="{{ url('') }}/css/css-styles.min.css">



  {{-- Selectbox virtual  --}}



  <link rel="stylesheet" href="{{ url('') }}/css/virtual-select.min.css">



  



  {{-- Jquery  --}}



  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



  {{-- Toastr  --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">


  {{-- Multi select 2  --}}

<script src="https://kit.fontawesome.com/dcfe56b99f.js" crossorigin="anonymous"></script>

  {{-- bootstrap  --}}



  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}










{{-- <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css"> --}}

<link rel="stylesheet" href="{{ url('') }}/css/keith-wood.css">



{{-- <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script> --}}











<style>



  table.dataTable thead th, table.dataTable thead td {



    padding: 10px;



    border-bottom: 1px solid rgba(0, 0, 0, 0.3);



    font-size: smaller;



    color:#9f9f9f;



}







.modal{



  --bs-modal-width: 800px!important;



}







.form-label {



    margin-bottom: 0.5rem;



    font-weight: 600;



    color: #9b9b9b;



    font-size: small;



}



























</style>



  @stack('css')



</head>







<body>



  <!--  Body Wrapper -->



  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">



    <!-- Sidebar Start -->



    @include('layout.sidebar')



    <!--  Sidebar End -->



    <!--  Main wrapper -->



    <div class="body-wrapper" style="    background-color: #f5f6fc;">



      <!--  Header Start -->



    @include('layout.header')



      



      <!--  Header End -->



      <div class="container-fluid">



        <!--  Row 1 -->



        @yield('content')







        @include('layout.footer')



        



      </div>



    </div>



  </div>



  {{-- <script src="{{ url('') }}/js/js-bootstrap.bundle.min.js"></script> --}}



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>



  <script src="{{ url('') }}/js/js-sidebarmenu.js"></script>



  <script src="{{ url('') }}/js/js-app.min.js"></script>



  <script src="{{ url('') }}/js/custom.js"></script>




  <script>
    // Get the current year using JavaScript's Date object
    var currentYear = new Date().getFullYear();
    
    // Set the dynamic year inside the <span> tag
    document.getElementById("yearInFooter").innerHTML = currentYear;
</script>














  {{-- Select box virtual  --}}



  <script src="{{ url('') }}/js/virtual-select.min.js"></script>







  <script src="{{ url('') }}/assets/TinyMCE/tinymce/js/tinymce/tinymce.min.js"></script>







  {{-- <script src="{{ url('') }}/js/dist-apexcharts.min.js"></script> --}}



  {{-- <script src="{{ url('') }}/js/dist-simplebar.js"></script> --}}



  {{-- <script src="{{ url('') }}/js/js-dashboard.js"></script> --}}



  <script src="https://kit.fontawesome.com/5f579897f0.js" crossorigin="anonymous"></script>



  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



  
  
  
  {{-- Toastr  --}}
  
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
  
  
  {{-- multi select2  --}}
  
  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}













  <script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "toastClass": "toast-success",
    "timeOut": 4000, 
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "toastClass": "toast-error",
    "timeOut": 4000, 
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "toastClass": "toast-info",
    "timeOut": 4000, 
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "toastClass": "toast-warning",
    "timeOut": 4000, 
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>











  



  @stack('js')



</body>







</html>



