@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Edit Category</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.update', $category->id) }}"> {{-- isset($category) ? route('admin.category.edit', $category->id) : --}}
                            @csrf
                            @if(isset($category)) @method('PUT') @endif
                            <div class="form-group mb-3">
                                <label for="name">Category</label>
                                <input type="text" name="name" class="form-control shadow-sm shadow-secondary" value="{{ old('name', $category->name ?? '') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 shadow-sm shadow-secondary"> {{-- {{ isset($category) ? 'Update' : 'Tambah' }} --}}
                                <i class="bi bi-pencil-square"></i> {{ isset($category) ? 'Update' : 'Add' }}
                            </button>

                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary mt-4 shadow-sm shadow-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection