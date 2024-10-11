@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')   
<div class="row">
        @include('admin.layouts.sidebar')
            <div class="col-md-9">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card-header bg-white">
                            <h3 class="mt-2">Dashboard</h3>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-white">
                                            <div class="d-flex justify-content-between">
                                                <strong class="'badge text-white bg-dark">
                                                    Today's Orders
                                                </strong>
                                                <span class="badge bg-dark">{{ $todayOrders->count() }}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center bg-white">
                                            <strong>
                                                {{ $todayOrders->sum('total') }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-white">
                                            <div class="d-flex justify-content-between">
                                                <strong class="'badge text-white bg-primary">
                                                    Yesterday's Orders
                                                </strong>
                                                <span class="badge bg-primary">{{ $yesterdayOrders->count() }}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center bg-white">
                                            <strong>
                                                {{ $yesterdayOrders->sum('total') }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-white">
                                            <div class="d-flex justify-content-between">
                                                <strong class="'badge text-white bg-danger">
                                                    This Month's Orders
                                                </strong>
                                                <span class="badge bg-danger">{{ $monthOrders->count() }}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center bg-white">
                                            <strong>
                                                {{ $monthOrders->sum('total') }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-white">
                                            <div class="d-flex justify-content-between">
                                                <strong class="'badge text-white bg-success">
                                                    This Year's Orders
                                                </strong>
                                                <span class="badge bg-success">{{ $yearOrders->count() }}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center bg-white">
                                            <strong>
                                                {{ $yearOrders->sum('total') }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection