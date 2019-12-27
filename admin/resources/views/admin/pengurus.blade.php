@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <button type="button" class="btn bg-teal btn-lg waves-effect right m-b-10" data-toggle="modal" data-target="#largeModal">TAMBAH PENGURUS</button>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA PENGURUS
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                                <th>Order</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $value->nama_jabatan }}</td>
                                    <td>{{ $value->order }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-ubah" data-toggle="modal" onclick="ubah({{ $value->id }})">Ubah</a></li>
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-delete">Hapus</a></li>
                                                <form action="{{ route('admin.pengurus.delete') }}" method="post" id="form-delete">
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
                        <h4 class="modal-title" id="largeModalLabel">TAMBAH PENGURUS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('admin.pengurus.save') }}" method="post" enctype="multipart/form-data">
                                    <label for="nama">Nama Jabatan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
                                        </div>
                                    </div>
                                    <label for="nama">Order</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="order" name="order" class="form-control" placeholder="Order" required>
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
                                <form action="{{ route('admin.pengurus.update') }}" method="post" enctype="multipart/form-data">
                                    <label for="nama">Nama Jabatan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nama" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
                                        </div>
                                    </div>
                                    <label for="nama">Order</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="orders" name="order" class="form-control" placeholder="Order" required>
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
            $.get('{{ url('api/get_pengurus/') }}/'+id, function (result) {
                $('#nama').val(result.nama_jabatan);
                $('#orders').val(result.order);
                $('#id').val(result.id);

                $('#modalUbah').modal("show");
            });
        }
    </script>
@endsection
