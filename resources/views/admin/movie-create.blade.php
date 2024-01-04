@extends('admin.layouts.base')
@section('content')
@section('title','Create Movie')
<div class="row">
    <div class="col-md-12">

      {{-- Alert Here --}}
        @if($errors->any())
      <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
@endif

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Buat Film</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" method="POST" action="{{route('admin.movie.store')}}">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Judul</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Misalnya Avangers">
            </div>
            <div class="form-group">
              <label for="trailer">Trailer</label>
              <input type="text" class="form-control" id="trailer" name="trailer"value="{{ old('trailer') }}"  placeholder="Video url">
            </div>
            <div class="form-group">
                <label for="movie">Movie</label>
                <input type="text" class="form-control" id="movie" name="movie" value="{{ old('movie') }}" placeholder="Video url">
              </div>
            <div class="form-group">
              <label for="duration">Durasi</label>
              <input type="text" class="form-control" id="duration" name="duration"value="{{ old('duration') }}" placeholder="1jam 39menit">
            </div>
            <div class="form-group">
                <label>Tanggal:</label>
                <div class="input-group date" id="release-date" data-target-input="nearest">
                  <input type="text" name="release_date" class="form-control datetimepicker-input" value="{{ old('release_date') }}" data-target="#release-date"/>
                  <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label for="short-about">Pemeran</label>
              <input type="text" class="form-control" id="short-about" name="casts"value="{{ old('casts') }}" placeholder="Dilan/suzana">
            </div>
            <div class="form-group">
              <label for="short-about">Kategori</label>
              <input type="text" class="form-control" id="short-about" name="categories"value="{{ old('categories')}}" placeholder="Action, Fantasy">
            </div>
            <div class="form-group">
              <label for="small-thumbnail">Pilih File Untuk Gambar Kecil</label>
              <input type="file" class="form-control" name="small_thumbnail"  >
            </div>
            <div class="form-group">
              <label for="large-thumbnail">Pilih File Untuk Gambar Besar</label>
              <input type="file"  class="form-control" name="large_thumbnail">
            </div>
            <div class="form-group">
              <label for="short-about">Penjelasan singkat tentang</label>
              <input type="text" class="form-control" id="short-about" name="short_about"value="{{ old('short_about')}}" placeholder="Filim yang keren">
            </div>
            <div class="form-group">
              <label for="about">Tentang</label>
              <input type="text" class="form-control" id="about" name="about"value="{{old('about')}}" placeholder="Filim yang keren">
            </div>
            <div class="form-group">
              <label>Unggulan</label>
              <select class="custom-select" name="featured">
                <option value="0"value="{{old('featured' == '0'? "selected":"")}}">Tidak</option>
                <option value="1"value="{{old('featured' == '1'? "selected":"")}}">Ya</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
    $('#release-date').datetimepicker({
        format:'YYYY-MM-DD'
    });
</script>
@endsection
