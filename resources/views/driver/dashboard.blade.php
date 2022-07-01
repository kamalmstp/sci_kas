@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="tiny-slider-one-wrapper">
        <div class="tiny-slider-one">
            <div>
                <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
                    <div class="h-100 d-flex align-items-center text-center">
                        <div class="container">
                            <h3 class="text-white mb-1">Budget Control</h3>
                            <p class="text-white mb-4">PT. Sucofindo UP Sungai Putting</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-3"></div>
    <div class="container">
        <div class="body-container">
            @foreach($sarana as $row)
                @if(($row->last_km) - ($row->new_km) <= 200)
                    <div class="alert custom-alert-3 alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-circle"></i>
                        <div class="alert-text">
                            <h6>Peringatan! Sarana {{$row->nama.' ('.$row->no_plat.')'}} {{($row->last_km) - ($row->new_km)}} KM lagi mencapai {{number_format($row->last_km)}} KM</h6>
                            <span>Silakan mengganti oli secepatnya</span>
                        </div>
                        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection