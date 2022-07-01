<div class="page-content-wrapper py-3">
    <div class="add-new-contact-wrap">
        <a class="shadow" href="{{route('admin.bahanbakar.create')}}">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    <div class="container">
        <div class="element-heading">
            <h6>Bahan Bakar Minyak</h6>
        </div>
    </div>
    <div class="container">
        @foreach($bbm as $row)
        <div class="card timeline-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2">
                        <span class="badge mb-2 rounded-pill">{{$row->nama}}</span>
                        <h6>@currency($row->harga)</h6>
                    </div>
                    <div class="timeline-icon mb-2">
                        <div class="row">
                            <a class="btn m-1 btn-sm btn-circle btn-creative btn-warning" href="{{route('admin.bahanbakar.edit', $row->id)}}" data-bs-placement="left"><i class="bi bi-pencil-fill"></i></a>
                            <a href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$row->id}})' class="btn m-1 btn-sm btn-circle btn-creative btn-danger" data-bs-placement="left"><i class="bi bi-trash-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>