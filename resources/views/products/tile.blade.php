<section>

        <div class="container py-5">
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                @if ($product->attachment)
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">

                                    <div class="bg-image hover-zoom ripple rounded ripple-surface d-md-flex justify-content-md-center">
                                        <img src="{{route('attachment.show.custom', [$product->image, '342', '385'])}}"  class="d-none d-md-block img-fluid"/>
                                        <img src="{{route('attachment.show.custom', [$product->image, '684', '711'])}}"  class="d-block d-md-none img-fluid"/>
                                        <a href="{{route('product.show',$product)}}">
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{$product->name}}</h5>

                                        <!--Categorias -->

                                        @foreach($product->categories as $product_category)
                                        <div class="mb-2 text-muted small">
                                            <span class="text-primary"> • </span>
                                            <span class="text-capitalize">{{$product_category->category->name}}<br /></span>
                                        </div>
                                        @endforeach

                                    <p class=" mb-4 mb-md-0">{{$product->description}}</p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">€{{$product->price}}</h4>
                                    </div>
                                    <div class="d-flex flex-column mt-4">
                                        <a href="{{route('product.show',$product)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-cutlery"></i>&nbsp; Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
