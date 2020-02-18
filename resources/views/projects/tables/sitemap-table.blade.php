<table class="table table-hover" id="dataTable">
    <thead class="btn-inverse-secondary">
      <tr class="bg-dark-green text-white">
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
