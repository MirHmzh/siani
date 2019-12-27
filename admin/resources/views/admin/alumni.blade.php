@extends('layouts.admin')
@section('css')
    <link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <button type="button" class="btn bg-teal btn-lg waves-effect right m-b-10" data-toggle="modal" data-target="#largeModal">TAMBAH ALUMNI</button>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA ALUMNI
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>Jurusan</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Lulus</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>
                                        <img src="{{ asset('images/'.$value->foto) }}" style="width: 64px;" alt="">
                                    </td>
                                    <td>{{ $value->nama_alumni }}</td>
                                    <td>{{ $value->jurusan_alumni }}</td>
                                    <td>{{ $value->thn_masuk }}</td>
                                    <td>{{ $value->thn_lulus }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-ubah" data-toggle="modal" onclick="ubah({{ $value->id }})">Ubah</a></li>
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-delete">Hapus</a></li>
                                                <form action="{{ route('admin.alumni.delete') }}" method="post" id="form-delete">
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
                        <h4 class="modal-title" id="largeModalLabel">TAMBAH ALUMNI</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('admin.alumni.save') }}" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jabatan</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="pengurus_id">
                                            @foreach($jabatan as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->nama_jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nama" name="nama_alumni" class="form-control" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <label for="nama">Alamat</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="alamat" name="alamat_alumni" class="form-control" placeholder="Alamat" required>
                                        </div>
                                    </div>
                                    <label for="nama">Jurusan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="jurusan" name="jurusan_alumni" class="form-control" placeholder="Jurusan" required>
                                        </div>
                                    </div>
                                    <label for="nama">Kelas</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="kelas_alumni" name="kelas_alumni" class="form-control" placeholder="Kelas" required>
                                        </div>
                                    </div>
                                    <label>Tahun Masuk</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="thn_masuk" class="form-control date" placeholder="Ex: 2019" maxlength="4" required>
                                        </div>
                                    </div>
                                    <label>Tahun Lulus</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="thn_lulus" class="form-control date" placeholder="Ex: 2023" maxlength="4" required>
                                        </div>
                                    </div>
                                    <label for="nama">Foto</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" id="foto" name="image" class="form-control" placeholder="Foto" required>
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
                                <form action="{{ route('admin.alumni.update') }}" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jabatan</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="pengurus_id">
                                            @foreach($jabatan as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->nama_jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nama_alumni" name="nama_alumni" class="form-control" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <label for="nama">Alamat</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="alamat_alumni" name="alamat_alumni" class="form-control" placeholder="Alamat" required>
                                        </div>
                                    </div>
                                    <label for="nama">Jurusan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="jurusan_alumni" name="jurusan_alumni" class="form-control" placeholder="Jurusan" required>
                                        </div>
                                    </div>
                                    <label for="nama">Kelas</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="kelas" name="kelas_alumni" class="form-control" placeholder="Kelas" required>
                                        </div>
                                    </div>
                                    <label>Tahun Masuk</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="thn_masuk" id="tahun_masuk" class="form-control date" placeholder="Ex: 2019" maxlength="4" required>
                                        </div>
                                    </div>
                                    <label>Tahun Lulus</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="thn_lulus" id="tahun_lulus" class="form-control date" placeholder="Ex: 2023" maxlength="4" required>
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
    <script src="{{asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script>
        $('#btn-delete').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $('#form-delete').submit() // Post the surrounding form
            }
        });

        function ubah(id) {
            $.get('{{ url('api/get_alumni/') }}/'+id, function (result) {
                console.log(result.nama_alumni);
                $('#nama_alumni').val(result.nama_alumni);
                $('#alamat_alumni').val(result.alamat_alumni);
                $('#kelas').val(result.kelas_alumni);
                $('#jurusan_alumni').val(result.jurusan_alumni);
                $('#tahun_masuk').val(result.thn_masuk);
                $('#tahun_lulus').val(result.thn_lulus);
                $('#id').val(result.id);

                $('#modalUbah').modal("show");
            });
        }
    </script>
@endsection
