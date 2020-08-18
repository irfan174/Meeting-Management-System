@extends('Layout.app')

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-body">
      <section id="striped-row-form-layouts">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"> <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                  <form class="form form-horizontal striped-labels form-bordered">
                    <div class="form-body">
                      <h4 class="form-section"><i class="ft-user"></i> Meeting Details</h4>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Meeting Name</strong>
                        </label>
                        <div class="col-md-9">
                          @if($viewData->meeting_name)
                          <h4>{{$viewData->meeting_name}}</h4>
                          @else
                          <h4>No Name found!</h4>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Client</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$viewData->client_id}}</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Meeting Vanue</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$viewData->meeting_vanue}}</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Host</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$viewData->user->name}}</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Co-workers</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$user_name}}</h4>
                        </div>
                      </div>
                      @php 
                      $formatDate = date('d-m-Y, h:i a', strtotime($viewData->date));
                      $formatEndTime = date('h:i a', strtotime($viewData->end_time)); 
                      @endphp
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Start Date & Time</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$formatDate}}</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>End Time</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$formatEndTime}}</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Meeting Details</strong>
                        </label>
                        <div class="col-md-9">
                          <h4>{{$viewData->meeting_details}}</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1"><strong>Meeting Status</strong>
                        </label>
                        <div class="col-md-9">
                            @php
                                if($viewData->meeting_status == 1) { @endphp
                                <h4>Active</h4>
                            @php } else if($viewData->meeting_status == 0)   { @endphp
                                <h4>Inactive</h4>
                            @php  } @endphp
                        </div>
                      </div>
                    </div>
                    <div class="form-actions right">
                      <a href="{{URL::to('edit_meeting/'.$viewData->id)}}" class="btn btn-info"> <i class="fa fa-check-square-o"></i> Edit</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" style="padding-bottom: 10px">
              @if($viewData->meeting_discussion)
              <h4 class=""><strong>Meeting Discussion</strong></h4>
              <br>
              <h4 class="card-title">{{$viewData->meeting_discussion_date}}</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body" style="padding-top: 10px">
                {{ $viewData->meeting_discussion}}
              </div>
              @if($viewData->meeting_report_files)
              <div class="card-body" style="padding-top: 10px">
                <a href="{{URL::to('file_download/'.$viewData->meeting_report_files)}}" class="btn btn-success ">Download Report</a>
                @else
                <h4 class="card-body">No File has Attached!</h4>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <h4>No Discussion is added!</h4>
       @endif
    </div>
  </div>
</div>

@endsection


@section('jsCode')

<script type="text/javascript">


</script>

@endsection
