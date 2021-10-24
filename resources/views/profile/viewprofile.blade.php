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
                        <h3>View Profile</h3>
                        <p class="text-subtitle text-muted">staff information list</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Message</li>
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
                            <!-- action="{{ route('form/view/update') }}"-->
                            <form class="form form-horizontal"  method="POST">
                                @csrf
                                <input type="hidden" name="id" >
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label>Message Title</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control"
                                                           placeholder="Message title" id="first-name-icon" name="emailAddress">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Message Description</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <textarea  rows = "5" type="text" class="form-control" name="salary" placeholder="Write Your Message here"></textarea>
                                                    <br>
<!--                                                <div class="form-control-icon" >
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="col-md-4">
                                            <label>Send To</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sex" id="sex1">
                                                <label class="form-check-label" for="sex1">For All User</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sex" id="sex2">
                                                <label class="form-check-label" for="sex2">Specific User</label>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button  type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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
