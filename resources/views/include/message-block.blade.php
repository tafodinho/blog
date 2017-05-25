@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{$error}}
                    <div>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="alert alert-success" role="alert">
            {{ Session::get('message')}}
          </div>
        </div>
    </div>
@endif
