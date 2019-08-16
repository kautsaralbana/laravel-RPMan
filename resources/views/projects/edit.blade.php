@extends('layouts.master')

@section('content')
<section class="content-header row">
    <h1>Edit Project</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('projects.index')}}">Projects</a></li>
        <li><a href="">Detail</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<section class="content">
    @component('components.box')
    @slot('header')
        Edit
    @endslot
    <form action="{{route('projects.update',$project->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name') ? : $project->name }}" placeholder="Project Name">
            @if($errors->has('name'))
            <span class="invalid-feedback">
                {{$errors->first('name')}}
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="detail">Detail Project</label>
            <textarea name="detail" id="detail" rows="4" class="form-control {{$errors->has('detail') ? 'is-invalid' : ''}}" placeholder="Enter Description">{{old('detail') ? : $project->detail }}</textarea>
            @if($errors->has('detail')) {{-- <-check if we have a validation error --}}
            <span class="invalid-feedback">
                {{$errors->first('detail')}} {{-- <- Display the First validation error --}}
            </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endcomponent
</section>
@endsection
