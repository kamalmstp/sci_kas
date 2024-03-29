<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="element-heading">
            <h6>Data Semua Nota BBM</h6>
        </div>
    </div>
    <div class="container">
        @foreach($nota as $row)
        <div class="card timeline-card bg-dark">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="timeline-text mb-2">
                <span class="badge mb-2 rounded-pill">{{$row->nama.'  ('.$row->no_plat.') '}}</span> - <span class="badge bg-light text-dark">{{'KM '.$row->km}}</span>
                <h6>@currency($row->nominal)</h6>
              </div>
              <div class="timeline-icon mb-2">
                <div class="row">
                    <a class="btn m-1 btn-sm btn-dark" href="{{route('driver.bbm.show', $row->id)}}" >Lihat Nota</a>
                </div>
              </div>
            </div>
            <p class="mb-2">{{$row->keterangan}}</p>
          </div>
        </div>
        @endforeach
    </div>
</div>