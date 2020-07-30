@extends('Layout.app3')

@section('content')

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
                <h4 class="card-title" id="horz-layout-icons">Edit Meeting</h4>
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
                  <form action="{{ route('updateMeeting',$editViewData->id) }}" method="POST" class="form">
                    @csrf 
                    @method('PUT')
                    <div class="form-body">
                      <div class="form-group">
                        <label for="meetingname">Meeting Title</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="meetingnameid" class="form-control @error('meeting_name') is-invalid @enderror" name="meeting_name" value="{{ $editViewData->meeting_name }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('meeting_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="clienttname">Meeting With</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="meetingnameid" class="form-control @error('client_id') is-invalid @enderror" name="client_id" value="{{ $editViewData->client_id }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('client_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="meetingvanue">Meeting Vanue</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="meetingnameid" class="form-control @error('meeting_vanue') is-invalid @enderror" name="meeting_vanue" value="{{ $editViewData->meeting_vanue }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('meeting_vanue')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="attendences">Co-workers</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="meetingnameid" class="form-control @error('attendences') is-invalid @enderror" name="attendences" value="{{ $editViewData->attendences }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('attendences')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="meetingvanue">Co-workers</label>
                        <div class="position-relative has-icon-left">
                          <select class="select2 form-control" multiple="multiple" name="attendences[]">
                            @foreach ($attendences as $users)
                            <option value="{{$users->id}}" {{ ($users->id == $editViewData->attendences) ? 'selected' : ''}} >{{$users->name}}</option>@endforeach</select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="starttime">Date & Start Time</label>
                            <div class="position-relative has-icon-left">
                              <input type="datetime-local" id="starttimeid" class="form-control" value="{{ $editViewData->date }}" name="date">
                              <div class="form-control-position"> <i class="ft-clock"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="endtime">End Time</label>
                            <div class="position-relative has-icon-left">
                              <input type="time" id="endtimeid" class="form-control" value="{{ $editViewData->end_time }}" name="end_time">
                              <div class="form-control-position"> <i class="ft-clock"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="details">Meeting Details</label>
                        <div class="position-relative has-icon-left">
                          <textarea id="detailsid" rows="5" class="form-control @error('meeting_details') is-invalid @enderror" name="meeting_details">{{$editViewData->meeting_details }}</textarea>
                          <div class="form-control-position"> <i class="ft-file"></i>
                          </div>
                          @error('meeting_details')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="attendences">Meeting Status</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="meetingnameid" class="form-control @error('meeting_status') is-invalid @enderror" name="meeting_status" value="{{ $editViewData->meeting_status }}">
                          <div class="form-control-position"> <i class="ft-user"></i>
                          </div>
                        </div>
                        @error('attendences')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="meetingvanue">Meeting Status</label>
                        <div class="position-relative has-icon-left">
                          <select class="select2 form-control" multiple="multiple" name="meeting_status">
                            <option value="1">Active</option>
                            <option value="0">Closed</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                    <div class="form-actions right">
                      <button type="button" class="btn btn-warning mr-1"> <i class="ft-x"></i> Cancel</button>
                      <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> Save</button>
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
    }, 3000 ); // 3 secs

    });

</script>

@endsection