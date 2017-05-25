@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <section>
        <div class="row new-post">
          <div class="col-md-6 col-md-offset-3">
            <header></header>
            <form class="" action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">first_name</label>
                    <input type="input" name="first_name" class="form-control" value="{{ $user->first_name}}">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jgp)</label>
                    <input type="file" name="image" class="" id="image" value="">
                </div>
                <button type="submit" class="btn btn-primary" name="button">Save Account</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
          </div>
        </div>
        @if (Storage::disk('local')->has($user->first_name.'-'.$user->id.'.jpg'))
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <img src="{{ route('accountimage', ['filename' => $user->first_name . '-' . $user->id . '.jpg' ])}}" alt="" class="img-responsive" />
                </div>
            </section>
        @endif
      </div>
    </section>
@endsection
