<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Google Search Console</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr class="bg-dark-green text-white">
                        <th>#</th>
                        <th>Domain Rating</th>
                        <th>Url Rating (DESC)</th>
                        <th>Referring Domains</th>
                        <th>Referring Page URL</th>
                        <th>Referring Page Title</th>
                        <th>Internal Links Count</th>
                        <th>External Links Count</th>
                        <th>Link URL</th>
                        <th>TextPre</th>
                        <th>Link Anchor</th>
                        <th>TextPost</th>
                        <th>Type</th>
                        <th>Backlink Status</th>
                        <th>First Seen</th>
                        <th>Last Check</th>
                        <th>Day Lost</th>
                        <th>Language</th>
                        <th>Traffic</th>
                        <th>Keywords</th>
                        <th>Js rendered</th>
                        <th>Linked Domains</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($analytics as $key => $analytic)
                    <tr>
                      <td>{{$analytic->ahref_number }}</td>
                      <td> {{$analytic->domain_rating }}</td>
                      <td> {{$analytic->url_rating_desc }}</td>
                      <td> {{$analytic->referring_domains }}</td>
                      <td> {{$analytic->referring_page_url }}</td>
                      <td>{{$analytic->referring_page_title }}</td>
                      <td> {{$analytic->internal_links_count }}</td>
                      <td> {{$analytic->external_links_count }}</td>
                      <td> {{$analytic->link_url }}</td>
                      <td> {{$analytic->textpre }}</td>
                      <td>{{$analytic->link_anchor }}</td>
                      <td> {{$analytic->textpost }}</td>
                      <td> {{$analytic->type}}</td>
                      <td> {{$analytic->backlink_status }}</td>
                      <td> {{$analytic->first_seen }}</td>
                      <td>{{$analytic->last_check }}</td>
                      <td> {{$analytic->day_lost }}</td>
                      <td> {{$analytic->language }}</td>
                      <td> {{$analytic->traffic }}</td>
                      <td> {{$analytic->keywords }}</td>
                      <td> {{$analytic->js_rendered }}</td>
                      <td> {{$analytic->linked_domains }}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
