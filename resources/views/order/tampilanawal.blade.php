@extends('order.main')

@section('content')
    {{-- <div class="container">
            @foreach ($products as $p) --}}
                <div class="container">
                    <div class="new-arrivals-content">
                        <div class="row">
                            @foreach ($products as $p)
                            <div class="col-md-3 col-sm-4">
                                <div class="single-new-arrival">
                                    <div class="single-new-arrival-bg">
                                        <img width="10" height="250" src="{{ url('storage') }}/{{ $p->foto }}"
                                            class="card-img-top" alt="...">
                                        <div class="single-new-arrival-bg-overlay"></div>
                                        <div class="new-arrival-cart">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <a href="{{ url('pesan') }}/{{ $p->id_product }}">add <span>to </span>
                                                    cart</a>
                                            </p>
                                            <p class="arrival-review pull-right">
                                                <span class="lnr lnr-heart"></span>
                                                <span class="lnr lnr-frame-expand"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <h4><a href="#"><strong>{{ $p->nama_product }}</strong></a></h4>
                                    <p class="arrival-product-price">Stok : {{ $p->stok }}</p>
                                    <p class="arrival-product-price">Rp. {{ $p->harga_jual }}</p>
                                    {{-- <a href=" " class="btn btn-primary"><i
                                            class="fa fa-shopping-cart"></i>Pesan</a> --}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            {{-- @endforeach
            <br><br>
            {{ $products->links() }}
        </div> --}}
@endsection
