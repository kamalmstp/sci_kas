<div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">
    <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas-body p-0">
    <div class="sidenav-wrapper">
        <div class="sidenav-profile bg-gradient">
        <div class="sidenav-style1"></div>
        <div class="user-profile"><img src="{{asset('img/bg-img/2.jpg')}}" alt=""></div>
        <div class="user-info">
            <h6 class="user-name mb-0">Username</h6><span>Jabatan</span>
        </div>
        </div>
        <ul class="sidenav-nav ps-0">
            <li><a href="/" data-turbolinks="true"><i class="bi bi-house-door"></i>Home</a></li>
        @if(auth()->user()->level === App\Models\User::ADMIN)
            <!-- <li><a href="{{route('admin.nota.index')}}"><i class="bi bi-receipt-cutoff"></i>Nota</a></li> -->
            <li><a href="{{route('admin.cat.index')}}" data-turbolinks="true"><i class="bi bi-upc"></i>Kode</a></li>
            <li><a href="{{route('admin.sarana.index')}}"><i class="bi bi-truck"></i>Sarana</a></li>
            <li><a href="{{route('admin.setting.index')}}"><i class="bi bi-gear"></i>Settings</a></li>
        @elseif(auth()->user()->level === App\Models\User::DRIVER)
            <li><a href="{{route('driver.bbm.index')}}"><i class="bi bi-speedometer"></i>Nota BBM</a></li>
        @endif
        <li>
            <div class="night-mode-nav"><i class="bi bi-moon"></i>Night Mode
            <div class="form-check form-switch">
                <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
            </div>
            </div>
        </li>
        <li><a href="javascript:void(0)" onclick="confirmLogout()"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
        </ul>
        <div class="copyright-info">
        <!-- <p>2022 &copy; Made by<a href="#">Mustapa Ahmad Kamal</a></p> -->
        <p>2022 &copy; PT. Sucofindo UP Sei. Putting</p>
        </div>
    </div>
    </div>
</div>