@extends("layouts.app")

@section("content")

    <main class="main">
        <main class="container">

            @if($items )

                <div class="list-group">
                    @foreach($items as $r)
                        <a class="list-group-item list-group-item-action {{$r->user_id == \Illuminate\Support\Facades\Auth::user()->id ? "active" : ""}}" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$r->User->name}}</h5>
                                <small>{{$r->created_at->diffForHumans()}}</small>
                            </div>
                            <p class="mb-1">{{$r->content}}</p>
                        </a>
                    @endforeach
                </div>

                <br>
                <form method="POST" action="{{ route('post') }}"
                      class="row">
                    @csrf
                    <div class="col-12 mb-1">
                        <div class="form-group">
                            <label for="content_x" class="sr-only">Content</label>
                            <textarea type="text" name="content_x" class="form-control" rows="4" id="content_x"
                                      placeholder="Content"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2">Create messages</button>
                        </div>
                    </div>
                </form>
                @include("layouts.msg")
            @else
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You must log in or create an account in order to be able to create messages</p>
                    <hr>
                    <p class="mb-0">Now you can get the messages</p>
                </div>
            @endif

        </main>
    </main>

@endsection
