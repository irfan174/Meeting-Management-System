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
                <h4 class="card-title">All Meetings Of User </h4>
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
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table id="meeting_table" class="table table-striped table-bordered base-style">
                    <thead>
                      <tr>
                        <th>Meeting Name</th>
                        <th>Host</th>
                        <th>Vanue</th>
                        <th>Attendences</th>
                        <th>Date & Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($searchIndividualData as $searchIndividualData)
                      <tr>
                        <td>{{$searchIndividualData->meeting_name}}</td>
                        <td>{{$searchIndividualData->user->name}}</td>
                        <td>{{$searchIndividualData->meeting_vanue}}</td>
                        <td>{{$searchIndividualData->attendences}}</td>
                        <td>{{$searchIndividualData->date}}</td>
                        <td>{{$searchIndividualData->end_time}}</td>
                        <td class="pr-1"> <a href="{{URL::to('view_meeting/'.$searchIndividualData->id)}}" class="btn btn-success">View</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Meeting Name</th>
                        <th>Host</th>
                        <th>Vanue</th>
                        <th>Attendences</th>
                        <th>Date</th>
                        
                        <th>End Time</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
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