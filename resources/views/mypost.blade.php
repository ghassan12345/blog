@extends('layouts.app')

@section('content')
<section>
    @parent
    <div class="post-container">
      @if(count($posts) >0)
            @foreach($posts as $key )


                <div class="card flex" style="width: 18rem;margin:10px;">
                    <a href="posts/{{ $key->id }}" style="text-decoration: none;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                 <div style="margin-left: 10px;"> {{ $key->user->name }}</div>
                    <div class="card-body ">


                      <h3 class="card-title">{{ $key->title }}</h3>

                      <p class="card-text">{{ $key->text }}</p>

                    </div>
                    {{$key->created_at->diffforHumans() }}
                  </a>
                 </div>

            @endforeach
       @else



      @endif

    </div>

</section>
@endsection
