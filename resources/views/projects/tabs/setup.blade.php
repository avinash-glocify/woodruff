@php $user = Auth::user(); @endphp
<div class="row">
    <div class="col-md-5 offset-1 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="">
            @if(Session::has('success_email_import'))
              <p class="alert-success p-3">{{ Session::get('success_email_import') }}</p>
            @endif
            <div class="card-header">
              <h5 class="text-center">SEM Rush</h5>
            </div>
          </div>
          <form class="forms-sample" method="post" action="{{ route('project.sem', [$project->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Select File</label>
              <input type="file" class="form-control file-upload-browse btn btn-primary" id="exampleInputUsername1"  name="sem_file">
              @error('sem_file')
                <span class="invalid-feedback ml-1 mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mr-2">Import</button>
          </form>
        </div>
        @if(Session::has('error_mail'))
          <div class="card-footer">
            <p> <span>Success. <strong class="text-success">{{ Session::get('newEntry') }} </strong> emails were imported.</span> <span>We found <strong>{{ Session::get('count') }}</strong> duplicate emails. Click <a href="{{ Session::get('error_mail') }}"><strong class="text-danger">download</strong></a> to download duplicate emails.</span></p>
          </div>
        @endif
      </div>
   </div>
</div>
