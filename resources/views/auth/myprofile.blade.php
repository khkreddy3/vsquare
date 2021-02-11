@extends('layouts.app')

@section('content')
<div class="main-content internn">
    <!-- Header -->
    <div class="header bg-gradient-primary py-2 py-lg-3 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-1">
          <div class="row justify-content-center" >
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- Page content --> 
    <div class="container mt-6" >
      <div class="row justify-content-center">
      <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="public/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ $user->profile }}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                        <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                    </div>
                    <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                        
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">
                        {{ $user->name }}<span class="font-weight-light"></span>
                        </h5>
                        <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i>{{ $user->city }}, {{ $user->state }}
                        </div>
                        <div class="h5 mt-4">
                        <i class="fa fa-rupee"></i>{{ $user->amountdetails }}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card card-profile">
                    <div class="row justify-content-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <h3>Payment Details</h3>
                            <div class="table-responsive" style="width: 88%;">
                                <table class="table table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    @foreach($user->paidamount as $users)
                                        <tr>
                                        
                                            <td>{{ $users->amount }}</td>
                                            <td>{{ $users->paid_date }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-xl-8 order-xl-1">
                <div class="card">    
                    <div class="card-header">
                        <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">View profile </h3>
                                </div>
                                <div class="col-4 text-right">
                                    <!-- <a href="#" class="btn btn-sm btn-primary">Edit Profile</a> -->
                                </div>
                        </div>
                    </div>
                    <div class="status-buttons" style="text-align:center">
                    <?php
                    $sss= $user->paidamount->first();
                    // print_r($sss->beforestatus);exit;
                 if( $sss->beforestatus == '1' and $sss->status == '1' ){
                //  if(is_null( $user->beforestatus  == '1')){
                 ?> 
                 <button type="button" class="btn  btn-default" id="payemtreccccs" data-toggle="modal" data-target="#payemtrecccc">WithDraw</button>
                        <div class="modal fade" id="payemtrecccc" tabindex="-1" role="dialog" aria-labelledby="payemtrecccc" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card bg-secondary border-0 mb-0">
                                            <div class="card-header bg-transparent pb-1">
                                                <div class="text-muted text-center mt-2 mb-3"><h3>With Draw Request</h3></div>
                                            
                                            </div>
                                            <div class="card-body px-lg-0 py-lg-1">
                                            
                                            <form role="form" action="{{ route('admin.withdrawaccept', $user->id) }}" method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="card-body">
                                                        <div class="col-lg-12">
                                                            <div class="card-wrapper">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="text-center">
                                                                        
                                                                        <table class="table table-flush">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th>Select</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Date</th>
                                                                                </tr>
                                                                            </thead>
                                                                        
                                                                            <tbody>
                                                                                
                                                                                @foreach( $user->paidamount as $users )
                                                                                    <tr>
                                                                                        <td><input type="checkbox"  id="withdraw-{{ $users->id }}" name="withdraw[]" value="{{ $users->id }}"></td>
                                                                                        <td> <label>{{  $users->amount }}</label></td>
                                                                                        <td> <label>{{ $users->paid_date }}</label></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="text-center">
                                                                            <button type="submit" class="btn btn-primary my-4">WithDraw</button>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                                                
                <?php 
                }else {
                    echo "<p style='color:red;text-align:center;font-weight:600;'>You Have Already Requested for With-Draw, Admin will contact you Soon</p>";
                }
                ?>
                </div>
                    <div class="card-body">
                        <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Member ID</label>
                                                        <input id="memid" type="text" class="form-control" name="memid" value="{{ $user->memid }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Name</label>
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled >
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Referal ID</label>
                                                        <input id="referalid" type="text" class="form-control" name="referalid" value="{{ $user->referalid }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Email ID</label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Identity Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Aadhar ID</label>
                                                        <input id="aadharno" type="text" class="form-control @error('aadharno') is-invalid @enderror" name="aadharno" value="{{ $user->aadharno }}"  disabled>
                    
                                                        @error('aadharno')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Pancard No</label>
                                                        <input id="panno" type="text" class="form-control @error('panno') is-invalid @enderror" name="panno" value="{{ $user->panno }}"  disabled>
                    
                                                        @error('panno')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Address</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">H.No/Street/Area</label>
                                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}"  disabled>
                    
                                                            @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                    
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">City</label>
                                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}"  disabled>
                    
                                                            @error('city')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">State</label>
                                                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $user->state }}" disabled >
                    
                                                        @error('state')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Pincode</label>
                                                        <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ $user->pincode }}"  disabled>
                    
                                                        @error('pincode')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Mobile No</label>
                                                        <input id="mobile" type="number"  class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $user->mobile }}"  disabled>
                    
                                                            @error('mobile')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Gender</label>
                                                           <input id="gender" class="form-control" type="text"  class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}"  disabled>

                                                            @error('gender')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Date Of Birth</label>
                                                        <input id="dob" class="form-control" type="date"  class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $user->dob }}"  disabled>
                    
                                                            @error('dob')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Bank Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Account Number</label>
                                                        <input id="accno" type="text" class="form-control @error('accno') is-invalid @enderror" name="accno" value="{{ $user->accno }}"  disabled>
                    
                                                            @error('accno')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Bank Name</label>
                                                        <input id="bankname" type="text" class="form-control @error('bankname') is-invalid @enderror" name="bankname" value="{{ $user->bankname }}"  disabled>
                    
                                                            @error('bankname')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">IFSC Code</label>
                                                        <input id="ifsccode" type="text" class="form-control @error('ifsccode') is-invalid @enderror" name="ifsccode" value="{{ $user->ifsccode }}"  disabled>
                    
                                                            @error('ifsccode')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Payment Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Amount</label>
                                                        <input id="amount" type="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $user->amount }}"  disabled>
                    
                                                            @error('amount')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Payment Type</label>
                                                        <select id="paymenttype" class="form-control @error('paymenttype') is-invalid @enderror" name="paymenttype" value="{{ $user->paymenttype }}"  disabled>
                                                            <option value="">Select Payment Type</option>
                                                            <option value="Cash">Cash</option>
                                                            <option value="Google Pay">Google Pay</option>
                                                            <option value="Phone Pay">Phone Pay</option>
                                                            <option value="Bank">Bank</option>
                                                        </select>
                                                            @error('paymenttype')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Transaction ID</label>
                                                        <input id="payrecpt" type="text" class="form-control @error('payrecpt') is-invalid @enderror" name="payrecpt" value="{{ $user->payrecpt }}" disabled >
                                                                @error('payrecpt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
