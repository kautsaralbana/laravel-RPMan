@extends('layouts.master')
@section('content')
<section class="content-header row">
    <h1>
        Profile
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
    </ol>
</section>
<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                {{-- Profile Image --}}
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/pics/'.Auth::user()->image)}}" alt="profile avatar">
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b>
                                <p class="pull-right">{{ Auth::user()->email }}</p>
                            </li>
                            <li class="list-group-item">
                                <b>Departemen</b>
                                <p class="pull-right">REA</p>
                            </li>
                            <li class="list-group-item">
                                <b>Created At</b>
                                <p class="pull-right">{{ Auth::user()->created_at }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Profile</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" action="{{route('profile.update')}}" method="post" enctype="multipart/form-data"> {{-- <- enctype for file upload --}}
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : Auth::user()->name }}">
                                    @if($errors->has('name'))
                                    <span class="invalid-feedback">
                                        {{$errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('email') ? : Auth::user()->email }}" placeholder="Enter Email">
                                    @if($errors->has('email'))
                                    <span class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Enter Password">
                                    @if($errors->has('password'))
                                    <span class="invalid-feedback">
                                        {{$errors->first('password')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="image">Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
