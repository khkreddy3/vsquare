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
            
            <div>
        <div class="table-responsive py-4">
          <table class="table table-flush"  id="datatable-buttons">
            <thead class="thead-dark">
                <tr>
                    <th>S.No</th>
                    <th>Customer Name</th>
                    <th>Product Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                      <th>S.No</th>
                      <th>Customer Name</th>
                      <th>Product Amount</th>
                      <th>Date</th>
                      <th>Action</th>
              </tr>
            </tfoot>
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
                          <span class="invest"> {{ $user->amount }}</span>
                        </span>
                    </td>
                   
                    <td class="date">
                        <div class="align-items-center">
                        {{ $user->joindate }}
                        </div>
                    </td>
                    <td class="View">
                        <form role="form" action="{{ route('admin.withdraw.withdrawaccept', $user->id) }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                        <div class="align-items-center">
                            <button type="submit" class="btn btn-primary my-4">Payment Withdraw Accept</button>
                        </div>
                    </form>
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