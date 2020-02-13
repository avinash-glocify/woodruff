<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Google Search Console</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr>
                        <th>page</th>
                        <th>Impressions</th>
                        <th>Clicks</th>
                        <th>Ctr</th>
                        <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($analytics as $key => $analytic)
                    <tr>
                      <td>{{$analytic->page}}</td>
                      <td> {{$analytic->impressions}}</td>
                      <td> {{$analytic->clicks}}</td>
                      <td> {{$analytic->ctr}}</td>
                      <td> {{$analytic->position}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
