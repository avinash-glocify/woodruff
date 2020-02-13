<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Google Search Console Filter</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr>
                        <th>Page Path</th>
                        <th>Landing Page</th>
                        <th>Impressions</th>
                        <th>clicks</th>
                        <th>Ctr</th>
                        <th>Average Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($analytics as $key => $analytic)
                    <tr>
                      <td>{{$analytic->page_path}}</td>
                      <td>{{$analytic->landing_page}}</td>
                      <td> {{$analytic->impressions}}</td>
                      <td> {{$analytic->clicks}}</td>
                      <td> {{$analytic->ctr}}</td>
                      <td> {{$analytic->average_position}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
