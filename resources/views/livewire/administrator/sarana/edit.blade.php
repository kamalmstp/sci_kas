<div class="page-content-wrapper py-3">
    <div class="container">
    <div class="element-heading">
        <h6>Update Data Sarana</h6>
    </div>
    </div>
    <div class="container">
    <div class="card">
        <div class="card-body">
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label class="form-label" for="nama">Nama Sarana</label>
                <input type="hidden" wire:model="id_sarana">
                <input class="form-control @error('nama') is-invalid @enderror" wire:model="nama" id="nama" type="text" placeholder="Nama Sarana">
                @error('nama')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="no_plat">Nomor Plat</label>
                <input class="form-control @error('no_plat') is-invalid @enderror" wire:model="no_plat" id="no_plat" type="text" placeholder="Nomor Plat">
                @error('no_plat')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="last_km">KM (service selanjutnya)</label>
                <input class="form-control @error('last_km') is-invalid @enderror" wire:model="last_km" id="last_km" type="number" placeholder="KM">
                @error('last_km')
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