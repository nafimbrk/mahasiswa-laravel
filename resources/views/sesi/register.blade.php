@extends('layout/aplikasi')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>register</h1>
        <form action="/sesi/create" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Session::get('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Session::get('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button class="btn btn-primary" type="submit" name="submit">register</button>
        </div>
    </form>
    <a href="{{ url('sesi') }}">login</a>
</div>
@endsection