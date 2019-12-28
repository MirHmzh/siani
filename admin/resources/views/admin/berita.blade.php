@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <button type="button" class="btn bg-teal btn-lg waves-effect right m-b-10" data-toggle="modal" data-target="#largeModal">TAMBAH BERITA</button>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA BERITA
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul Berita</th>
                                <th>Konten</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>
                                        <img src="{{ asset('images/'.$value->image) }}" width="64" alt="">
                                    </td>
                                    <td>{{ $value->judul_berita }}</td>
                                    <td>
                                        {!! $value->konten !!}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-ubah" data-toggle="modal" onclick="ubah({{ $value->id }})">Ubah</a></li>
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block" id="btn-delete">Hapus</a></li>
                                                <form action="{{ route('admin.berita.delete') }}" method="post" id="form-delete">
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
                        <h4 class="modal-title" id="largeModalLabel">TAMBAH BERITA</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('admin.berita.save') }}" method="post" enctype="multipart/form-data">
                                    <label for="nama">Judul Berita</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="judul_berita" name="judul_berita" class="form-control" placeholder="Judul Berita" required>
                                        </div>
                                    </div>
                                    <label for="nama">Konten</label>
                                    <div class="form-group">
                                        <textarea id="tinymce" name="konten">
                                        </textarea>
                                    </div>
                                    <label for="nama">Gambar</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" id="image" name="gambar" class="form-control" placeholder="" required>
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
                                <form action="{{ route('admin.berita.update') }}" method="post" enctype="multipart/form-data">
                                    <label for="nama">Judul Berita</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="Judul_berita" name="judul_berita" class="form-control" placeholder="Judul Berita" required>
                                        </div>
                                    </div>
                                    <label for="nama">Konten</label>
                                    <div class="form-group">
                                        <textarea id="tinymce" class="konten" name="konten">
                                        </textarea>
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
    <script src="{{asset('assets/plugins/tinymce/tinymce.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/editors.js')}}"></script>

    <script>
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{asset('assets/plugins/tinymce')}}';

        $('#btn-delete').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $('#form-delete').submit() // Post the surrounding form
            }
        });

        function ubah(id) {
            $.get('{{ url('api/get_berita/') }}/'+id, function (result) {
                $('#Judul_berita').val(result.judul_berita);
                tinymce.get("tinymce").setContent(result.konten);
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
