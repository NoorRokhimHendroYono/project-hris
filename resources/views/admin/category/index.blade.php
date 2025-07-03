@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Data Category</h3>
    </div>

    <div class="page-cotent">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm shadow-secondary"> {{-- Sedikit Shadow buat Card --}}
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-2 mb-md-0">Daftar Category</h4>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary shadow-sm shadow-secondary">
                            <i class="bi bi-pencil-square"></i> + {{-- class ini berbentuk document | class="bi
                            bi-file-earmark-ruled" --}}
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive datatable-minimal">
                            <table id="tableCategory" class="table table-striped" style="width: 100%"> {{-- class="table table-striped" | class="table dataTable no-footer" --}}
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $index => $category)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $category->name ?? '-' }}</td>
                                            
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-outline-warning">
                                                    <i class="bi bi-pencil-square"></i>Edit
                                                </a>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
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
                                            <td colspan="7" class="text-center">Belum ada data Category.</td>
                                        </tr>            
                                    @endforelse
                                </tbody>
                            </table>
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
                title: 'Delete Catgory ini?',
                text: "Data Category akan dihapus PERMANEN!",
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
    <!-- <a href="{{ route('admin.category.create') }}"
            class="btn icon icon-left btn-outline-primary d-inline-flex align-items-center gap-1">
            <i data-feather="edit"></i>+ Tambah Kategori
        </a> -->

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#tableCategory').DataTable();
            });
        </script>
    @endpush
    
@endsection