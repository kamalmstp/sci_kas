<div class="page-content-wrapper py-3">
    <div class="container">
    <div class="element-heading">
        <h6>Update Data UMK</h6>
    </div>
    </div>
    <div class="container">
    <div class="card">
        <div class="card-body">
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label class="form-label" for="no_umk">No UMK</label>
                <input type="hidden" wire:model="id_kas">
                <input class="form-control @error('no_umk') is-invalid @enderror" wire:model="no_umk" id="no_umk" type="text" placeholder="No UMK">
                @error('no_umk')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="nominal">Nominal</label>
                <input class="form-control @error('nominal') is-invalid @enderror" wire:model="nominal" id="nominal" type="number" placeholder="Nominal">
                @error('nominal')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="tanggal">Date</label>
                <input class="form-control @error('tanggal') is-invalid @enderror" wire:model="tanggal" id="tanggal" type="date" placeholder="Date">
                @error('tanggal')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
            <label class="form-label" for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" cols="3" rows="5" placeholder="Deskripsi Kode"></textarea>
            </div>
            <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Simpan
            <svg class="bi bi-arrow-right-short" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
            </svg>
            </button>
        </form>
        </div>
    </div>
    </div>
</div>