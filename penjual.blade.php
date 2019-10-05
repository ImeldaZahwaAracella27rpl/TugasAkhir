@extends('template')
@section('content') 
   <section class="main-section">
        <div class="content">
            <h1>Data Karyawan</h1>
            @if(Session::has('alert_message'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('alert_message') }}</strong>
                </div>
            @endif
            <hr>
            <a href="{{ route('penjual.create') }}"
            class=" btn btn-sm btn-dark">Tambah Karyawan</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>JABATAN</th>
                    <th>NO.HP</th>
                    <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->Jabatan}}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>
                            <form action="{{ route('penjual.destroy', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('penjual.edit',$data->id) }}" class=" btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

