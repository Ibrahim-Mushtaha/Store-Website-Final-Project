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
                        <h3>Add Store</h3>
                        <p class="text-subtitle text-muted">staff information list</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Store</li>
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
                                  enctype="multipart/form-data" action="{{ route('form/view/store/store') }}">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label>Store Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                           placeholder="Store Name" id="first-name-icon"
                                                           name="store_name">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-inbox-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                           placeholder="Description" id="first-name-icon"
                                                           name="store_description">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-inbox-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Category Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="form-group position-relative has-icon-left mb-4">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" name="category_id" id="category_id">
                                                            <option selected disabled>Select Category Name</option>
                                                            @foreach($categories as $key => $item)
                                                                <option
                                                                    value="{{$item->id}}">{{ $item->name  }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-exclude"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="form-check form-check-lg d-flex align-items-end">
                                                    <input class="form-check-input me-2" type="checkbox" value="1"
                                                           name="featured_store">
                                                    <label class="form-check-label text-gray-600"
                                                           for="flexCheckDefault">
                                                        Featured Store
                                                    </label>
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
                                                        <p class="text-danger">* file format must be jpeg ,.jpg ,
                                                            png </p>
                                                        <input type="file" name="pic" class="dropify"
                                                               accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                               data-height="70"/>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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
