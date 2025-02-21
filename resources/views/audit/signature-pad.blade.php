<html>



<head>



    <title> Signature Pad for Auditor</title>



   



    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">    



    



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>     



    



    <!-- <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css"> -->



    



    <style>



        .kbw-signature { width: 100%; height: 200px;}



        #sig canvas{ width: 100% !important; height: 200px;}



    </style>  



</head>



<body>



<div class="container">



   <div class="row">



       <div class="col-md-8 offset-md-3 mt-5">



        {{-- resume-audit?auditId=60&cid=38 --}}



        <a href="{{ url('') }}/resume-audit?auditId={{ $audit_id }}&cid={{ $client_id }}" ><i class="fa-solid fa-arrow-left" id="autoClickButton"></i></a>



           <div class="card">



               <div class="card-header">



                   <h5>Draw auditor's signature below</h5>



               </div>



               <div class="card-body">



                    @if ($message = Session::get('success'))



                        <div class="alert alert-success  alert-dismissible">



                            <button type="button" class="close" data-dismiss="alert">×</button>  



                            <strong>{{ $message }}</strong>



                        </div>



                    @endif



                    <form method="POST" action="{{ route('signature_pad.store') }}">



                        @csrf







                        <input type="hidden" name="audit_id" value="{{ $audit_id }}">



                        <input type="hidden" name="client_id" value="{{ $client_id }}">







                        <div class="col-md-12">



                            <label class="" for="">Draw Signature:</label>



                            <br/>



                            <div id="sig"></div>



                            <br><br>



                            <button id="clear" class="btn btn-danger">Clear Signature</button>



                            <button class="btn btn-success">Save</button>



                            <textarea id="signature" name="signed" style="display: none"></textarea>



                        </div>



                    </form>



               </div>



           </div>



       </div>



   </div>



</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 







<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>







<!-- <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script> -->

<script type="text/javascript" src="{{ url('') }}/js/signature.js"></script>





<script src="https://kit.fontawesome.com/5f579897f0.js" crossorigin="anonymous"></script>







<script type="text/javascript">



    var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});



    $('#clear').click(function(e) {



        e.preventDefault();



        sig.signature('clear');



        $("#signature").val('');



    });



</script>

<script>
     if ($('.alert-success').length > 0) {
        // Automatically click the button when the alert-success div is present
        $('#autoClickButton').click();
    }
</script>

</body>



</html>