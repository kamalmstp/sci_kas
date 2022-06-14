<div class="page-content-wrapper py-3">
    <div class="add-new-contact-wrap">
        <a class="shadow" href="{{route('admin.cat.create')}}">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    <div class="container">
        <!-- Element Heading -->
        <div class="element-heading mt-3">
            <h6>Category Code</h6>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                @foreach($category as $row)
                <div class="accordion" id="basicaccordion">
                    <!-- Single Accordion -->
                    <div class="accordion-item">
                        <div class="accordion-header" id="heading{{$row->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$row->id}}" aria-expanded="true" aria-controls="collapse{{$row->id}}">
                                {{$row->kode}}
                            </button>
                        </div>
                        <div class="accordion-collapse collapse" id="collapse{{$row->id}}" aria-labelledby="heading{{$row->id}}" data-bs-parent="#basicaccordion">
                            <div class="accordion-body">
                            <p class="mb-0">{{$row->keterangan}}</p>
                                <div class="row">
                                    <!-- <div class="text-end"> -->
                                    <a class="btn m-1 btn-sm btn-circle btn-creative btn-warning" href="{{route('admin.cat.edit', $row->id)}}" data-bs-placement="left"><i class="bi bi-pencil-fill"></i></a>
                                    <button wire:click="destroy({{$row->id}})" class="btn m-1 btn-sm btn-circle btn-creative btn-danger" data-bs-placement="left"><i class="bi bi-trash-fill"></i></button>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>