<div class="col-md-5 offset-1 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="">
        <div class="card-header">
          <h5 class="text-center">Csv Import</h5>
        </div>
          <a href="{{route('project.sample', ['csv-import'])}}" class=" mb-3 float-right">Download Sample</a>
      </div>
      <form class="forms-sample" method="post" action="{{ route('project.csv', [$project->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Select File</label>
          <input type="file" class="form-control file-upload-browse btn btn-primary"  name="csv_file">
          @error('csv_file')
            <span class="invalid-feedback ml-1 mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-success mr-2">Import</button>
      </form>
    </div>
  </div>
</div>
