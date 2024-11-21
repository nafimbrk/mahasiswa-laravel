@extends('layoutcontoh/aplikasi')

@section('konten')
    
<h1>{{ $halaman_judul }}</h1>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores laborum dolore doloremque sint eius nemo amet laudantium dolorem quis distinctio.</p>
<p>
    <ul>
        <li>email : {{ $kontak['email'] }}</li>
        <li>youtube : {{ $kontak['youtube'] }}</li>
    </ul>
</p>
@endsection