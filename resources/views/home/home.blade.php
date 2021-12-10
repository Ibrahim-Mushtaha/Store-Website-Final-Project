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
                    <form class="form form-horizontal" method="GET" action="{{ route('form/view/search/') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search ...">
                        <span class="input-group-append" style="margin-left: 16px">
										<button class="btn btn-primary" type="submit">Search</button>
									</span>
                    </div>
                    </form>
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
                                        <button class=" m-auto btn btn-primary w-50"  data-bs-toggle="modal" data-bs-target="#edit{{$store->id}}">
                                            <i class="ion ion-md-star text-warning"></i> Rating</button>
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



                <div class="modal fade" id="edit{{$store->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Rating {{ $store->name }}</h5>
                        </div>
                        <div class="modal-body m-auto">
                            <div class="card-body pt-0 ">
                                @if(count($store->ratings) > 0 )
                                @foreach ($store->ratings as $ra )
                                @if($ra->user_id == $_SERVER['REMOTE_ADDR'])
                                    <form method="POST" action="{{URL("form/view/rating/update")}}" >
                                        @csrf
                                        @method("PUT")
                                     <div>
                                         <div class="rate">
                                        <input  type="radio" id="star5" name="rate" value="5"  @if (ceil($ra->rate) == 5)
                                                checked
                                        @endif/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4"  @if (ceil($ra->rate) == 4)
                                        checked
                                        @endif />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" @if (ceil($ra->rate) == 3)
                                        checked
                                        @endif  />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" @if (ceil($ra->rate) == 3)
                                        checked
                                            @endif />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" @if (ceil($ra->rate) == 1)
                                        checked
                                        @endif />
                                        <label for="star1" title="text">1 star</label>
                                        <input type="hidden" id="store_id" name="store_id" value="{{$store->id}}" />
                                        <input type="hidden" name="userIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                    </div>
                                    <div class="action">
                                        <button class="add-to-cart btn btn-success" type="submit">Send Rating</button>
                                    </div>
                                   </form>
                                   @break
                                   @endif
                                   @if ($loop->index+1 == count($store->ratings))
                                   <form method="POST" action="{{URL("form/view/rating") }}" >
                                    @csrf
                                        <div class="rate">
                                            <input  type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2"  checked/>
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1"/>
                                            <label for="star1" title="text">1 star</label>
                                            <input type="hidden" id="store_id" name="store_id" value="{{$store->id}}" />
                                            <input type="hidden" name="userIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                        </div>
                                        <div class="action">
                                            <button class="add-to-cart btn btn-success" type="submit">Send Rating</button>
                                        </div>
                                   </form>
                                   @endif
                                   @endforeach
                                @else
                                <form method="POST" action="{{URL("form/view/rating") }}" >
                                    @csrf
                                        <div class="rate">
                                            <input  type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" checked/>
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1"/>
                                            <label for="star1" title="text">1 star</label>
                                            <input type="hidden" id="store_id" name="store_id" value="{{$store->id}}" />
                                            <input type="hidden" name="userIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                        </div>
                                        <div class="action">
                                            <button class="add-to-cart btn btn-success" type="submit">Send Rating</button>
                                        </div>
                                   </form>
                                @endif
                            </div>
                        </div>
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
