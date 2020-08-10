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
                <h4 class="card-title">All Users</h4>
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
                  <table id="UserDt" class="table table-striped table-bordered base-style zero-configuration" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Designation</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($UsersData as $UsersData)
                      <tr>
                        <td>{{$UsersData->name}}</td>
                        <td>{{$UsersData->dasignation}}</td>
                      </tr>
                    @endforeach
                    </tbody>
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



@section('jsCode')
<script type="text/javascript">
    
    $(document).ready(function() {
    $('#UserDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

</script>

@endsection