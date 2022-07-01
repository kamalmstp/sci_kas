<div class="page-content-wrapper py-3">
    <div class="add-new-contact-wrap">
        <a class="shadow" href="{{route('admin.kas.create')}}">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
            <h6>Uang Masuk Operasional</h6>
        </div>
    </div>
    <div class="container">
        @foreach($kas as $row)
        <div class="card timeline-card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill">{{$row->no_umk}}</span>
                <h6>@currency($row->nominal)</h6>
                <div>
                <div class="form-check form-switch">
                    <input class="form-check-input form-check-success"wire:model.lazy="status" type="checkbox" role="switch" @if($row->status) checked @endif>
                </div>
                </div>
              </div>
              <div class="timeline-icon mb-2">
                <div class="row">
                    <a class="btn m-1 btn-sm btn-circle btn-creative btn-warning" href="{{route('admin.kas.edit', $row->id)}}" data-bs-placement="left"><i class="bi bi-pencil-fill"></i></a>
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