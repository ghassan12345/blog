@extends('layouts.app')

@section('content')
<section >
    @parent
    <div class="post-container">
      @if(count($posts) >0)
            @foreach($posts as $key )


                <div class="card " style="width: 50%;margin:10px;margin-left:30%;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body "style="">
                        {{ $key->user->name }}
                        <a href="posts/{{ $key->id }}">

                            <h3 class="card-title">{{ $key->title }}</h3>
                        </a>
                      <p class="card-text">{{ $key->text }}</p>
                       {{$key->created_at->diffforHumans() }}
                    </div>
                    <div class="form-group">
                        <form action="{{ route('test.route',[$key->id]) }}" method="GET">
                            {{ csrf_field() }}
                            <div>
                                <input type="text" name="comment" id="comment" placeholder="post your comment"/>
                                <input type="submit">
                            </div>
                        </form>
                    </div>

                    <div>

                    </div>
                  </div>
            @endforeach
       @else



      @endif

    </div>
</section>
@endsection
