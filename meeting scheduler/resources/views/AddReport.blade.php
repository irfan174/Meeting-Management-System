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
                <h4 class="card-title" id="horz-layout-icons">Add Meeting Report</h4>
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
              <div class="alert alert-danger">
                {{session('Failed')}}
              </div>
              @endif
              <div class="card-content collpase show">
                <div class="card-body">
                  <form action="{{ route('addReport', $meetingReportData->id) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf 
                    @method('POST')
                    <div class="form-body">
                      <div class="form-group">
                        <label for="details">Meeting Discassion</label>
                        <div class="position-relative has-icon-left">
                          <textarea id="detailsid" rows="5" class="form-control" name="meeting_discussion" placeholder="Discassion"></textarea>
                          <div class="form-control-position"> <i class="ft-file"></i>
                          </div>
                        </div>
                      </div>
                      <div class="form-group ">
                         <label>Select File</label><br>
                        <label id="projectinput7" class="file center-block">
                          <input type="file" class="dropify" id="file" name="meeting_report_files"> <span class="file-custom"></span>
                        </label>
                       
                      </div>
                    </div>
                    <div class="form-group">
                       
                        <input type="hidden" id="meetingreportdateid" class="form-control" name="meeting_discussion_date" value="{{date("d/m/y h:i a")}}">
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
    $(document).ready(function(){
      $('.dropify').dropify();
    }); 

    $("document").ready(function(){
    setTimeout(function(){
        $("div.alert").remove();
    }, 3000 ); // 3 secs

    });

</script>

@endsection