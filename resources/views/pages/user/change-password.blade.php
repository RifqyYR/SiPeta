@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-info">Form Ubah Password</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('update-password') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="newPassword">Password Baru*</label>
                        <input id="newPassword" type="password"
                            class="form-control @error('newPassword') is-invalid @enderror" name="newPassword"
                            value="{{ old('newPassword') }}" required autofocus />
                        @error('newPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirmNewPassword">Konfirmasi Password Baru*</label>
                        <input id="confirmNewPassword" type="password"
                            class="form-control @error('confirmNewPassword') is-invalid @enderror" name="confirmNewPassword"
                            value="{{ old('confirmNewPassword') }}" required autofocus />
                        @error('confirmNewPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-green mt-4">
                        {{ __('Ubah') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
