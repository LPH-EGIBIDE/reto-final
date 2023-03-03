<div class="col-6 col-lg-4 mb-4">
    <a href="#">
        <div class="category-card position-relative hover-shadow shadow-card">
            <img src="{{route('attachment.show.custom', [$category->attachment_id, '780', '520'], 1)}}" class="img-fluid rounded" alt="...">

            <div class="category-title position-absolute bottom-0 start-0 p-3">
                <h5 class="text-white mb-0">{{$category->name}}</h5>
            </div>
        </div>
    </a>
</div>
