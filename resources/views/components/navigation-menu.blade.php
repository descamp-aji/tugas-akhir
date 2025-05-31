<nav class="nav flex-column" id="sidebarMenu">
      <a wire:navigate wire:current.exact="active" class="nav-link" href="{{route("dashboard")}}"> 
        <i class="bi bi-speedometer2 me-2"></i> Dashboard 
      </a>
      <hr style="margin: 0">
      <a wire:current="active" class="nav-link" href="{{route("transaksi")}}"> 
        <i class="bi bi-bag me-2"></i> Transaksi 
      </a>
      <hr style="margin: 0">
      <a wire:current="active" class="nav-link" href="{{route("pengemasan")}}"> 
        <i class="bi bi-archive me-2"></i> Pengemasan 
      </a>
      <hr style="margin: 0"> 

      <!-- Menu dengan Submenu -->

      <a
        class="nav-link d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse"
        href="#submenuUsers"
        role="button"
        aria-expanded="false"
        aria-controls="submenuUsers"
      >
        <span><i class="bi bi-people me-2"></i> Pengguna</span>
        <i class="bi bi-chevron-down small"></i>
      </a>
      <div class="collapse submenu" id="submenuUsers" data-bs-parent="#sidebarMenu">
        <a wire:current="active" class="nav-link" href="{{route("control")}}"> 
          <i class="bi bi-person-fill-gear me-1"></i> Kontrol 
        </a>
        <a wire:current="active" class="nav-link" href="{{route("regist")}}"> 
          <i class="bi bi-person-add me-1"></i> Tambah 
        </a>
      </div>
    </nav>