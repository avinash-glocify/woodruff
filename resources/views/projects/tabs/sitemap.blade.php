<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">SiteMaps</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr>
                        <th>Name</th>
                        <th>Url</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sitemaps as $key => $sitemap)
                    <tr>
                      <td>{{$sitemap->name}}</td>
                      <td> {{$sitemap->url}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
