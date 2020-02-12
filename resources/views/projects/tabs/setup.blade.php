@php $user = Auth::user(); @endphp
<div class="row">
    @include('projects.imports.sitemap')
    @include('projects.imports.csv_import')
    @include('projects.imports.google_analytics')
    @include('projects.imports.google_anaytics_search_filter')
    @include('projects.imports.google_search_console')
    @include('projects.imports.google_search_console_filter')
    @include('projects.imports.best_keyword')
    @include('projects.imports.main_keyword')
</div>
