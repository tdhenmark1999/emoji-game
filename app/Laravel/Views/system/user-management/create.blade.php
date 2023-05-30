@extends('system._layouts.main')

@section('content')
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-8">
                @include('system._components.notifications')
                <div class="panel panel-default panel-border-color panel-border-color-success">
                    <div class="panel-heading panel-heading-divider">Create Record Form<span class="panel-subtitle">
                            Player Information</span></div>
                    <div class="panel-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="col-lg-12 mb-3 text-center">
                                <img id="blah_primary_back" src="images/placeholder-image.png"
                                    style="width: auto;height: 200px;" alt="" />
                            </div>
                            <div class="form-group {{ $errors->first('file') ? 'has-error' : null }}">
                                <label for="file" class="form-label">Image</label>
                                <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg"
                                    name="file" placeholder="file" id="img_primary_back">
                                @if ($errors->first('file'))
                                    <span class="help-block">{{ $errors->first('file') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('name') ? 'has-error' : null }}">
                                <label>Player Name</label>
                                <input type="text" placeholder="name" class="form-control" name="name"
                                    value="{{ old('name') }}">
                                @if ($errors->first('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>



                            <div class="row xs-pt-15">
                                <div class="col-xs-6">
                                    <button type="submit" class="btn btn-space btn-success">Add</button>
                                    <a href="{{ route('system.category.index') }}"
                                        class="btn btn-space btn-default">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop




@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/summernote/summernote.css') }}" />
@stop

@section('page-scripts')
    <script src="{{ asset('assets/lib/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('.editor').summernote({
                height: 300
            })
        })

        function randomNumber(len) {
            var randomNumber;
            var n = '';

            for (var count = 0; count < len; count++) {
                randomNumber = Math.floor(Math.random() * 10);
                n += randomNumber.toString();
            }
            return n;
        }



        window.onload = function() {
            document.getElementById("area_code").value = randomNumber(9);
        };
    </script>
    <script>
        img_primary_back.onchange = evt => {
            const [file] = img_primary_back.files
            if (file) {
                blah_primary_back.src = URL.createObjectURL(file)
            }
        }
    </script>

@stop
