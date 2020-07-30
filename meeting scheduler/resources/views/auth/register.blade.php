@extends('Layout.app5')

@section('content')
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <img src="{{asset('robust/app-assets/images/logo/logo-dark.png')}}" alt="branding logo">
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Create Account</span></h6>
                </div>
                <div class="card-content">  
                    <div class="card-body">
                        <form class="form-horizontal form-simple" action="{{ route('register') }}" method="POST" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control form-control-lg input-lg @error('name') is-invalid @enderror" id="name" placeholder="User Name" name="name"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input id="email" type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email Address">
                                <div class="form-control-position">
                                    <i class="ft-mail"></i>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input id="dasignation" type="dasignation" class="form-control form-control-lg input-lg @error('dasignation') is-invalid @enderror" name="dasignation" value="{{ old('dasignation') }}" required autocomplete="dasignation" placeholder="Your Designation">
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                                @error('dasignation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input id="password" type="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input id="password-confirm" type="password" class="form-control form-control-lg input-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Register</button>
                        </form>
                    </div>
                    <p class="text-center">Already have an account ? <a href="{{ route('login') }}" class="card-link">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>
    </div>
@endsection
