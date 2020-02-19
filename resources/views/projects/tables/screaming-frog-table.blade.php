<table class="table table-hover" id="dataTable">
    <thead class="btn-inverse-secondary">
      <tr class="bg-dark-green text-white">
          @foreach(config('project.screaming_frogs') as $key => $frog)
            <th>{{ $frog }}</th>
          @endforeach
      </tr>
    </thead>
    <tbody>
    </tbody>
</table>
