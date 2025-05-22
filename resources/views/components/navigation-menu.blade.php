<nav class="nav flex-column" id="sidebarMenu">
      <x-nav-link :active="request()->routeIs('dashboard')" href="{{route('dashboard')}}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </x-nav-link>
      <hr style="margin: 0">  
      <x-nav-link :active="request()->routeIs('peminjaman')" href="{{route('peminjaman')}}">
        <i class="bi bi-file-earmark-text me-2"></i></i> Peminjaman
      </x-nav-link> 
      <hr style="margin: 0"> 
      <x-nav-link :active="request()->routeIs('pemberkasan')" href="{{route('pemberkasan')}}">
        <i class="bi bi-archive me-2"></i> Pemberkasan
      </x-nav-link> 
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
        <x-nav-link :active="request()->routeIs('control')" href="{{route('control')}}">
          <i class="bi bi-person-fill-gear"></i> Kontrol
        </x-nav-link> 
        <hr style="margin: 0">
        <x-nav-link :active="request()->routeIs('regist')" href="{{route('regist')}}">
          <i class="bi bi-person-add"></i> Tambah
        </x-nav-link> 
      </div>
    </nav>