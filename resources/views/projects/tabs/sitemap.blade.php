<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">SiteMaps</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead class="btn-inverse-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Url</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($sitemaps as $key => $sitemap)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$sitemap->name}}</td>
                      <td> {{$sitemap->url}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3" class="text-center"><strong>No Data Found</strong></td>
                    </tr>
                    @endforelse
                  </tbody>
              </table>
        </div>
      </div>
      <div class="card-footer">
        <div class="float-right">
          {{ $sitemaps->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
