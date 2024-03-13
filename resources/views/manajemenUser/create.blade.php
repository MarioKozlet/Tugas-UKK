@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col m-2">
            <div class="card m-3">
                <div class="card-body my-1">
                    <div class="card-header">
                        <h3>Input Akun Admin</h3>
                    </div>
                    <form action="{{ route('manajemenuser.store') }}" method="POST">
                        @csrf
                        <label class="form-label">Name</label>
                        <div class="input-group">
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="name"
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
                                <input type="hidden" name="role" value="admin" class="form-control" placeholder="name"
                                    aria-label="Username" aria-describedby="basic-addon11" />
                                <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                        class="bx bx-hide"></i></span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                        <a href="{{ route('manajemenuser.index') }}" class="btn btn-danger mt-4">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
