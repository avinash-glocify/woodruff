@php $user = Auth::user(); @endphp
<div class="row">
    @include('projects.imports.sitemap')
    @include('projects.imports.ahrefs')
    @include('projects.imports.google_search_console')
    @include('projects.imports.screaming_frog_crawls')
    @include('projects.imports.sem_rush')
</div>
