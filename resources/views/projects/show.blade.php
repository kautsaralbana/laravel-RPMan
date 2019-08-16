@extends('layouts.master')
@section('content')
<section class="content-header row">
    <h1>
        Project
        <small>
            Detail
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('projects.index') }}">Projects</a></li>
        <li class="active">Detail</li>
    </ol>
</section>
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <div>
                <h3 class="box-title pull-left">{{$project->name}}</h3>
            </div>
            {{-- <a href="#" class="btn btn-warning box-tools pull-right">Input Report</a> --}}
        </div>
        <div class="box-body">
            <div class="pull-left">
                <p>{{$project->detail}}</p>
            </div>
        </div>
        <div class="box-footer">
            <div class="box-tools pull-left">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary float-left">Update</a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Delete</a>
            </div>
            <div class="box-tools pull-right">
                <small> Created by: {{ $project->user['name'] }}</small><br>
                <small class="pull-right">{{$project->created_at->diffForHumans()}}</small>
            </div>
            <div class="clearfix"></div>
            <div class="modal modal-danger fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete Project</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin menghapus project ini?&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-orange" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" id="delete-form" action="{{route('projects.destroy',$project->id)}}">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</section>

@endsection
