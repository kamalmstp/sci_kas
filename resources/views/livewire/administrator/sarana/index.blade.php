<div class="page-content-wrapper py-3">
    <div class="add-new-contact-wrap">
        <a class="shadow" href="{{route('admin.sarana.create')}}">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    <div class="container">
        <div class="element-heading">
            <h6>Sarana</h6>
        </div>
    </div>
    <div class="container">
        @foreach($sarana as $row)
            <div class="card timeline-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2">
                        <span class="badge mb-2 rounded-pill">{{$row->nama}}</span> - <span class="badge bg-light text-dark">KM {{$row->last_km}}</span>
                        <h6>{{$row->no_plat}}</h6>
                    </div>
                    <div class="timeline-icon mb-2">
                        <div class="row">
                            <a class="btn m-1 btn-sm btn-circle btn-creative btn-warning" href="{{route('admin.sarana.edit', $row->id)}}" data-bs-placement="left"><i class="bi bi-pencil-fill"></i></a>
                            <a href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$row->id}})' class="btn m-1 btn-sm btn-circle btn-creative btn-danger" data-bs-placement="left"><i class="bi bi-trash-fill"></i></a>
                        </div>
                    </div>
                    </div>
                    <p class="mb-2">{{$row->keterangan}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>