<table class="table table-hover" id="dataTable">
    <thead class="btn-inverse-secondary">
      <tr class="bg-dark-green text-white">
        @foreach(config('project.sum_rush') as $key => $sem)
          <th>{{ $sem }}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
    </tbody>
</table>
