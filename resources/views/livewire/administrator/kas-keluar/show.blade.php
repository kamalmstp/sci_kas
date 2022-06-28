<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="element-heading">
            <h6>Detail Pengeluaran</h6>
        </div>
    </div>
    <div class="container">
        <div class="card direction-rtl">
            <div class="card-body">
                <p>{{$detail->pengeluaran}}</p>
                <p>{{$detail->nominal}}</p>
                <p>{{$detail->tanggal}}</p>
                <p>{{$detail->kode." - ".$detail->cat_keterangan}} </p>
                <p>{{$detail->no_umk}} </p>
                <p>{{$detail->nama_karyawan}} </p>
                <p>{{$detail->id_kk}} </p>
                <div class="text-center">
                    <a class="btn m-1 btn-danger" href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$detail->id_kk}})'>
                        <i class="bi bi-trash-fill"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>