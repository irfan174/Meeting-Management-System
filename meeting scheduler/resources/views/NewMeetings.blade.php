@extends('Layout.app')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new"></div>
    </div>
    <div class="content-body">
      <section id="base-style">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">All Meetings</h4>
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
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  @if(sizeof($allMeetingData)>0)
                  <table id="meeting_table" class="table table-striped table-bordered base-style">
                    <thead>
                      <tr>
                        <th>Meeting Name</th>
                        <th>Host</th>
                        <th>Vanue</th>
                        <th>Date</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Add Report</th>
                        <th >Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($allMeetingData as $allMeetingData)
                      <tr>
                        <input type="hidden" id="deleteValue" value="{{$allMeetingData->id}}">
                        <td>{{$allMeetingData->meeting_name}}</td>
                        <td>{{$allMeetingData->user->name}}</td>
                        <td>{{$allMeetingData->meeting_vanue}}</td>
                        <td>{{$allMeetingData->date}}</td>
                        <td class="text-center"><a href="{{URL::to('view_meeting/'.$allMeetingData->id)}}" ><i class="fas fa-eye"></i></a></td>
                        <td class="text-center"><a href="{{URL::to('edit_meeting/'.$allMeetingData->id)}}"><i class="far fa-edit"></i></a></td>
                        <td class="text-center"><a href="{{URL::to('add_report/'.$allMeetingData->id)}}"><i class="fas fa-file-alt"></i></a></td>
                      
                        <td ><a>
                          <form action="{{ route('deleteMeeting', $allMeetingData->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" onclick="return confirm('Are you sure you want to Remove?');" class="btn-danger" value="Delete">
                            </form>
                          </a>
                        </td>

                        
                      </tr>
                     @endforeach
                     @else
                     <center>No Data found!</center>
                    
                    </tbody>
                    
                  </table>
                   @endif
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
    
</script>

@endsection