@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col m-2">
            <div class="card m-3">
                <div class="card-body my-1">
                    <div class="card-header">
                        <h3>Input Akun Guru</h3>
                    </div>
                    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="form-label">Name</label>
                        <div class="input-group">
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="name"
                                aria-label="Username" aria-describedby="basic-addon11" />
                            <input type="hidden" name="role" value="guru" class="form-control" placeholder="name"
                                aria-label="Username" aria-describedby="basic-addon11" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <input type="text" name="username" value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror" placeholder="username"
                                aria-label="Username" aria-describedby="basic-addon11" />
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                aria-label="Recipient's username" aria-describedby="basic-addon13" />
                            <span class="input-group-text" id="basic-addon13">@example.com</span>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="basic-default-password12" placeholder="password"
                                    aria-describedby="basic-default-password2" />
                                <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                        class="bx bx-hide"></i></span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-header">
                    <h3>Input Guru</h3>
                </div>
                <div class="card-body">
                    <label class="form-label">Nama Guru</label>
                    <div class="input-group">
                        <input type="text" name="guru" value="{{ old('name') }}"
                            class="form-control @error('guru') is-invalid @enderror" placeholder="name"
                            aria-label="Username" aria-describedby="basic-addon11" />
                        @error('guru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label class="form-label">Foto Guru</label>
                    <div class="input-group">
                        <input type="file" name="file" value="{{ old('file') }}"
                            class="form-control @error('file') is-invalid @enderror" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                    <a href="{{ route('guru.index') }}" class="btn btn-danger mt-4">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
