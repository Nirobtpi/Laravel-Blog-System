@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="mb-4">
            <h2 class="mb-1">Dashboard</h2>
            <p class="text-muted mb-0">Welcome back{{ Auth::check() ? ', ' . Auth::user()->name : '' }}. Here’s a quick overview.</p>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-4">
                <a href="{{ url('admin/index') }}" class="text-decoration-none">
                    <div class="card card-default card-mini h-100 dash-stat-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h2 class="mb-1">{{ $count }}</h2>
                                    <div class="sub-title"><span>Total Posts</span></div>
                                </div>
                                <span class="dash-stat-icon"><i class="fas fa-blog"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-default card-mini h-100 dash-stat-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h2 class="mb-1">{{ $usersCount }}</h2>
                                <div class="sub-title"><span>Total Users</span></div>
                            </div>
                            <span class="dash-stat-icon"><i class="fas fa-users"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <a href="{{ url('view-category') }}" class="text-decoration-none">
                    <div class="card card-default card-mini h-100 dash-stat-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h2 class="mb-1">{{ $categoryCount }}</h2>
                                    <div class="sub-title"><span>Total Categories</span></div>
                                </div>
                                <span class="dash-stat-icon"><i class="fas fa-list-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <a href="{{ url('view-tag') }}" class="text-decoration-none">
                    <div class="card card-default card-mini h-100 dash-stat-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h2 class="mb-1">{{ $tagsCount }}</h2>
                                    <div class="sub-title"><span>Total Tags</span></div>
                                </div>
                                <span class="dash-stat-icon"><i class="fas fa-tags"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header bg-white border-bottom">
                <h4 class="mb-0">Quick actions</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-plus mr-1"></i> New post
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <a href="{{ url('add-category') }}" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-folder-plus mr-1"></i> New category
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('add-tag') }}" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-tag mr-1"></i> New tag
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .dash-stat-card { transition: box-shadow .2s ease, transform .2s ease; }
        .dash-stat-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,.08); transform: translateY(-2px); }
        .dash-stat-icon { width: 42px; height: 42px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; background: #f0f3f7; color: #4c84ff; font-size: 18px; }
        a .dash-stat-card .sub-title, a .dash-stat-card h2 { color: inherit; }
    </style>
@endpush
