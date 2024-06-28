@extends('layouts.app')
@section('content')

    <div class="flex flex-wrap">
        <div class="w-1/6 p-10 flex flex-col border-2 border-gray-800/50">
            <a href="{{route('home')}}" class="pb-5 mb-2 border-b-2 border-gray-800"><h3>Voir tout</h3></a>
            @forelse ($categories as $category)
                <a href="{{route('showCategory',$category->id)}}" class="pt-3"><h3>{{$category->title}}</h3></a>
            @empty
                <h3>Pas de categorie !</h3>
            @endforelse
        </div>
        <div class="w-5/6 p-10 flex flex-wrap justify-between items-center gap-4">
            @forelse ($annonces as $annonce)
            <a href="{{route('showDetails',$annonce->id)}}">
                <div class="w-80  bg-gray-800/10 rounded-md shadow-sm">
                    <div id="image" class=" rounded-md">
                        <img src="{{$annonce->image}}" width="100%" alt="" class=" rounded-md shadow-lg">
                    </div>
                    <div id="infos" class="px-2 py-2">
                        <h4>{{$annonce->ville}}</h4>
                        <h4>{{$annonce->title}}</h4>
                        <h4>
                            @if ($annonce->category_id==3||$annonce->category_id==4)
                                {{$annonce->price}}€ / mois
                            @else
                             {{$annonce->price*100}}€ / hors frais de notaire
                            @endif
                        </h4>
                    </div>
                </div>
            </a>
            @empty
                
            @endforelse
            <div class="my-10 mx-auto">
                {{ $annonces->links() }}
            </div>
        </div>
    </div>
    
@endsection