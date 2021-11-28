@extends('layouts.master')
@section('menu')
@endsection
@section('content')
<x-side_drawer/>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    @if($type == "allStores")
                    <h3>View Stores</h3>
                    @else
                    <h3>View Featured Stores</h3>
                    @endif
                    <p class="text-subtitle text-muted">staff information list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <section class="section">
            <div class="card">
                @if($type == "allStores")
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                        <a class="btn btn-outline-primary btn-block" href="{{ route('form/view/store/create') }}">Add Store</a>
                    </div>
                </div>
                @endif
                <br>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Store Name</th>
                                <th>Description</th>
                                <th>Store Image</th>
                                <th class="text-center">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->id }}</td>
                                    <td class="name">{{ $item->name }}</td>
                                    <td class="name">{{ $item->description }}</td>
                                    <td><img src="{{Storage::url($item->image)}}"  height=80 width=124></td>
                                    <td class="text-center">
                                        <a href="{{ url('form/view/detail/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>
                                        <a href="{{ url('delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted ">
            <div class="float-start">
                <p>2021 &copy; Ibrahim Mushtaha</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="https://ibrahim7portfolio.herokuapp.com/index.html">Ibrahim Mushtaha</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
