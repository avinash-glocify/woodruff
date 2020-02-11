@php $user = Auth::user(); @endphp
<div class="row">
    @include('projects.imports.sitemap')
    @include('projects.imports.google_analytics')
    @include('projects.imports.google_search_console')
    @include('projects.imports.search_filter')
    @include('projects.imports.csv_import')
</div>
