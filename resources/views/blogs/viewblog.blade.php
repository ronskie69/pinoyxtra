@extends('layouts.layout')

@section('body')
    <div class="container p-4">
        @foreach ($blog as $data)
        <div class="card mb-3 shadow-0 border">
            <div class="card-header">
                <a href="{{ route('blogs') }}">
                <i class="bi bi-chevron-left me-2"></i>
                </a> {{ $data->blog_title}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p><small>{{$data->blog_content}}</small></p>
                    <footer class="blockquote-footer mt-4">
                        <small>Posted by <cite>{{ $data->blog_creator}}</cite></small>
                    </footer>
                </blockquote>
            </div>
            <div class="card-footer d-flex align-items-center">
                <form method="POST" action="{{ route('like-activity') }}">
                    @csrf
                    @if (auth()->user())
                        <input type="hidden" name="blog_id" value="{{ $data->blog_id }}">
                        <input type="hidden" name="viewer" value="{{ auth()->user()->username }}">
                        <input type="hidden" name="vote" value="like">
                    @endif
                    <button @if (auth()->user()) type="submit" @else type="button" @endif" class="btn btn-transparent shadow-0 shaky">
                        <i class="bi bi-hand-thumbs-up-fill @if (auth()->user() && $state && $state->vote == "like") text-white @endif"></i>
                    </button>
                    {{ $data->blog_likes }}
                </form>
                <form method="POST" action="{{ route('dislike-activity') }}">
                    @csrf
                    @if (auth()->user())
                        <input type="hidden" name="blog_id" value="{{ $data->blog_id }}">
                        <input type="hidden" name="viewer" value="{{ auth()->user()->username }}">
                        <input type="hidden" name="vote" value="dislike">
                    @endif
                    <button @if (auth()->user()) type="submit" @else type="button" @endif" class="btn btn-transparent shadow-0 shaky">
                        <i class="bi bi-hand-thumbs-down-fill @if (auth()->user() && $state && $state->vote == "dislike") text-white @endif"></i>
                    </button>
                    {{ $data->blog_dislikes }}
                </form>
                <button class="bg-transparent border-0 ms-3 text-magnum" type="button" id="reply" style="font-size: .9rem;" onclick="showTextbox(this)">Reply</button>
            </div>
            @if (auth()->user())
            <div class="card-footer p-4" id="show_textbox" style="display: none">
                <form method="POST" action="{{ route('addReply') }}">
                    @csrf
                    <input type="hidden" name="reply_id" value="{{ $data->blog_id }}">
                    <input type="hidden" name="viewer_username" value="{{ auth()->user()->username }}">
                    <div class="form-floating">
                        <textarea name="reply_content" id="reply" class="form-control" rows="1"></textarea>
                        <label>Reply</label>
                    </div>
                    <button class="btn mt-2 btn-magnum btn-sm float-end shadow-0" type="submit" name="submit">
                        Submit Reply
                        <i class="bi bi-share ms-2"></i>
                    </button>
                </form>
            </div>
            @endif

            @if ($replies->count())
            <div class="card-footer">
                <div class="accordion border-0" id="accordionExample">
                    <div class="accordion-item border-0">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Replies ({{ $replies->count() }})
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse @if(!$replies->count()) collapse @endif" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body border-0">
                            <ul class="list-group">
                                    @foreach ($replies as $reply)
                                        <li class="list-group-item border-0">
                                            <small>
                                                <i class="bi bi-person text-secondary me-1"></i>
                                                {{ $reply->viewer_username ?? 'Anonymous' }}&nbsp;:
                                            </small>
                                            &nbsp; &nbsp;
                                            {{ $reply->reply_content}}
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>  
                @endif
            </div>
        </div>
        @endforeach
    </div>
@endsection
<script>
    function showTextbox(element) {
        if(document.getElementById("show_textbox").style.display == "block") {
            element.innerHTML = "Reply"
            document.getElementById("show_textbox").style.display = "none"
        } else {
            document.getElementById("show_textbox").style.display = "block"
            element.innerHTML = "Cancel"
        }
    }
</script>