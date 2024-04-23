<x-admin-layout>
    <div class="flex justify-between">
        <h2>Edit Movie</h2>
    </div>

    <form class="grid grid-cols-2 gap-3" action="{{ route('movies.update', $movie) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <x-input-label>Title</x-input-label>
            <x-text-input value="{{ $movie->title }}" class="w-full" name="title" placeholder="title" />
        </div>
        <div class="">
            <x-input-label>Actors</x-input-label>
            <x-text-input value="{{ $movie->actors }}" class="w-full" name="actors" placeholder="actors" />
        </div>
        <div class="">
            <x-input-label>Year</x-input-label>
            <x-text-input value="{{ $movie->year }}" class="w-full" name="year" placeholder="year" />
        </div>
        <div class="">
            <x-input-label>Trailer</x-input-label>
            <x-text-input value="{{ $movie->trailer }}" class="w-full" name="trailer" placeholder="trailer" />
        </div>
        <div class="col-span-2">
            <x-input-label>Plot</x-input-label>
            <x-text-input value="{{ $movie->plot }}" class="w-full" name="plot" placeholder="plot" />
        </div>
        <div class="col-span-2">
            <x-input-label>Poster</x-input-label>
            <x-text-input type="file" class="w-full" name="poster" placeholder="poster" />
        </div>
        <div class="flex justify-end col-start-2">
            <button class="py-2 px-4 bg-yellow-400 hover:bg-yellow-500 rounded-lg text-sm">Add Movie</button>
        </div>
    </form>
</x-admin-layout>
