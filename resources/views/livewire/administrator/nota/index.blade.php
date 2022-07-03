<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
            <h6>Nota BBM</h6>
        </div>
    </div>
    <div class="container">
        @foreach($nota as $row)
        <div class="card timeline-card bg-secondary">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="timeline-text mb-2">
                <span class="badge mb-2 rounded-pill">{{$row->nama.'  ('.$row->no_plat.') '}}</span> - <span class="badge bg-light text-dark">{{'KM '.$row->km}}</span>
                <h6>@currency($row->nominal)</h6>
              </div>
              <div class="timeline-icon mb-2">
                <div class="row">
                  @if($row->forward_status == 0)
                    <button wire:click.prevent="forward({{ $row->id }})" class="btn m-1 btn-sm btn-circle btn-creative btn-warning" data-bs-placement="left"><i class="bi bi-save2-fill"></i></button>
                  @else
                  @endif
                    <a class="btn m-1 btn-sm btn-circle btn-creative btn-success" href="{{route('admin.nota.show', $row->id)}}" data-bs-placement="left"><i class="bi bi-eye"></i></a>
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