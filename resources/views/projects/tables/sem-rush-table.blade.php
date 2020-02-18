<table class="table table-hover" id="dataTable">
    <thead class="btn-inverse-secondary">
      <tr class="bg-dark-green text-white">
        @foreach(config('project.sum_rush') as $key => $sem)
          <th>{{ $sem }}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($analytics as $key => $analytic)
      <tr>
        <td>{{$analytic->url}}</td>
        <td>{{$analytic->keyword}}</td>
        <td>{{$analytic->position}}</td>
        <td>{{$analytic->previous_position}}</td>
        <td>{{$analytic->search_volume}}</td>
        <td>{{$analytic->keyword_difficulty}}</td>
        <td>{{$analytic->cpc}}</td>
        <td>{{$analytic->traffic}}</td>
        <td>{{$analytic->traffic_percentage}}</td>
        <td>{{$analytic->traffic_cost}}</td>
        <td>{{$analytic->competition}}</td>
        <td>{{$analytic->number_of_results}}</td>
        <td>{{$analytic->trends}}</td>
        <td>{{$analytic->timestamp}}</td>
        <td>{{$analytic->serp_features_by_keyword}}</td>
      </tr>
      @endforeach
    </tbody>
</table>
