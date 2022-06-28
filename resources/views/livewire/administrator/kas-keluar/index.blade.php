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
                {{date('d M Y', strtotime($row->tanggal))}}
                <i class="bi bi-chevron-right"></i><h6 class="mt-0 mb-1">&nbsp;&nbsp;@currency($row->nominal)</h6>
            </a>
            <!-- <a class="btn m-1 btn-danger" href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$row->id}})'>
                <i class="bi bi-trash-fill"></i>
            </a> -->
        @endforeach
    </div>
</div>