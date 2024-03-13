@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col m-2">
            <div class="card m-3">
                <div class="card-body my-1">
                    <div class="card-header">
                        <h4>Input Akun Admin</h4>
                    </div>
                    <form action="{{ route('manajemenuser.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label class="form-label">Name</label>
                        <div class="input-group">
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                placeholder="name" aria-label="Username" aria-describedby="basic-addon11" />
                        </div>

                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                                placeholder="username" aria-label="Username" aria-describedby="basic-addon11" />
                        </div>

                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                                placeholder="email" aria-label="Recipient's username" aria-describedby="basic-addon13" />
                            <span class="input-group-text" id="basic-addon13">@example.com</span>
                        </div>

                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="basic-default-password12"
                                    placeholder="password" aria-describedby="basic-default-password2" />
                                <input type="hidden" name="role" value="admin" class="form-control" placeholder="name"
                                    aria-label="Username" aria-describedby="basic-addon11" />
                                <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                        class="bx bx-hide"></i></span>
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
