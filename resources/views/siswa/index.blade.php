@extends('layout/aplikasi')

@section('konten')
<a class="btn btn-primary" href="/siswa/create">tambah</a>
    <table class="table">
        <thead>
            <tr>
                <th>foto</th>
                <th>nomor induk</th>
                <th>nama</th>
                <th>alamat</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->foto)
                            <img style="max-width: 50px; max-height: 50px;" src="{{ url('foto') . '/' . $item->foto }}" alt="">
                        @endif
                    </td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="{{ url('/siswa/' . $item->nomor_induk) }}">detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/siswa/' . $item->nomor_induk . '/edit') }}">edit</a>
                        <form action="{{ '/siswa/' . $item->nomor_induk }}" method="post" class="d-inline" onsubmit="return confirm('yakin mau hapus data')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection