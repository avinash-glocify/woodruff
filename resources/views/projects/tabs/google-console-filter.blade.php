<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Google Search Console Filter</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr>
                        <th>#</th>
                        <th>Page Path</th>
                        <th>Landing Page</th>
                        <th>Impressions</th>
                        <th>clicks</th>
                        <th>Ctr</th>
                        <th>Average Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($analytics as $key => $analytic)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$analytic->page_path}}</td>
                      <td>{{$analytic->landing_page}}</td>
                      <td> {{$analytic->impressions}}</td>
                      <td> {{$analytic->clicks}}</td>
                      <td> {{$analytic->ctr}}</td>
                      <td> {{$analytic->average_position}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center"><strong>No Data Found</strong></td>
                    </tr>
                    @endforelse
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
