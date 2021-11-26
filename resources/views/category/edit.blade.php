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
                        <h3>Add Category</h3>
                        <p class="text-subtitle text-muted">staff information list</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Display Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST"
                                  enctype="multipart/form-data"  action="{{ url('form/view/categories/update/'.$category[0]->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" >
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label>Category Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                           placeholder="Category Name" id="first-name-icon" name="category_name" value="{{ $category[0]->name }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-inbox-fill"></i>
                                                    </div>
                                                </div>
                                                <br>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Attachment</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <div class="col-sm-12 col-md-12">
                                                        <p class="text-danger">* file format must be jpeg ,.jpg , png </p>
                                                        <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                               data-height="70" />
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button  type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <!-- <a href="{{ route('form/view/detail') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
