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
                    <h3>View Messages</h3>
                    <p class="text-subtitle text-muted">For View all previously sent messages</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Log Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Message Title</th>
                                <th>Message Description</th>
                                <th>Message To</th>
                                <th>Status</th>
                                <th>Date Time</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td class="id">{{ ++$key }}</td>
                                <td class="name">{{ $item->rec_id }}</td>
                                <td class="name">{{ $item->full_name }}</td>
                                <td class="name">{{ $item->sex }}</td>
                                <td class="email">---</td>
                                <td class="phone_number">{{ $item->salary }}</td>
                                <td class="text-center">
                                    <a href="#">
                                        <span class="badge bg-success"><i class="bi bi-clipboard-plus"></i></span>
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
                <p>2021 &copy; Soeng Souy</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://soengsouy.com">Soeng Souy</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection