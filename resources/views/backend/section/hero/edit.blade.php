@extends('backend.layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- flash message -->
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <div style="float: right">
                    <a href="{{ route('dashboard.hero.index') }}">
                        <button class="btn btn-info m-3">Show hero</button>
                    </a>
                </div>
            </div>
            <!-- hero form -->
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('dashboard.hero.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Edit Hero</h4><hr>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Name<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{ $hero->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Surname<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="surname" class="form-control" value="{{ $hero->surname }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Background Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                                    <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;">
                                </div>
                            </div>

                            <script>
                                function previewImage(event) {
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        var preview = document.getElementById('preview');
                                        preview.src = reader.result;
                                        preview.style.display = 'block';
                                    }
                                    reader.readAsDataURL(event.target.files[0]);
                                }
                            </script>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Twitter Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="twitter_url" class="form-control" value="{{ $hero->twitter_url }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Facebook Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="fb_url" class="form-control" value="{{ $hero->fb_url }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Linkdin Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ln_url" class="form-control" value="{{ $hero->ln_url }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Instragram Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="in_url" class="form-control" value="{{ $hero->in_url }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Skype Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sk_url" class="form-control" value="{{ $hero->sk_url }}">
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
