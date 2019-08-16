@extends('layouts.master')
@section('content')
<section class="content-header row">
    <h1>Projects</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('projects.index')}}">Projects</a></li>
        <li class="active">Create</li>
    </ol>
</section>
<section class="content">
    @component('components.box')

    @slot('header')
    Create
    @endslot
    <form action="{{route('projects.store')}}" method="post" role="form">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name')}}" placeholder="Project Name">
            @if($errors->has('name'))
            <span class="invalid-feedback">
                {{$errors->first('name')}}
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" rows="4" class="form-control {{$errors->has('detail') ? 'is-invalid' : ''}}" placeholder="Enter Description">{{old('detail')}}</textarea>
            @if($errors->has('detail')) {{-- <-check if we have a validation error --}}
            <span class="invalid-feedback">
                {{$errors->first('detail')}} {{-- <- Display the First validation error --}}
            </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endcomponent
</section>
@endsection
