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
              <a href="{{route('admin.users.index')}}" class="btn btn-sm btn-neutral">All Member</a>
              <!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
         
        </div>
      </div>
    </div>
 <!-- Page content -->

 @if ($message = Session::get('success'))

        <div  class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-warning" role="alert">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
  @endif
 <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
            
       
            <form action="{{ route('admin.users.submitdetails',$user->id) }}" method="POST" enctype="multipart/form-data">	
                @csrf
                @method('PATCH')
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
                                                <label class="form-control-label">Member ID</label>
                                                <input id="memid" type="text" class="form-control" name="memid" value="{{ $user->memid }}" required >
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Name</label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required >
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Referal ID</label>
                                                <input id="referalid" type="text" class="form-control" name="referalid" value="{{ $user->referalid }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Email ID</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  >
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
                                                <input id="aadharno" type="text" class="form-control @error('aadharno') is-invalid @enderror" name="aadharno" value="{{ $user->aadharno }}"  >

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
                                                <input id="panno" type="text" class="form-control @error('panno') is-invalid @enderror" name="panno" value="{{ $user->panno }}"  >

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
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}"  >

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
                                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}"  >

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
                                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $user->state }}"  >

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
                                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ $user->pincode }}"  >

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
                                                <input id="mobile" type="number"  class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $user->mobile }}"  >

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
                                                <select class="form-control" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}"  >
                                                    <option  value="">Select Gender</option>    
                                                    <option  value="Male">Male</option>
                                                    <option  value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
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
                                                <input id="dob example-date-input" class="form-control" type="date"  class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $user->dob }}"  >

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
                                                <input id="accno" type="text" class="form-control @error('accno') is-invalid @enderror" name="accno" value="{{ $user->accno }}"  >

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
                                                <input id="bankname" type="text" class="form-control @error('bankname') is-invalid @enderror" name="bankname" value="{{ $user->bankname }}"  >

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
                                                <input id="ifsccode" type="text" class="form-control @error('ifsccode') is-invalid @enderror" name="ifsccode" value="{{ $user->ifsccode }}"  >

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
                                                <input id="amount" type="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $user->amount }}"  >

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
                                                <select id="paymentrechargetype" class="form-control @error('paymentrechargetype') is-invalid @enderror" name="paymentrechargetype" value="{{ $user->paymentrechargetype }}"  >
                                                    <option value="">Select Payment Type</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Google Pay">Google Pay</option>
                                                    <option value="Phone Pay">Phone Pay</option>
                                                    <option value="Bank">Bank</option>
                                                </select>
                                                    @error('paymentrechargetype')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Transaction ID</label>
                                                <input id="payrechargerecpt" type="text" class="form-control @error('payrechargerecpt') is-invalid @enderror" name="payrechargerecpt" value="{{ $user->payrechargerecpt }}"  >
                                                        @error('payrechargerecpt')
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
                            <h3 class="mb-0">Identity Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="card-wrapper">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Profile Photo</label>
                                                <input type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" id="profile"  value="{{ $user->profile }}" lang="en">


                                                @error('profile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Join Date</label>
                                                <input id="joindate example-date-input" class="form-control" type="date" class="form-control @error('joindate') is-invalid @enderror" name="joindate" value="{{ $user->joindate }}"  >

                                                @error('joindate')
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
                    
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="card-wrapper">
                                    <div class="row">

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    Update User Data
                                                </button>
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

@endsection