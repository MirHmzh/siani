@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <button type="button" class="btn bg-teal btn-lg waves-effect right m-b-10" data-toggle="modal" data-target="#largeModal">TAMBAH AGENDA</button>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA AGENDA
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Agenda</th>
                                <th>Tempat</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $value->nama_agenda }}</td>
                                    <td>{{ $value->tempat }}</td>
                                    <td>
                                        {{ date('d-m-Y',strtotime($value->tanggal_mulai)) }}
                                        <br>
                                        Waktu : {{ date('H:i',strtotime($value->waktu_mulai)) }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y',strtotime($value->tanggal_selesai)) }}
                                        <br>
                                        Waktu : {{ date('H:i',strtotime($value->waktu_selesai)) }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-ubah" data-toggle="modal" onclick="ubah({{ $value->id }})">Ubah</a></li>
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-delete">Hapus</a></li>
                                                <form action="{{ route('admin.agenda.delete') }}" method="post" id="form-delete">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">TAMBAH AGENDA</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('admin.agenda.save') }}" method="post" enctype="multipart/form-data">
                                    <label for="nama">Nama Agenda</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nama_agenda" name="nama_agenda" class="form-control" placeholder="Nama Agenda" required>
                                        </div>
                                    </div>
                                    <label for="nama">Tempat</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="tempat" name="tempat" class="form-control" placeholder="Tempat" required>
                                        </div>
                                    </div>
                                    <label for="nama">Tanggal Mulai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" required>
                                        </div>
                                    </div>
                                    <label for="nama">Tanggal Selesai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" placeholder="Tanggal Mulai" required>
                                        </div>
                                    </div>
                                    <label for="nama">Waktu Mulai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai" required>
                                        </div>
                                    </div>
                                    <label for="nama">Waktu Selesai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" placeholder="Waktu Mulai" required>
                                        </div>
                                    </div>
                                    <br>
                                    @csrf
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect right">SIMPAN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">UBAH ALUMNI</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('admin.agenda.update') }}" method="post" enctype="multipart/form-data">
                                    <label for="nama">Nama Agenda</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="Nama" name="nama_agenda" class="form-control" placeholder="Nama Agenda" required>
                                        </div>
                                    </div>
                                    <label for="nama">Tempat</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="Tempat" name="tempat" class="form-control" placeholder="Tempat" required>
                                        </div>
                                    </div>
                                    <label for="nama">Tanggal Mulai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="Tanggal_mulai" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" required>
                                        </div>
                                    </div>
                                    <label for="nama">Tanggal Selesai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="Tanggal_selesai" name="tanggal_selesai" class="form-control" placeholder="Tanggal Mulai" required>
                                        </div>
                                    </div>
                                    <label for="nama">Waktu Mulai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="time" id="Waktu_mulai" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai" required>
                                        </div>
                                    </div>
                                    <label for="nama">Waktu Selesai</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="time" id="Waktu_selesai" name="waktu_selesai" class="form-control" placeholder="Waktu Mulai" required>
                                        </div>
                                    </div>
                                    <br>
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect right">SIMPAN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#btn-delete').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $('#form-delete').submit() // Post the surrounding form
            }
        });

        function ubah(id) {
            $.get('{{ url('api/get_agenda/') }}/'+id, function (result) {
                $('#Nama').val(result.nama_agenda);
                $('#Tempat').val(result.tempat);
                $('#Tanggal_mulai').val(result.tanggal_mulai);
                $('#Tanggal_selesai').val(result.tanggal_selesai);
                $('#Waktu_mulai').val(time_format(result.waktu_mulai));
                $('#Waktu_selesai').val(time_format(result.waktu_selesai));
                $('#id').val(result.id);
                $('#modalUbah').modal("show");
            });
        }

        function time_format(value) {
            let ex = value.split(':');
            return ex[0]+':'+ex[1];
        }
    </script>
@endsection
