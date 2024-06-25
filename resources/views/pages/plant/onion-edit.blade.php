@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="h4 mb-0 text-info">Form Data Edit Pertumbuhan Tanaman Bayam</h4>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('plant.onion.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="height">Tinggi Tanaman*</label>
                        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror"
                            name="height" value="{{ $onion->height }}" required autofocus />
                        @error('height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Upload Gambar</label>
                        <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file"
                            name="file" accept="image/png, image/jpg, image/jpeg">
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input name="uuid" type="hidden" value="{{ $onion->uuid }}">

                    <button type="submit" class="btn mt-4 btn-green">
                        {{ __('Edit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
