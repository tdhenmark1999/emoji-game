@extends('system._layouts.main')

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-md-8">
      @include('system._components.notifications')
      <div class="panel panel-default panel-border-color panel-border-color-success">
        <div class="panel-heading panel-heading-divider">Update Record Form<span class="panel-subtitle">Category information.</span></div>
        <div class="panel-body">
          <form method="POST" action="" enctype="multipart/form-data">
            {!!csrf_field()!!}
       
    

            <div class="form-group {{$errors->first('name') ? 'has-error' : NULL}}">
              <label>Category Name</label>
              <input type="text" placeholder="" class="form-control" name="name" value="{{old('name',$area->name)}}">
              @if($errors->first('name'))
              <span class="help-block">{{$errors->first('name')}}</span>
              @endif
            </div>


        
 
            
            <div class="row xs-pt-15">
              <div class="col-xs-6">
                  <button type="submit" class="btn btn-space btn-success">Update Record</button>
                  <a href="{{route('system.category.index')}}" class="btn btn-space btn-default">Cancel</a>
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
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/summernote/summernote.css')}}"/>
@stop

@section('page-scripts')
<script src="{{asset('assets/lib/summernote/summernote.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
    $('.editor').summernote({height:300})
  })
</script>
@stop