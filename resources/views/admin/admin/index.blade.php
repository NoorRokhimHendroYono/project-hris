@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Daftar Admin</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm shadow-secondary"> {{-- Sedikit Shadow buat Card --}}
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Data Admin</h4>

                        {{-- Search form Tengah, Responsive, Clean | submit ke controller untuk filtering dari server. --}}
                        <form method="GET" action="{{ route('admin.admins.list') }}"
                            class="d-flex shadow-sm shadow-secondary" style="flex: 1; max-width: 300px; margin: 0 auto;">
                            <div class="input-group input-group-sm w-100">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama/email admin..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>
                        </form>


                        <a href="{{ route('admin.internal-create-admin') }}" class="btn btn-primary shadow-sm shadow-secondary">
                            <i class="bi bi-person"></i> + {{-- <i class="bi bi-person-plus"></i> Admin Baru --}}
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive datatable-minimal">
                            <table id="tableAdmin" class="table table-striped"> {{-- class="table table-striped" | class="table dataTable no-footer" --}}
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $index => $admin)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->created_at->format('d M Y') }}</td>
                                            <td>
                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                {{-- Tombol Hapus --}}
                                                <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirmDelete(this)">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada data admin.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $admins->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- SweetAlert Confirm Delete --}}
    <script>
        function confirmDelete(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Delete Account Admin ini?',
                text: "Data Admin akan dihapus PERMANEN!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // Merah
                cancelButtonColor: '#6c757d', // Abu-abu
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
            return false;
        }
    </script>
@endsection