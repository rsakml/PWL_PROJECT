@extends('order.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mt-1">
            <nav aria-label="breadcrumb">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home1') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Menu</li>
                </ol> --}}
            </nav>
        </div>
            @foreach ($products as $p)
                    <div class="container">
                        <div class="new-arrivals-content">
                            <br><br><br>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <div class="single-new-arrival">
                                        <div class="single-new-arrival-bg">
                                            <img width="10" height="250" src="{{ url('img') }}/{{ $p->foto }}" class="card-img-top"
                            alt="...">
                                            <div class="single-new-arrival-bg-overlay"></div>
                                            <div class="sale bg-1">
                                                <p>sale</p>
                                            </div>
                                            <div class="new-arrival-cart">
                                                <p>
                                                    <span class="lnr lnr-cart"></span>
                                                    <a href="{{url('pesan')}}/{{$p->id_product}}">add <span>to </span> cart</a>
                                                </p>
                                                <p class="arrival-review pull-right">
                                                    <span class="lnr lnr-heart"></span>
                                                    <span class="lnr lnr-frame-expand"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <h4><a href="#">{{ $p->nama_product }}</a></h4>
                                        <p class="arrival-product-price">Rp. {{ $p->harga_jual }}</p>
                                        {{-- <a href=" " class="btn btn-primary"><i
                                            class="fa fa-shopping-cart"></i>Pesan</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            <br><br>
            {{$products -> links()}}
        </div>
    </div>
@endsection
