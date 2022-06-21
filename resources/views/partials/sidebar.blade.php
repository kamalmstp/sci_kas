<div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">
    <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas-body p-0">
    <div class="sidenav-wrapper">
        <div class="sidenav-profile bg-gradient">
        <div class="sidenav-style1"></div>
        <div class="user-profile"><img src="img/bg-img/2.jpg" alt=""></div>
        <div class="user-info">
            <h6 class="user-name mb-0">Username</h6><span>Jabatan</span>
        </div>
        </div>
        <ul class="sidenav-nav ps-0">
        <li><a href="/" data-turbolinks="true"><i class="bi bi-house-door"></i>Home</a></li>
        <li><a href="{{route('admin.kas.index')}}"><i class="bi bi-cash"></i>Kas Masuk</a></li>
        <li><a href="{{route('admin.kaskeluar.index')}}"><i class="bi bi-cash-stack"></i>Kas Keluar</a></li>
        <li><a href="{{route('admin.nota.index')}}"><i class="bi bi-receipt-cutoff"></i>Nota</a></li>
        <li><a href="{{route('admin.cat.index')}}" data-turbolinks="true"><i class="bi bi-upc"></i>Kode</a></li>
        <li><a href="{{route('admin.setting.index')}}"><i class="bi bi-gear"></i>Settings</a></li>
        <li>
            <div class="night-mode-nav"><i class="bi bi-moon"></i>Night Mode
            <div class="form-check form-switch">
                <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
            </div>
            </div>
        </li>
        <li><a href="#"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
        </ul>
        <div class="copyright-info">
        <!-- <p>2022 &copy; Made by<a href="#">Mustapa Ahmad Kamal</a></p> -->
        <p>2022 &copy; PT. Sucofindo UP Sei. Putting</p>
        </div>
    </div>
    </div>
</div>