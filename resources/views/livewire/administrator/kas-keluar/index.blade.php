<div class="page-content-wrapper py-3">
    <div class="add-new-contact-wrap">
        <a class="shadow" href="{{route('admin.kaskeluar.create')}}">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    <div class="container">
        <div class="element-heading">
            <h6>Kas Keluar</h6>
        </div>
    </div>
    <div class="container">
        <div class="card direction-rtl">
            <div class="card-body">
                <p class="text-center">{{$kas->no_umk}}</p>
                <table class="table table-bordered caption-top">
                    <thead class="table-light">
                        <tr>
                            <th width="55%"><h6>Uang Kas</h6></th>
                            <th class="text-center"><span class="m-1 badge rounded-pill bg-primary">@currency($kas->nominal)</span></th>
                        </tr>
                        <tr>
                            <th width="55%"><h6>Pengeluaran</h6></th>
                            <th class="text-center"><span class="m-1 badge rounded-pill bg-warning">@currency($total_keluar)</span></th>
                        </tr>
                        <tr>
                            <th width="55%"><h6>Sisa Uang</h6></th>
                            <th class="text-center"><span class="m-1 badge rounded-pill bg-danger">@currency(($kas->nominal)-($total_keluar))</span></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="element-heading mt-3">
            <h6>Pengeluaran</h6>
        </div>
    </div>
    <div class="container">
        @foreach($kas_keluar as $row)
            <a class="affan-element-item" href="{{route('admin.kaskeluar.show', $row->id)}}">
                <div class="position-relative d-flex align-items-center justify-content-between">
                    <div class="back-button">
                        <h6 class="mb-1">{{date('d-m-Y', strtotime($row->tanggal))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                    </div>
                    <div class="setting-wrappe">
                        <h6 class="mt-0 mb-1">&nbsp;&nbsp;@currency($row->nominal)</h6>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>