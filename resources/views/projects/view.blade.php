@extends('layouts.auth')
@section('content')
@php $tab = Request::segment(2); $user = Auth::user();  @endphp
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4 pb-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="overview-tab"  href="{{ route('project.show', $project->id) }}" role="tab" aria-controls="overview" aria-selected="true">SET UP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if($tab == 'view') active @endif" id="create-tab"  href="#create"  role="tab" aria-controls="create" aria-selected="false">View</a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="tab-content py-0 px-0">
            <div class="">
              @if($tab == 'view')
                @include('projects.tabs.view')
              @else
                @include('projects.tabs.setup')
              @endif
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
