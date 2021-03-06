<div class="col-md-5 offset-1 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="">
        <div class="card-header bg-gradient-light">
          <h5 class="text-center">SEM Rush</h5>
        </div>
          <a href="{{route('project.sample', ['SEM Rush'])}}" class=" m-2 float-right text-monospace">Download Sample</a>
      </div>
      <form class="forms-sample d-inline-block" method="post" action="{{ route('project.sem_rush', [$project->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Select File</label>
          <input type="file" class="form-control file-upload-browse btn btn-rounded btn-linkedin" name="sem_rush_file">
          @error('sem_rush_file')
            <span class="invalid-feedback ml-1 mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-success btn-sm  btn-icon-text"><i class="mdi mdi-upload btn-icon-prepend"></i>Import</button>
      </form>
    </div>
  </div>
</div>
