<div class="w-1/6 p-10 flex flex-col border-2 border-gray-800/50">
    <a href="{{route('home')}}" class="pb-5 mb-2 border-b-2 border-gray-800"><h3>Voir tout</h3></a>
    @forelse ($categories as $category)
        <a href="{{route('showCategory',$category->id)}}" class="pt-3"><h3>{{$category->title}}</h3></a>
    @empty
        <h3>Pas de categorie !</h3>
    @endforelse
</div>
