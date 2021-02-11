@extends('layouts.app')
@section('content')
 <!-- Header -->
<div class="main-content internn">
    <!-- Header -->
    <div class="header bg-gradient-primary py-2 py-lg-3 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-1">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome to Income</h1>
              <!-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
            </div>
          </div>
        </div>
      </div>
      
    </div>
     
     
<!-- Page content -->
    <div class="card-body">
        <div class="card">
            <div class="container  mt--10 pb-5">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-header bg-transparent">
                              <h3 class="mb-0">Interest</h3>
                            </div>
                            <div class="card-body" id="weekselectincc">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-header bg-transparent">
                              <h3 class="mb-0">Referal Interest</h3>
                            </div>
                            <div class="card-body"  id="weekselectinccrefer">
                              
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
      <script type="text/javascript">
  $(function () { 
    
    
    $('#weekselectincc').on('change', function (e) {
    var did = $('#weekselectincc').val();
    var _token = $("input[name='_token']").val();
    // alert(did);
    $.ajax({
        url: "{{ url('getdatefromto') }}",
        type:'POST',
        // data: new FormData(this),
        data: {_token:_token, week:did},
        success: function(data) {
          console.log(data);
          $('#startdate').val(data.week_start);
          $('#enddate').val(data.week_end);
          // if(data == 'success'){
            // $('#row_'+did).css('display','none');
          // }
        }
      });

    
    });
  });

 
</script>

<script type="text/javascript">
  $(function () { 
    
    
    $('#weekselectincc').on('change', function (e) {
    var did = $('#weekselectincc').val();
    var _token = $("input[name='_token']").val();
    // alert(did);
    
      $.ajax({
        url: "{{ url('getdatefromtoarray') }}",
        type:'POST',
        // data: new FormData(this),
        data: {_token:_token, week:did},
        success: function(data) {
          console.log(data);
          $('#datatable-basic tbody').html(data);
          // $('#enddate').val(data.week_end);
          // if(data == 'success'){
            // $('#row_'+did).css('display','none');
          // }
        }
      });
    
    });
  });

 
</script>     
<script>
  $(document).ready(function() {
    $.ajax({
        url: "{{ url('getdatabyweeklist') }}",
        type:'get',
        success: function(data) {
          console.log(data);
          $('#weekselectincc').html(data);
        }
      });
  });

  $(document).ready(function() {

      $.ajax({
        url: "{{ url('get-databy-weeklistrefer') }}",
        type:'get',
        success: function(data) {
          console.log(data);
          $('#weekselectinccrefer').html(data);
        }
      });
  });
  
  </script>
@endsection