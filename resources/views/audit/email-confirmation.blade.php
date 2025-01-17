<html>
<head>
    <title>Email confirmation page</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>     
    
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{ width: 100% !important; height: auto;}
    </style>  
</head>
<body>
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8 mt-5">
        

           <div class="card">
            <div class="card-body text-center">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!} </li>
                    </ul>
                </div>
                @endif
                @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('error') !!} </li>
                    </ul>
                </div>
                @endif

                <h3 class="text-success">Email sent successfully</h3>

                <a class="btn btn-sm btn-primary" href="{{ route('index') }}">Go back to main page</a>
            </div>
           </div>
       </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

<script src="https://kit.fontawesome.com/5f579897f0.js" crossorigin="anonymous"></script>



</body>
</html>