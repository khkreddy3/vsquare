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
              <a href="/admin/incomeexport" class="btn btn-sm btn-neutral">Export</a>
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
                <div class="col-lg-6 col-5">
                    <form>

                        <div class="form-group">
                            <label class="form-control-label" for="weekselectincc">Week select</label>
                            <select class="form-control" id="weekselectincc" name="weekselectincc">
                                
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-6">
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
            <tbody class="list">
             
            @foreach($users as $user)
                <tr>
                    <td class="sno">
                        <div class="align-items-center">
                           {{ $user->memid }}
                        </div>
                    </td>
                    <td class="name">
                          {{ $user->name }}
                    </td>
                    <td class="invest">
                        <span class="badge badge-dot mr-4">
                          <i class="fa fa-rupee"></i>
                          <span class="invest"> {{ $user->amountdetails }}</span>
                        </span>
                    </td> 
              
                    <td class="refer"> 
                      <span class="badge badge-dot mr-4">
                            <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#referalintr{{ $user->id }}">
                                 <i class="fa fa-rupee"></i>
                                 <span class="invest"> {{ $user->intrest }}</span>
                            </button>
                          
                        </span>
                                              <!-- Modal -->
                      <div class="modal fade" id="referalintr{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="referal-notification" aria-hidden="true">
                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-notification">Day Interest for {{ $user->name }}</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <table class="table align-items-center">
                                    <thead class="thead-dark">
                                        <tr>
                                          <th scope="col" class="sort" data-sort="sno">S.No</th>
                                          <th scope="col" class="sort" data-sort="name">Customer Name</th>
                                          <th scope="col" class="sort" data-sort="refer">Total Amount</th>
                                          <th scope="col" class="sort" data-sort="date">Date</th>
                                          <th scope="col">Day Interest</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($user->interestdata as $useridata)
                                        <tr>
                                          <td class="sno">
                                              <div class="align-items-center">
                                                {{ $useridata->memid }}
                                              </div>
                                          </td>
                                          <td class="name">
                                              {{ $useridata->userdata->name }}
                                          </td>
                                          <td class="refer">
                                              <div class="align-items-center">
                                                {{ $useridata->userdata->amount }} 
                                              </div>
                                          </td>
                                          <td class="refer">
                                              <div class="align-items-center">
                                                {{ $useridata->date }}
                                              </div>
                                          </td>
                                          <td class="View">
                                              <div class="align-items-center">
                                                {{ $useridata->dayinterest }}
                                              </div>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </div>
                      </div>
                    </td>
                    <td class="date"> 
                      <span class="badge badge-dot mr-4">
                            <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#referation{{ $user->id }}">
                                <i class="fa fa-rupee"></i>
                                <span class="invest"> {{ $user->referalsum }}</span>
                            </button>
                        </span>
                                              <!-- Modal -->
                      <div class="modal fade" id="referation{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="referal-notification" aria-hidden="true">
                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-notification">Reference By {{ $user->name }}</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <table class="table align-items-center">
                                    <thead class="thead-dark">
                                        <tr>
                                          <th scope="col" class="sort" data-sort="sno">S.No</th>
                                          <th scope="col" class="sort" data-sort="name">Customer Name</th>
                                          <th scope="col" class="sort" data-sort="refer">Total Amount</th>
                                          <th scope="col" class="sort" data-sort="date">Date</th>
                                          <th scope="col">Day Interest</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                      
                                        @foreach($user->referralintrest as $userdata)
                                        <tr>
                                          <td class="sno">
                                              <div class="align-items-center">
                                                {{ $userdata->memid }}
                                              </div>
                                          </td>
                                          <td class="name">
                                              {{ $userdata->userdata->name }}
                                          </td>
                                          <td class="refer">
                                              <div class="align-items-center">
                                                {{ $userdata->userdata->amount }}
                                              </div>
                                          </td>
                                          <td class="refer">
                                              <div class="align-items-center">
                                                {{ $userdata->date }}
                                              </div>
                                          </td>
                                          <td class="View">
                                          <div class="align-items-center">
                                                {{ $userdata->dayrefinterest }}
                                              </div>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </div>
                      </div>
                    </td>
                    <td class="total"> 
                      <span class="badge badge-dot mr-4">
                          <i class="fa fa-rupee"></i>
                          <span class="invest"> {{ $user->intrest + $user->referalsum  }}</span>
                        </span>
                    </td>
                
              </tr>
              @endforeach
            </tbody>
        </table>
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
@endsection