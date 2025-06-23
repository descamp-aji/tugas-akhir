<nav class="nav flex-column" id="sidebarMenu">
      @if (auth()->user()->role == 'admin')
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{route("dashboard")}}"> 
          <i class="bi bi-speedometer2 me-2"></i> Dashboard 
        </a>
      @endif
      <!-- Menu dengan Submenu -->
      {{-- Submenu Transaksi --}}
      <hr style="margin: 0">
      <a
        class="nav-link d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse"
        href="#submenuTransaction"
        role="button"
        aria-expanded="false"
        aria-controls="submenuTransaction"
      >
        <span><i class="bi bi-bag me-2"></i> Transaksi</span>
        <i class="bi bi-chevron-down small"></i></i>
      </a>
      <div class="collapse submenu" id="submenuTransaction" data-bs-parent="#sidebarMenu">
        <a wire:current="active" class="nav-link" href="{{route("cariDokumen")}}"> 
          <i class="bi bi-clipboard-plus me-1"></i> Cari Dokumen 
        </a>
        <hr style="margin: 0">
        <a wire:current="active" class="nav-link" href="{{route("peminjaman")}}"> 
          <i class="bi bi-clipboard-minus me-1"></i> Peminjaman 
        </a>
        <hr style="margin: 0">
        <a wire:current="active" class="nav-link" href="{{route("konfirmasi")}}"> 
          <i class="bi bi-clipboard-check me-1"></i> Konfirmasi Transaksi 
        </a>
      </div>
      <hr style="margin: 0">
      {{-- Submenu Pengemasan --}}
      @if (auth()->user()->role == 'admin')
      <a
        class="nav-link d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse"
        href="#submenuPacking"
        role="button"
        aria-expanded="false"
        aria-controls="submenuPacking"
      >
        <span><i class="bi bi-archive me-2"></i> Pengemasan</span>
        <i class="bi bi-chevron-down small"></i>
      </a>
      <div class="collapse submenu" id="submenuPacking" data-bs-parent="#sidebarMenu">
        <hr style="margin: 0">
        <a wire:current="active" class="nav-link" href="{{route("wajibPajak")}}"> 
          <i class="bi bi-tag me-1"></i> Input Wajib Pajak 
        </a>
        <hr style="margin: 0">
        <a wire:current="active" class="nav-link" href="{{route("kemasan")}}"> 
          <i class="bi bi-box2 me-1"></i> Input Kemasan 
        </a>
        <a wire:current="active" class="nav-link" href="{{route("berkas")}}"> 
          <i class="bi bi-file-earmark-check me-1"></i> Input Berkas 
        </a>
      </div>
      <hr style="margin: 0">
      @endif
      {{-- Sub menu Pengguna --}}
      @if (auth()->user()->role =='admin')
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
        <hr style="margin: 0">
        <a wire:current="active" class="nav-link" href="{{route("regist")}}"> 
          <i class="bi bi-person-add me-1"></i> Tambah 
        </a>
      </div>
      <hr style="margin: 0">
      @endif
    </nav>