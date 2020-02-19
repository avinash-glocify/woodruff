@extends('layouts.auth')
@section('content')
@php $segment = Request::segment(3); $user = Auth::user();  @endphp
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4" role="tablist">
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
    <div class="col-md-12">
        <div class="tab-content py-0 px-0">
            <div class="">
              @if($segment == 'sitemap')
                @include('projects.tabs.sitemap')
              @elseif($segment == 'google-search-console')
                @include('projects.tabs.google-console')
              @elseif($segment == 'ahrefs')
                @include('projects.tabs.ahrefs')
              @elseif($segment == 'aggregation')
                @include('projects.tabs.aggregation')
              @elseif($segment == 'screaming-frogs')
                @include('projects.tabs.screaming-frog')
              @elseif($segment == 'sem-rush')
                @include('projects.tabs.sem_rush')
              @else
                @include('projects.tabs.setup')
              @endif
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
