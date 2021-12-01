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
                    <h3>View All Categories</h3>
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
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                        <a class="btn btn-outline-primary btn-block" href="{{ url('form/view/category/create') }}">Add Category</a>
                    </div>
                </div>
                <br>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Category Name</th>
                            <th class="border-bottom-0">Category Image</th>
                            <th class="border-bottom-0">Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i =0?>
                        @foreach($data as $category)
                            <?php $i++?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$category->name}}</td>
                            <td><img src="{{Storage::url($category->image)}}" alt="" height=80 width=124></td>
                            <td>

                                <a class="btn btn-primary btn-sm" data-effect="effect-scale"
                                   data-id="test1" data-section_name="test1"
                                   data-description="test1" data-toggle="modal" href="{{ url('form/view/category/show/'.$category->id) }}"
                                   title="تعديل"><i class="bi bi-pen"></i></a>

                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                   data-id="test1" data-section_name="test1" data-toggle="modal"
                                   href="{{ url('form/view/category/delete/'.$category->id) }}" title="حذف"><i class="bi bi-trash"></i></a>

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
        <div class="footer clearfix mb-0 text-muted  ">
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
