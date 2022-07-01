<div class="page-content-wrapper py-3">
    <div class="container">
    <div class="element-heading">
        <h6>Upload Nota BBM Baru</h6>
    </div>
    </div>
    <div class="container">
    <div class="card">
        <div class="card-body">
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group form-file">
                <label class="form-label" for="photo">Upload Foto Nota</label>
                <input class="form-control" type="file" wire:model="photo" accept="image/*">
                    <!-- <label class="form-file-label justify-content-center" for="customFile"><span class="form-file-button btn btn-danger d-flex align-items-center justify-content-center shadow-lg">
                        <svg class="bi bi-plus-circle me-2" width="22" height="22" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                        </svg>Upload Foto Nota</span>
                    </label> -->
            </div>

            <div class="form-group">
                <label class="form-label" for="id_sarana">Sarana</label>
                <select class="form-select" wire:model="id_sarana" aria-label="Sarana">
                  <option value="">-Sarana-</option>
                  @foreach($sarana as $sar)
                    <option value="{{$sar->id}}">{{$sar->nama.' ('.$sar->no_plat.')'}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="id_bbm">Jenis Bahan Bakar</label>
                <select class="form-select" wire:model="id_bbm" aria-label="Bahanbakar">
                  <option value="">-Bahanbakar-</option>
                  @foreach($bbm as $row)
                    <option value="{{$row->id}}">{{$row->nama}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="nominal">Nominal</label>
                <input class="form-control @error('nominal') is-invalid @enderror" wire:model="nominal" type="number" placeholder="Nominal">
                @error('nominal')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="km">Kilometer</label>
                <input class="form-control @error('km') is-invalid @enderror" wire:model="km" type="number" placeholder="KM">
                @error('km')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="datetime">Tanggal</label>
                <input class="form-control @error('datetime') is-invalid @enderror" wire:model="datetime" type="datetime-local" placeholder="Nomor Plat">
                @error('datetime')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
            <label class="form-label" for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" wire:model="keterangan" cols="3" rows="5" placeholder="Keterngan, jika ada"></textarea>
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