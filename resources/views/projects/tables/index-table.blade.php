<table class="table table-bordered" id="sitemapDataTable">
    <thead class="btn-inverse-secondary">
      <tr class="bg-dark-green text-white">
          <th>#</th>
          <th>Name</th>
          <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $key => $project)
      <tr>
        <td>{{++$key}}</td>
        <td>{{$project->name}}</td>
        <td>
          <div class="">
            <a type="button" href="{{ route('setup', [$project->id]) }}" title="view" class="btn btn-info btn-rounded btn-icon p-2"><i class="mdi mdi-eye"></i></a>
            <a type="button" href="javascript:void(0);" data-url="{{ route('project.destroy', [$project->id]) }}" title="Delete" class="btn btn-danger btn-rounded btn-icon p-2 del-btn"><i class="mdi mdi-delete-forever"></i></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
