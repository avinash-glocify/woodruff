<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Csv</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead class="btn-inverse-dark">
                    <tr>
                        <th>#</th>
                        <th>Keyword</th>
                        <th>Position</th>
                        <th>Previous Position</th>
                        <th>Search Volume</th>
                        <th>Keyword Difficulty</th>
                        <th>Cpc</th>
                        <th>Url</th>
                        <th>Traffic</th>
                        <th>Traffic %</th>
                        <th>Competetion</th>
                        <th>Number Of Results</th>
                        <th>Trends</th>
                        <th>Timestamp</th>
                        <th>Serp Feature By Keyword</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($csvs as $key => $csv)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$csv->keyword}}</td>
                      <td> {{$csv->position}}</td>
                      <td> {{$csv->previous_position}}</td>
                      <td> {{$csv->search_volume}}</td>
                      <td> {{$csv->keyword_difficulty}}</td>
                      <td> {{$csv->cpc}}</td>
                      <td> {{$csv->url}}</td>
                      <td> {{$csv->traffic}}</td>
                      <td> {{$csv->traffic_percentage}}</td>
                      <td> {{$csv->compentetion}}</td>
                      <td> {{$csv->number_of_results}}</td>
                      <td> {{$csv->trends}}</td>
                      <td> {{$csv->timestamp}}</td>
                      <td> {{$csv->serp_features_by_keyword}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center"><strong>No Data Found</strong></td>
                    </tr>
                    @endforelse
                  </tbody>
              </table>
        </div>
      </div>
      <div class="card-footer">
        <div class="float-right">
          {{ $csvs->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
