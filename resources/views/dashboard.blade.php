@extends('layouts.master')

@section('title')
    Dashboard
@endsection
@section('content')
<div class="container">
  @include('include.message-block')
  <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
          <header><h3>What do you have to say?</h3></header>
          <form action="{{ route('postcreate')}}" role="form" method="post">
              <div class="form-group">
                  <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="your post"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="button">Submit</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
      </div>
  </section>
  <section class="row posts">
      <div class="col-md-6 col-md-offset-3">
          <header><h3>News Feed....</h3></header>
          @foreach($posts as $post)
          <?php $count = 0 ?>
            @foreach($likes as $like)
                @if($like->post_id == $post->id)
                    <?php $count += 1; ?>
                @endif
              @endforeach
              <article class="post" data-postid="{{ $post->id }}">
                <div class="pic row">
                  <div class="col-sm-2">
                    <img src="{{ route('accountimage', ['filename' => $post->user->first_name . '-' . $post->user->id . '.jpg' ])}}" alt="" class="img-responsive" />
                  </div>
                  <div class="col-sm-6">
                      <div class="row">
                          <span style="font-weight: bold">{{ ucwords($post->user->first_name) }}</span>
                      </div>
                      <div class="row">
                          <span style="font-size: 0.8em">{{ $post->created_at }}</span>
                      </div>
                  </div>
                </div>
                  <p>
                      {{ $post->body }}
                  </p>
                  @if(Auth::user() == $post->user)
                      <input type="hidden" id="test" value="{{ $post->user->id }}">
                  @endif
                  <div class="interaction">
                      <a href="#" class="like like-like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'Liked' : 'Like' : 'Like' }}</a> |
                      <a href="#" class="like like-unlike">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0? 'Disliked' : 'Dislike' : 'Dislike' }}</a>
                      @if(Auth::user() == $post->user)
                      |
                        <a href="#" class="edit">Edit</a> |
                        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                      @endif
                      <span class="badge" id="like-count">{{ $count }}</span>
                  </div>
              </article>
          @endforeach
      </div>
  </section>
</div>

<!--  modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="post-body">Edit the post</label>
                  <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var token = '{{ Session::token()}}';
    var urlEdit = '{{ route('edit')}}';
    var urlLike = '{{ route('like')}}';
</script>
@endsection
