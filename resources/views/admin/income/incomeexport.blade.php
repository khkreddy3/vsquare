@extends('admin.layout.mainlayout')
@section('content')
 <!-- Header -->
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Income</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!--<a href="#" class="btn btn-sm btn-neutral">Export</a>-->
              <!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
         
        </div>
      </div>
    </div>
<!-- Page content -->
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
            
          <div class="table-responsive py-4 ">
            <div class="row card-body">
                 <div class="col-lg-3 col-12">
                    <form>
                        <!--incomeexport.blade.php-->

                        <div class="form-group">
                            <label class="form-control-label" for="weekselectincc">Select Report Time</label>
                            <select class="form-control" id="selectreporttype" name="monthselectincc">
                              <option value="">--Select type--</option>
                               <option value="month">Month</option>
                               <option value="week">Week</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-12">
                    <form>

                        <div class="form-group">
                            <label class="form-control-label" for="weekselectincc">Select</label>
                            <select class="form-control" id="monthselectincc" name="monthselectincc" >   
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
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
            <a href="/admin/export" id="generatePdfincome" class="wt-btn" style="display:none">download</a>
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
            <tbody id="income-table" class="list">
             
            </tbody>
        </table>
    </div>


          </div>
        </div>
      </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
  <script type="text/javascript">
  $(function () { 
    
    
    $('#monthselectincc').on('change', function (e) {
    var did = $('#monthselectincc').val();
    var _token = $("input[name='_token']").val();
    if ( (did+"").match(/^\d+$/) ) {
       $.ajax({
        url: "{{ url('admin/getdatefromto') }}",
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
    }else{
    // alert(did);
    $.ajax({
        url: "{{ url('admin/getmonthfromto') }}",
        type:'POST',
        // data: new FormData(this),
        data: {_token:_token, month:did},
        success: function(data) {
          console.log(data);
          $('#startdate').val(data.start);
          $('#enddate').val(data.end);
          // if(data == 'success'){
            // $('#row_'+did).css('display','none');
          // }
        }
      });
  }

    
    });
  });

 
</script>

<script type="text/javascript">
  $(function () { 
    
    
    $('#monthselectincc').on('change', function (e) {
    var did = $('#monthselectincc').val();
    var _token = $("input[name='_token']").val();
    // alert(did);
    if ( (did+"").match(/^\d+$/) ) {
      $.ajax({
        url: "{{ url('admin/getdatefromtoarray') }}",
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
    }else{
      $.ajax({
        url: "{{ url('admin/getmonthfromtoarray') }}",
        type:'POST',
        // data: new FormData(this),
        data: {_token:_token, month:did},
        success: function(data) {
          console.log(data);
          document.getElementById("generatePdfincome").style.display="block";
          $('#datatable-basic tbody').html(data);

        }
      }); 
    }
    });
  });

 
</script>


<script>
  $(document).ready(function() {
    $.ajax({
        url: "{{ url('admin/getdatabyweeklist') }}",
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
        }
      });
  });
  
  </script>

  <script>
  $(function () { 
    
    
    $('#selectreporttype').on('change', function (e) {
    var type = $('#selectreporttype').val();
    var _token = $("input[name='_token']").val();
    // alert(did);
    $.ajax({
        url: "{{ url('admin/getreporttype') }}",
        type:'POST',
        // data: new FormData(this),
        data: {_token:_token, type:type},
        success: function(res) {
          if(res.type == 'week'){
          // document.getElementById("monthselectincc").style.display="block";
          console.log(res);
          $('#monthselectincc').html(res.data);
        }else{
         // document.getElementById("monthselectincc").style.display="block";
          console.log(res);
          $('#monthselectincc').html(res.data); 
        }
        }
      });

    
    });
  });
  </script>

    <script>
 // $('#generatePdfincome').on('change', function (e) {
  function generatePdfincome() {
    var start = $('#startdate').val();
    var end = $('#enddate').val();
    var _token = $("input[name='_token']").val();
    alert(start);
    // $.ajax({
    //     url: "{{ url('admin/getreporttype') }}",
    //     type:'POST',
    //     // data: new FormData(this),
    //     data: {_token:_token, type:type},
    //     success: function(res) {
    //       if(res.type == 'week'){
    //       // document.getElementById("monthselectincc").style.display="block";
    //       console.log(res);
    //       $('#monthselectincc').html(res.data);
    //     }else{
    //      // document.getElementById("monthselectincc").style.display="block";
    //       console.log(res);
    //       $('#monthselectincc').html(res.data); 
    //     }
    //     }
    //   });

    
    }
  </script>
@endsection