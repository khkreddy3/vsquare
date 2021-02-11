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
                  <li class="breadcrumb-item"><a href="#">Create Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">Hello Member</a>
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
         
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
   <!-- Form groups used in grid -->
   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label class="form-control-label" for="example3cols1Input">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label class="form-control-label" for="example3cols2Input">Mobile No</label>
            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                          @error('mobile')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
         </div>
      </div>
      
      <div class="col-md-4">
         <div class="form-group">
            <label class="form-control-label" for="example4cols1Input">Referal ID</label>
            <!--<input id="referalid" type="text" class="form-control @error('referalid') is-invalid @enderror" name="referalid" value="{{ old('referalid') }}" required autocomplete="referalid" autofocus>-->
            <select name="referalid" class="form-control" id="referalid" required>
                <option value="VSC0101">Select User ID</option>
                @foreach($users as $user)
              <option value="{{ $user->memid }}">{{ $user->memid }}</option>
              @endforeach
            </select>
                          @error('referalid')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                </div>
              </div>
       
      
</div>
<div class="row">
      <div class="col-sm-6 col-md-6">
         <div class="form-group">
            <label class="form-control-label" for="example3cols3Input">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
         </div>
      </div>
 

      <div class="col-sm-6 col-md-6">
         <div class="form-group">
            <label class="form-control-label" for="example4cols1Input">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
         </div>
      </div>
</div>

      
<div class="col-md-12">
         <div class="form-group">
         <button type="submit" class="btn btn-primary pull-right">Add</button>
         </div>
      </div>
   </div> 
</div>         
                
                            
            </form>
           
          </div>
        </div>
      </div>

<script>
    $(document).ready(function(){
 
 $('#referalid').change(function(){
   var memid = $(this).val();
   $.ajax({
     url:baseURL+'/admin/userajax',
     method: 'post',
     data: {memid: memid},
     dataType: 'json',
     success: function(response){
       var len = response.length;
    
       $('#name').text('');
       if(len > 0){
          var name = response[0].name;

          $('#name').text(name);
         
 
       }
 
     }
  });
 });
});
</script>

@endsection