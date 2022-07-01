<div class="page-content-wrapper py-3">
    <div class="container">
    <div class="element-heading">
        <h6>Create Data Bahan Bakar</h6>
    </div>
    </div>
    <div class="container">
    <div class="card">
        <div class="card-body">
        <form wire:submit.prevent="store">
            <div class="form-group">
                <label class="form-label" for="nama">Nama Bahan Bakar</label>
                <input class="form-control @error('nama') is-invalid @enderror" wire:model="nama" type="text" placeholder="Nama Bahan Bakar">
                @error('nama')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="harga">Harga Satuan</label>
                <input class="form-control @error('harga') is-invalid @enderror" wire:model="harga" id="harga" type="number" placeholder="Harga Satuan">
                @error('harga')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
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