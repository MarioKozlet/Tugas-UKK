@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col m-2">
            <div class="card m-3">
                <div class="card-header my-1">
                    <h3>Input Master Kelas</h3>
                </div>
                <form action="{{ route('kelas.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <label for="defaultFormControlInput" class="form-label">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="defaultFormControlInput"
                            placeholder="Kelas" aria-describedby="defaultFormControlHelp" />
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                        <a href="{{ route('kelas.index') }}" class="btn btn-danger mt-4">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
