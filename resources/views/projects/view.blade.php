@extends('layouts.auth')
@section('content')
@php $segment = Request::segment(3); $user = Auth::user();  @endphp
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4 pb-4" role="tablist">
            @foreach(config('project.tabs') as $key => $tab)
              <li class="nav-item">
                <a class="nav-link @if($segment == $key) active @endif" id="overview-tab"  href="{{ route($key, [$project->id]) }}" role="tab" aria-controls="overview" aria-selected="true">{{$tab}}</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="tab-content py-0 px-0">
            <div class="">
              @if($segment == 'sitemap')
                @include('projects.tabs.sitemap')
              @elseif($segment == 'csv')
                @include('projects.tabs.csv')
              @elseif($segment == 'google-analytics')
                @include('projects.tabs.google-analytics')
              @elseif($segment == 'analytics-search-filter')
                @include('projects.tabs.google-analytics-filter')
              @elseif($segment == 'google-console')
                @include('projects.tabs.google-console')
              @elseif($segment == 'console-search-filter')
                @include('projects.tabs.google-console-filter')
              @elseif($segment == 'best-keywords')
                @include('projects.tabs.best-keywords')
              @elseif($segment == 'main-keywords')
                @include('projects.tabs.main-keywords')
              @else
                @include('projects.tabs.setup')
              @endif
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
