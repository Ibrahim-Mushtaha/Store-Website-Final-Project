@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-menu">
                        <ul class="menu">
                            @if($categoryID == '#')
                            <li class="sidebar-item active">
                                <a href="{{ url('form/view/categoryStore/'.'#') }}" class='sidebar-link'>
                                    <i class="bi bi-house-fill"></i>
                                    <span>All Category</span>
                                </a>
                            </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ url('form/view/categoryStore/'.'#') }}" class='sidebar-link'>
                                        <i class="bi bi-house-fill"></i>
                                        <span>All Category</span>
                                    </a>
                                </li>
                            @endif
                            <?php $i =0?>
                            @foreach($data as $category)
                                <?php $i++?>
                                    @if($categoryID == $category->id)
                                        <li class="sidebar-item active">
                                            <a href="{{ url('form/view/categoryStore/'.$category->id) }}" class='sidebar-link'>
                                                <i class="bi bi-inbox-fill"></i>
                                                <span>{{$category -> name}}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ url('form/view/categoryStore/'.$category->id) }}" class='sidebar-link'>
                                                <i class="bi bi-inbox-fill"></i>
                                                <span>{{$category -> name}}</span>
                                            </a>
                                        </li>
                                    @endif
                            @endforeach
                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9">
            <div class="card" style="margin-right: 16px; margin-top: 16px">
                <div class="card-body p-2" style="margin-right: 16px">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <span class="input-group-append" style="margin-left: 16px">
										<button class="btn btn-primary" type="button">Search</button>
									</span>
                    </div>
                </div>
            </div>
            <div class="row row-sm" style="margin-right: 16px">
                <?php $i =0?>
                @foreach($stores as $store)
                    <?php $i++?>
                <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                    <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                                </div>
                                <a href="#exampleModal2" data-bs-toggle="modal" data-bs-target="#Modal-location"><img src="{{Storage::url($store->image)}}"  width=100% height=300 alt=""></a>
                                <a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
                                </a>
                            </div>
                            <div class="text-center pt-3">
                                <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $store->name }}</h3>
                                <span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach


            </div>

            <footer style="margin-top: 132px;">
                <ul class="pagination product-pagination mr-auto float-left">
                    <li class="page-item page-prev disabled">
                        <a class="page-link" href="#" tabindex="-1">Prev</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item page-next">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </footer>
        </div>
    </div>

@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
