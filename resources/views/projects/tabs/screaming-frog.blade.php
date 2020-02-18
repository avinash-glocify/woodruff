<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Screaming Frog Crawl</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr class="bg-dark-green text-white">
                        @foreach(config('project.screaming_frogs') as $key => $frog)
                          <th>{{ $frog }}</th>
                        @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($analytics as $key => $analytic)
                    <tr>
                      <td>{{$analytic->address}}</td>
                      <td>{{$analytic->content}}</td>
                      <td>{{$analytic->status_code}}</td>
                      <td>{{$analytic->status}}</td>
                      <td>{{$analytic->indexability}}</td>
                      <td>{{$analytic->indexability_status}}</td>
                      <td>{{$analytic->title_1}}</td>
                      <td>{{$analytic->title_1_length}}</td>
                      <td>{{$analytic->title_1_pixel_width}}</td>
                      <td>{{$analytic->meta_description_1}}</td>
                      <td>{{$analytic->meta_description_1_length}}</td>
                      <td>{{$analytic->meta_description_1_pixel_width}}</td>
                      <td>{{$analytic->meta_keyword_1}}</td>
                      <td>{{$analytic->meta_keywords_1_length}}</td>
                      <td>{{$analytic->h1_1}}</td>
                      <td>{{$analytic->h1_1_length}}</td>
                      <td>{{$analytic->h1_2}}</td>
                      <td>{{$analytic->h1_2_length}}</td>
                      <td>{{$analytic->h2_1}}</td>
                      <td>{{$analytic->h2_1_length}}</td>
                      <td>{{$analytic->h2_2}}</td>
                      <td>{{$analytic->h2_2_length}}</td>
                      <td>{{$analytic->meta_robots_1}}</td>
                      <td>{{$analytic->x_robots_tag_1}}</td>
                      <td>{{$analytic->meta_refresh_1}}</td>
                      <td>{{$analytic->canonical_link_element_1}}</td>
                      <td>{{$analytic->relnext_1}}</td>
                      <td>{{$analytic->relprev_1}}</td>
                      <td>{{$analytic->http_relnext_1}}</td>
                      <td>{{$analytic->http_relprev_1}}</td>
                      <td>{{$analytic->size_bytes}}</td>
                      <td>{{$analytic->word_count}}</td>
                      <td>{{$analytic->text_ratio}}</td>
                      <td>{{$analytic->crawl_depth}}</td>
                      <td>{{$analytic->link_score}}</td>
                      <td>{{$analytic->inlinks}}</td>
                      <td>{{$analytic->unique_inlinks}}</td>
                      <td>{{$analytic->percentage_of_total}}</td>
                      <td>{{$analytic->outlinks}}</td>
                      <td>{{$analytic->unique_outlinks}}</td>
                      <td>{{$analytic->external_outlinks}}</td>
                      <td>{{$analytic->unique_external_outlinks}}</td>
                      <td>{{$analytic->hash}}</td>
                      <td>{{$analytic->response_time}}</td>
                      <td>{{$analytic->last_modified}}</td>
                      <td>{{$analytic->redirect_url}}</td>
                      <td>{{$analytic->redirect_type}}</td>
                      <td>{{$analytic->url_encoded_address}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
