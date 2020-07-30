@extends('Layout.app')

@section('content')
<!-- -->
  
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new"></div>
    </div>
    <div class="content-body">
      <section id="horizontal-form-layouts">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="horz-layout-icons">Edit Your Profile</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a>
                    </li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a>
                    </li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              @if(session('Success'))
              <div class="alert alert-success">
                {{session('Success')}}
              </div>
              @endif
              @if(session('Failed'))
              <div class="alert alert-success">
                {{session('Failed')}}
              </div>
              @endif
              <div class="card-content collpase show">
                <div class="card-body">
                  <form action="{{ route('updateUserProfile',$editUserData->id) }}" method="POST" class="form">
                    @csrf 
                    @method('PUT')
                    <div class="form-body">
                      <div class="form-group">
                        <label for="name">User Name</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userNameId" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $editUserData->name }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="clienttname">Email Address</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="userEmailId" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $editUserData->email }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="meetingvanue">Designation</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="designationId" class="form-control @error('dasignation') is-invalid @enderror" name="dasignation" value="{{ $editUserData->dasignation }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('dasignation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="password">Password</label>
                        <div class="position-relative has-icon-left">
                          <input type="password" id="passwordId" class="form-control @error('password') is-invalid @enderror" name="password" >
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <div class="position-relative has-icon-left">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" >
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions right">
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>Confirm</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>  
  

@endsection


@section('jsCode')

<script type="text/javascript">
    $("document").ready(function(){
    setTimeout(function(){
        $("div.alert").remove();
    }, 3000 ); // 2 secs

    });

</script>

@endsection