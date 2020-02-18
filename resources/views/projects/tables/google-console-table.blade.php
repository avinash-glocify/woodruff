<table class="table table-hover" id="dataTable">
    <thead class="btn-inverse-secondary">
      <tr class="bg-dark-green text-white">
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