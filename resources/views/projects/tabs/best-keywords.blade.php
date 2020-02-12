<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Best Keywords</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Url</th>
                        <th>Keyword</th>
                        <th>Search Volume</th>
                        <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($analytics as $key => $analytic)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$analytic->url}}</td>
                      <td> {{$analytic->keywords}}</td>
                      <td> {{$analytic->search_volume}}</td>
                      <td> {{$analytic->position}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center"><strong>No Data Found</strong></td>
                    </tr>
                    @endforelse
                  </tbody>
              </table>
        </div>
        <div class="float-right">
          {{ $analytics->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
