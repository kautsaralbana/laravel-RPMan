@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Home
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard active"></i> Home</a></li>
    </ol>
</section>
<section class="content">
<div class="row">
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
        <h3>{{ $user }}</h3>
            <p>User Registrations</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
        <div class="inner">
        <h3>{{ $project }}</h3>
            <p>Project Created</p>
        </div>
        <div class="icon">
            <i class="fa fa-files-o"></i>
        </div>
        <a href="{{ route('projects.index') }}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<!-- ./col -->
</section>
@endsection
