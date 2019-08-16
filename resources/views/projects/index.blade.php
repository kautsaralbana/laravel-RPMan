@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header row">
    <h1>
        Projects
        <small>
            <a class="btn btn-block btn-primary btn-sm" href="{{ route('projects.create') }}">Create</a>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Projects</li>
    </ol>
</section>
<section class="content">
    @forelse($projects as $project)
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$project->name}}</h3>
        </div>
        <div class="box-body">
            <div class="pull-left">
                <p>{{str_limit($project->detail,15)}}</p>
            </div>
            <div class="pull-right">
                <a class="btn btn-block btn-primary" href="{{ route('projects.show', $project->id) }}">Show</a>
            </div>
        </div>
    </div>
    @empty
    <div class="callout callout-danger">
        <h4>Project not found</h4>
        <p>Please create project first!</p>
    </div>
    <div class="d-flex justify-content-center">
        {{ $projects->links('vendor.pagination.bootstrap-4') }}
    </div>
    @endforelse
</section>
@endsection
