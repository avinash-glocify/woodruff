<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Best Keywords</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr>
                        <th>Url</th>
                        <th>Keyword</th>
                        <th>Search Volume</th>
                        <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($analytics as $key => $analytic)
                    <tr>
                      <td>{{$analytic->url}}</td>
                      <td> {{$analytic->keywords}}</td>
                      <td> {{$analytic->search_volume}}</td>
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
