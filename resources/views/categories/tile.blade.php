<div class="col-6 col-lg-4 mb-4">
    <a href="{{route('product.index', ['category' => $category->id])}}">
        <div class="category-card position-relative hover-shadow shadow-card">
            <img src="{{route('attachment.show.custom', [$category->attachment_id, '780', '520'], 1)}}" class="img-fluid rounded" alt="...">

            <div class="category-title position-absolute bottom-0 start-0 p-3">
                <h4 class="text-white text-shadow mb-0 text-capitalize" style="text-shadow: 0px 0px 10px black;"><strong>{{$category->name}}</strong></h5>
            </div>
        </div>
    </a>
</div>
