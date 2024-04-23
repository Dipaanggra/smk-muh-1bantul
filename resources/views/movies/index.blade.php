<x-admin-layout>
    <div class="flex justify-between">
        <h2>Movies</h2>
        <a href="{{ route('movies.create') }}" class="py-2 px-4 bg-yellow-400 hover:bg-yellow-500 rounded-lg text-sm">Add
            Movie</a>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-neutral-200">
                        <thead>
                            <tr class="text-neutral-500">
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Title</th>
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Genre</th>
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Actors</th>
                                <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-200">
                            @foreach ($movies as $movie)
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                        <div class="flex items-center gap-4">
                                            <img class="max-h-24" src="{{ asset('storage/' . $movie->poster) }}"
                                                alt="">
                                            {{ $movie->title }} ({{ $movie->year }})
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">
                                        <div class="flex gap-2">
                                            @foreach ($movie->genres as $genre)
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $genre->name }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $movie->actors }}</td>
                                    <td class="px-5 py-4 text-sm space-x-2 font-medium text-right whitespace-nowrap">
                                        <div class="flex justify-end gap-2">
                                            <a class="text-blue-500 hover:text-blue-700"
                                                href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500 hover:text-red-700"
                                                    href="">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
