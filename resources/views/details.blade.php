@extends('layouts.app')
@section('content')
<div class="flex flex-wrap">
    <div class="sticky top-0 w-1/6 h-screen p-10 flex flex-col border-2 border-gray-800/50">
        <a href="{{route('home')}}" class="pb-5 mb-2 border-b-2 border-gray-800"><h3>Voir tout</h3></a>
        @forelse ($categories as $category)
            <a href="{{route('showCategory',$category->id)}}" class="pt-3"><h3>{{$category->title}}</h3></a>
        @empty
            <h3>Pas de categorie !</h3>
        @endforelse
    </div>
    <div class="w-5/6 p-10 ">
        <div class="flex flex-wrap  items-start gap-5">
            <div class="relative">
                <img src="{{$bien->image}}" alt="img">
                <span class="absolute -top-2 -right-2 bg-gray-600 p-2 rounded-2xl text-gray-100 text-xs">{{$bien->category->title}}</span>
            </div>
            <div>
 
                {{-- <h3 class="text-xl"><b>Categorie : </b></h3> --}}
                <h3 class="text-xl"><b>Bien : </b>{{$bien->title}}</h3>
                <h3 class="text-xl"><b>Adresse : </b>{{$bien->address}}</h3>
                <h3 class="text-xl"><b>Description : </b>{{$bien->description}}</h3>
                @if ($bien->category_id==3||$bien->category_id==4)
                <h3 class="text-xl"><b>Prix : </b>{{$bien->price}} € / mois</h3>
                <h3 class="text-xl"><b>Caution : </b>{{$bien->caution}} €</h3>
                @else
                <h3 class="text-xl"><b>Prix : </b>{{$bien->price*100}} €</h3>
                
                @endif
            </div>
        </div>
        <h3 class="pt-11">Produits similaires :</h3>
        <div class="flex pt-11 gap-4 overflow-auto ">
            @forelse ($biens as $annonce)
            <a href="{{route('showDetails',$annonce->id)}}" class="">
                <div class="w-64 bg-gray-800/10 rounded-md shadow-sm">
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

        </div>
    </div>
</div>


@endsection