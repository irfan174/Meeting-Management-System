@extends('Layout.app')

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new"></div>
    </div>
    <div class="content-body">
      <section id="horizontal-form-layouts" class="basic-select2">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="horz-layout-icons">Search Users Meeting</h4>
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
              <div class="card-content collpase show">
                <div class="card-body">
                  <div class="form-body">
                    <div class="form-group">
                      <label for="meetingvanue">Users</label>
                      <div class="position-relative has-icon-left">
                        <select id="attendences" class="select2 form-control" name="attendences">
                          @foreach ($attendences as $users)
                          <option value="{{$users->id}}">{{$users->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-actions right">
                      <button id="search" type="submit" class="btn btn-primary" name="search"> <i class="fa fa-check-square-o"></i> Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>

@endsection


@section('jsCode')

<script type="text/javascript">
    $(document).ready(function(){
      $('#search').on("click", function(){
        $userId = document.getElementById("attendences").value;
        //alert($userId);
        $.ajax({
          url: window.location.href="individualMeetings/"+ $userId

        });
      });
    });

</script>

@endsection