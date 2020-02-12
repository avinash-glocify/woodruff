<div class="col-md-5 offset-1 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="">
        <div class="card-header bg-gradient-light">
          <h5 class="text-center">Sitemap</h5>
        </div>
          <a href="{{route('project.sample', ['sitemap'])}}" class=" m-2 float-right">Download Sample</a>
      </div>
      <form class="forms-sample d-inline-block" method="post" action="{{ route('project.sitemap', [$project->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Select File</label>
          <input type="file" class="form-control file-upload-browse btn btn-rounded btn-linkedin" name="sitemap_file">
          @error('sitemap_file')
            <span class="invalid-feedback ml-1 mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-rounded btn-success mr-2">Import</button>
      </form>
    </div>
  </div>
</div>
