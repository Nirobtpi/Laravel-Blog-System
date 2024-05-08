@extends('layouts.auth')
@section('content')
    <!-- Top Statistics -->
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{ $count }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Total Posts</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{ $usersCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Total User</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{ $categoryCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Total Caetegory</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{ $tagsCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Total Tags</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
