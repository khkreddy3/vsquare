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
              <h1 class="text-white">Welcome to Invoice</h1>
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
                         <div class="table-responsive py-4 ">
            <div class="row card-body">
                <div class="col-lg-4 col-12">
                    <form>

                        <div class="form-group">
                            <label class="form-control-label" for="weekselectincc">Week select</label>
                            <select class="form-control" id="weekselectincc" name="weekselectincc">
                                
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="input-daterange datepicker row align-items-center">
                        <div class="col">
                            <div class="form-group">
                              <label class="form-control-label">Start date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Start date" id='startdate' type="text" value="Start Date">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                              <label class="form-control-label">End date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="End date" id='enddate' type="text" value="End Date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <table class="table align-items-center table-flush" id="datatable-basic">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort" data-sort="sno">S.No</th>
                    <th scope="col" class="sort" data-sort="name">Customer Name</th>
                    <th scope="col" class="sort" data-sort="invest">Amount</th>
                    <th scope="col" class="sort" data-sort="refer">Day Interest</th>
                    <th scope="col" class="sort" data-sort="date">Day Reference </th>
                    <th scope="col" class="sort" data-sort="total">Total Interest</th>
                </tr>
            </thead>
            <tbody id="list">
             
           
            </tbody>
        </table>
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
        url: "{{ url('getuserdatefromto') }}",
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
        url: "{{ url('getuserdatefromtoarray') }}",
        type:'POST',
        // data: new FormData(this),
        data: {_token:_token, week:did},
        success: function(data) {
          console.log(data);
        //   $('#datatable-basic tbody').html(data);
          // $('#enddate').val(data.week_end);
          // if(data == 'success'){
            // $('#row_'+did).css('display','none');
          // }
           $('#list').html(data);
        }
      });
    
    });
  });

 
</script>


<script>
  $(document).ready(function() {
    $.ajax({
        url: "{{ url('getuserdatabyweeklist') }}",
        type:'get',
        // data: new FormData(this),
        // data: {_token:_token, week:did},
        success: function(data) {
          console.log(data);
          $('#weekselectincc').html(data);
          // $('#enddate').val(data.week_end);
          // if(data == 'success'){
            // $('#row_'+did).css('display','none');
          // }
        //   $('#list').html(data);
        }
      });
  });
  
  </script>
@endsection