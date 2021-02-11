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
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-neutral">New Member</a>

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
            
          <div class="table-responsive py-4">
            <div>
        <table class="table align-items-center table-flush"   id="datatable-basic">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort" data-sort="sno">S.No</th>
                    <th scope="col" class="sort" data-sort="name">Customer Name</th>
                    <th scope="col" class="sort" data-sort="invest">Product Amount</th>
                    <th scope="col" class="sort" data-sort="refer">Reference</th>
                    <th scope="col">Action</th>
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
                          <span class="invest">  {{ $user->amountdetails }}</span>
                        </span>
                    </td> 
                    <td class="refer">
                          <div class="align-items-center">
                          <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#referal-notification{{ $user->id }}">
                              No: {{  $user->referrals->count() }}
                          </button>
                          </div>

                          <!-- Modal -->
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
                                            <th scope="col">Action</th>
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
                                          
                                            <td class="View">
                                                <div class="align-items-center">
                                                    
                                                        <a class="dropdown-item" href="{{ route('admin.users.view', $userdata->id) }}">View</a>
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
                   
                    <td class="View">
                        <div class="align-items-center">
                            
                                <a class="btn btn-primary btn-lg active" href="{{ route('admin.users.view', $user->id) }}">View</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    </div>







          </div>
        </div>
      </div>

@endsection