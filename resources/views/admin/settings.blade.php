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
                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="#" class="btn btn-sm btn-neutral"></a> -->
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
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">    
                        <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">Settings</h3>
                            </div>
                            <div class="col-4 text-right">
                            <!-- <a href="#" class="btn btn-sm btn-primary">Edit Profile</a> -->
                            </div>
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <div class="row align-items-center py-4">
                                            <div class="col-lg-6 col-7">
                                                <h3 class="mb-0">Application Details</h3>
                                            </div>
                                            <div class="col-lg-6 col-5 text-right">
                                                <button type="button" class="btn  btn-default  text-right" id="setapps" data-toggle="modal" data-target="#setapp">Edit App Data</button>
                                                <div class="modal fade" id="setapp" tabindex="-1" role="dialog" aria-labelledby="setapp" aria-hidden="true">
                                                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card bg-secondary border-0 mb-0">
                                                                    <div class="card-header bg-transparent pb-1">
                                                                        <div class="text-muted text-center mt-2 mb-3"><h3>Application Name</h3></div>
                                                                    
                                                                    </div>
                                                                    <div class="card-body px-lg-5 py-lg-5 text-left">
                                                                    
                                                                    <form role="form" action="{{ route('admin.settings.updateapplication') }}" method="POST"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="card-body">
                                                                                <div class="col-lg-12">
                                                                                    <div class="card-wrapper">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="form-control-label">App Name</label>
                                                                                                    <input id="appname" type="appname" class="form-control @error('appname') is-invalid @enderror" name="appname" value="{{ $settings->appname }}"  >

                                                                                                        @error('appname')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="form-control-label">App Logo</label>
                                                                                                    <input type="file" name="applogo"  class="custom-file-input" value="{{ $settings->applogo }}">
                                                                                                        @error('applogo')
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
                                                                            <div class="text-center">
                                                                                <button type="submit" class="btn btn-primary my-4">Update Interest</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="card-wrapper">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">App Name</label>
                                                            <input id="appname" type="text" class="form-control" name="appname" value="{{ $settings->appname }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label">App Logo</label>
                                                            <img src="{{ url($settings->applogo) }}" width="100px"class="btn-secondary" />
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>                                   
                        </div>
                        <div class="card-body">
                            <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <div class="row align-items-center py-4">
                                            <div class="col-lg-6 col-7">
                                                <h3 class="mb-0">User Id TEXT</h3>
                                            </div>
                                            <div class="col-lg-6 col-5 text-right">
                                                <button type="button" class="btn  btn-default  text-right" id="setids" data-toggle="modal" data-target="#setid">Edit User ID TEXT</button>
                                                <div class="modal fade" id="setid" tabindex="-1" role="dialog" aria-labelledby="setid" aria-hidden="true">
                                                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card bg-secondary border-0 mb-0">
                                                                    <div class="card-header bg-transparent pb-1">
                                                                        <div class="text-muted text-center mt-2 mb-3"><h3>Edit User TEXT</h3></div>
                                                                    
                                                                    </div>
                                                                    <div class="card-body px-lg-5 py-lg-5  text-left">
                                                                    
                                                                    <form role="form" action="{{ route('admin.settings.setuserid') }}" method="POST"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="card-body">
                                                                                <div class="col-lg-12">
                                                                                    <div class="card-wrapper">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="form-control-label">Interest</label>
                                                                                                    <input id="setuserid" type="setuserid" class="form-control @error('setuserid') is-invalid @enderror" name="setuserid" value="{{ $settings->setuserid }}"  >

                                                                                                        @error('setuserid')
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
                                                                            <div class="text-center">
                                                                                <button type="submit" class="btn btn-primary my-4">Update Interest</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="card-wrapper">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Interest</label>
                                                            <input id="setuserid" type="text" class="form-control" name="setuserid" value="{{ $settings->setuserid }}" disabled>
                                                        </div>
                                                    </div>
                                                    
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>                                   
                        </div>
                        <div class="card-body">
                            <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <div class="row align-items-center py-4">
                                            <div class="col-lg-6 col-7">
                                                <h3 class="mb-0">Interest Details</h3>
                                            </div>
                                            <div class="col-lg-6 col-5 text-right">
                                                <button type="button" class="btn  btn-default  text-right" id="setinterests" data-toggle="modal" data-target="#setinterest">Edit Interest</button>
                                                <div class="modal fade" id="setinterest" tabindex="-1" role="dialog" aria-labelledby="setinterest" aria-hidden="true">
                                                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card bg-secondary border-0 mb-0">
                                                                    <div class="card-header bg-transparent pb-1">
                                                                        <div class="text-muted text-center mt-2 mb-3"><h3>Edit Interest</h3></div>
                                                                    
                                                                    </div>
                                                                    <div class="card-body px-lg-5 py-lg-5  text-left">
                                                                    
                                                                    <form role="form" action="{{ route('admin.settings.updateinterest') }}" method="POST"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="card-body">
                                                                                <div class="col-lg-12">
                                                                                    <div class="card-wrapper">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="form-control-label">Interest</label>
                                                                                                    <input id="interests" type="interests" class="form-control @error('interests') is-invalid @enderror" name="interests" value="{{ $settings->interests }}"  >

                                                                                                        @error('interests')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="form-control-label">Referal Interest</label>
                                                                                                    <input id="referalinterests" type="referalinterests" class="form-control @error('referalinterests') is-invalid @enderror" name="referalinterests" value="{{ $settings->referalinterests }}"  >

                                                                                                        @error('referalinterests')
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
                                                                            <div class="text-center">
                                                                                <button type="submit" class="btn btn-primary my-4">Update Interest</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="card-wrapper">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Interest</label>
                                                            <input id="interests" type="text" class="form-control" name="interests" value="{{ $settings->interests }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Referal Interest</label>
                                                            <input id="name" type="referalinterests" class="form-control" name="referalinterests" value="{{ $settings->referalinterests }}" disabled >
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