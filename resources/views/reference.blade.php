@extends('layouts.app')

@section('content')
<div class="main-content internn">
    <!-- Header -->
    <div class="header bg-gradient-primary py-2 py-lg-3 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-1">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome to Reference</h1>
              <!-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- Page content -->
    <div class="container mt--10 pb-5">
      <div class="row justify-content-center">
      <table class="table align-items-center table-flush">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort" data-sort="sno">S.No</th>
                    <th scope="col" class="sort" data-sort="name">Customer Name</th>
                    <th scope="col" class="sort" data-sort="invest">Product Amount</th>
                    <!-- <th scope="col" class="sort" data-sort="refer">Reference</th> -->
                    <th scope="col" class="sort" data-sort="date">Date</th>
                    <!-- <th scope="col">Action</th> -->
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
                    <!-- <td class="refer">
                          <div class="align-items-center">
                            <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#referal-notification{{ $user->id }}">
                                No: {{  $user->referrals->count() }}
                            </button>
                          </div>

                          
                          <div class="modal fade" id="referal-notification{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="referal-notification" aria-hidden="true">
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
                                            <th scope="col" class="sort" data-sort="refer">Reference</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($user->referrals as $userdata)
                                        <tr>
                                            <td class="sno">
                                                <div class="align-items-center">
                                               {{ $userdata->memid }}
                                                </div>
                                            </td>
                                            <td class="name">
                                               {{ $userdata->name }}
                                            </td>
                                            <td class="refer">
                                                  <div class="align-items-center">
                                                  {{ $userdata->referrals->count() }}
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
                    </td> -->
                    <td class="date">
                        <div class="align-items-center">
                        {{ $user->joindate }}
                        </div>
                    </td>
                    <!-- <td class="View">
                        <div class="align-items-center">
                            
                                <a class="btn btn-primary btn-lg active" href="{{ route('view', Crypt::encryptString($user->id)) }}">View</a>
                        </div>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
