<header class="navbar">
    <h1>Admin HRIS</h1>
    {{-- Tambah tombol logout dll --}}
    <li class="sidebar-item">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="sidebar-link btn btn-link text-start"
                style="color: inherit; text-decoration: none; padding:0 1rem; width:100%;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>
</header>