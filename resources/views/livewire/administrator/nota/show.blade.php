<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card product-details-card mb-3"> 
            <!-- <span class="badge bg-warning text-dark position-absolute product-badge">Sale -10%</span> -->
            <div class="card-body">
                <div class="product-gallery-wrapper">
                    <div class="product-gallery">
                        <a href="{{asset('storage/nota/'.$detail->photo)}}">
                            <div class="text-center">
                            <img class="rounded" src="{{ asset('storage/nota/'.$detail->photo) }}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>