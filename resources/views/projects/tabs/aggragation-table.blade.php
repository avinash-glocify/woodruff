<table class="table table-hover" id="dataTableAggregate">
    <thead class="">
      <tr style="color:white;">
          <th colspan="4" class="bg-black">&nbsp;</th>
          <th class="bg-dark-blue">&nbsp;</th>
          <th colspan="2" class="text-right bg-light-green">SITE ARCHITECTURE</th>
          <th class="bg-green">SITEMAP STATUS</th>
          <th colspan="6" class="bg-dark-green">KEYWORD PERFORMANCE</th>
          <th colspan="11" class="bg-pink">PAGE PERFORMANCE</th>
          <th colspan="5"  class="bg-grey">ON PAGE</th>
          <th class="bg-dark-green">&nbsp;</th>
          <th colspan="3" class="bg-light-green">&nbsp;</th>
          <th colspan="2" class="bg-grey">INTERNAL NAV</th>
      </tr>
      <tr>
          <th class="bg-light-grey">Manual</th>
          <th class="bg-light-grey">Manual</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Manual</th>
          <th class="bg-pink">Formula</th>
          <th class="bg-light-grey">Manual</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-pink">Formula</th>
          <th class="bg-light-grey">SEM Rush</th>
          <th class="bg-light-grey">SEM Rush</th>
          <th class="bg-light-grey">SEM Rush</th>
          <th class="bg-light-grey">SEM Rush</th>
          <th class="bg-light-grey">SEM Rush</th>
          <th class="bg-light-grey">SEM Rush</th>
          <th class="bg-light-grey">GSC</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">GA</th>
          <th class="bg-light-grey">Ahrefs</th>
          <th class="bg-light-grey">GSC</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
          <th class="bg-light-grey">Screaming Frog</th>
      </tr>
      <tr style="color:white;">
          <th class="bg-dark-green">URL Action #1</th>
          <th class="bg-dark-green">URL Action #2</th>
          <th class="bg-dark-green">URL</th>
          <th class="bg-light-color">Final Url</th>
          <th class="bg-dark-blue">Page Path</th>
          <th class="bg-light-green">Catgory</th>
          <th class="bg-light-green">PageDepth</th>
          <th class="bg-green">In Sitemap?</th>
          <th class="bg-dark-green">Main KW</th>
          <th class="bg-dark-green">Volume</th>
          <th class="bg-dark-green">Ranking</th>
          <th class="bg-dark-green">Best KW</th>
          <th class="bg-dark-green">Volume</th>
          <th class="bg-dark-green">Ranking</th>
          <th class="bg-pink">Impressions</th>
          <th class="bg-pink">Sessions</th>
          <th class="bg-pink">Sales / Goal Completions</th>
          <th class="bg-pink">$ Conversion Rate</th>
          <th class="bg-pink">Goal Conversion Rate</th>
          <th class="bg-pink">% Change Sessions</th>
          <th class="bg-pink">Bounce rate</th>
          <th class="bg-pink">Avg. time on page</th>
          <th class="bg-pink">Losing Traffic?</th>
          <th class="bg-pink">Links</th>
          <th class="bg-pink">SERP CTR</th>
          <th class="bg-grey">Type</th>
          <th class="bg-grey">Current Title</th>
          <th class="bg-grey">Meta</th>
          <th class="bg-grey">H1</th>
          <th class="bg-grey">Word Count</th>
          <th class="bg-dark-green">Canonical Link Element</th>
          <th class="bg-light-green">Status Code</th>
          <th class="bg-light-green">Index / Noindex</th>
          <th class="bg-light-green">Last Modified</th>
          <th class="bg-grey">Inlinks</th>
          <th class="bg-grey">Outlinks</th>
      </tr>
    </thead>
    <tbody>
      @php $removeChar = ["https://", "http://", "www."]; @endphp
      @foreach($analytics as $key => $sitemap)
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="max-width:450px; overflow:hidden; word-break: break-all;"><p> {{ $sitemap->address }}</p></td>
        <td>test</td>
        <td>{{ str_replace($removeChar, "", $sitemap->address) }}</td>
        <td>test</td>
        <td>{{ $sitemap->crawl_depth}}</td>
        <td class="@if($sitemap->site_url) bg-light-green @else bg-pink @endif">{{ $sitemap->site_url ? 'Yes' : 'No'}}</td>
        <td>{{ $sitemap->keyword}}</td>
        <td>{{ $sitemap->search_volume}}</td>
        <td>{{ $sitemap->position}}</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>{{ $sitemap->impressions}}</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>{{ $sitemap->ctr }}</td>
        <td>{{ $sitemap->content }}</td>
        <td>{{ $sitemap->title_1 }}</td>
        <td>{{ $sitemap->meta_description_1 }}</td>
        <td>{{ $sitemap->h1_1 }}</td>
        <td>{{ $sitemap->word_count }}</td>
        <td>{{ $sitemap->canonical_link_element_1 }}</td>
        <td>{{ $sitemap->status_code }}</td>
        <td>{{ $sitemap->indexability }}</td>
        <td>{{ $sitemap->last_modified }}</td>
        <td>{{ $sitemap->inlinks }}</td>
        <td>{{ $sitemap->outlinks }}</td>
      </tr>
      @endforeach
    </tbody>
</table>
