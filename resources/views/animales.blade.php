@extends('layouts.layoutAnimales')

@section('content')
    <div class="mx-auto flex max-w-6xl flex-col gap-8">
        <header class="flex flex-col gap-3 border-b border-pink-200 pb-6 dark:border-purple-800 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-purple-600 dark:text-pink-300">AnimalApp</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-purple-950 dark:text-pink-50 sm:text-4xl">Animals Manager</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-purple-700 dark:text-purple-200">
                    Registra y consulta la información principal de cada animal de forma simple y ordenada.
                </p>
            </div>

            <span class="inline-flex w-fit items-center rounded-full bg-pink-200 px-3 py-1 text-xs font-semibold text-purple-800 dark:bg-purple-800 dark:text-pink-100">
                {{ count($animals ?? []) }} registros
            </span>
        </header>

        <section aria-labelledby="animal-form-title" class="rounded-2xl border border-pink-200 bg-white p-6 shadow-sm dark:border-purple-800 dark:bg-purple-900/70 sm:p-8">
            <div class="mb-6">
                <h2 id="animal-form-title" class="text-xl font-semibold text-purple-950 dark:text-pink-50">{{ isset($animalToEdit) ? 'Editar animal' : 'Agregar animal' }}</h2>
                <p class="mt-1 text-sm text-purple-600 dark:text-purple-200">Completa los datos para {{ isset($animalToEdit) ? 'actualizarlo' : 'incorporarlo al registro' }}.</p>
            </div>

            <form method="POST" action="{{ isset($animalToEdit) ? route('animals.update', $animalToEdit['id']) : route('animals.store') }}" class="grid gap-5 md:grid-cols-2">
                @csrf
                @isset($animalToEdit)
                    @method('PUT')
                @endisset

                <div class="flex flex-col gap-2">
                    <label for="nombre" class="text-sm font-medium text-purple-900 dark:text-pink-100">Nombre común</label>
                    <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $animalToEdit['nombre'] ?? '') }}" placeholder="Ej. Tigre" required class="rounded-lg border border-pink-300 bg-pink-50 px-4 py-2.5 text-sm text-purple-950 outline-none transition placeholder:text-purple-400 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 dark:border-purple-700 dark:bg-purple-950/70 dark:text-pink-50 dark:placeholder:text-purple-300">
                    @error('nombre')
                        <p class="text-xs font-medium text-red-600 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="nombreCientifico" class="text-sm font-medium text-purple-900 dark:text-pink-100">Nombre científico</label>
                    <input id="nombreCientifico" name="nombreCientifico" type="text" value="{{ old('nombreCientifico', $animalToEdit['nombreCientifico'] ?? '') }}" placeholder="Ej. Panthera tigris" required class="rounded-lg border border-pink-300 bg-pink-50 px-4 py-2.5 text-sm text-purple-950 outline-none transition placeholder:text-purple-400 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 dark:border-purple-700 dark:bg-purple-950/70 dark:text-pink-50 dark:placeholder:text-purple-300">
                    @error('nombreCientifico')
                        <p class="text-xs font-medium text-red-600 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="alimentacion" class="text-sm font-medium text-purple-900 dark:text-pink-100">Alimentación</label>
                    <select id="alimentacion" name="alimentacion" required class="rounded-lg border border-pink-300 bg-pink-50 px-4 py-2.5 text-sm text-purple-950 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 dark:border-purple-700 dark:bg-purple-950/70 dark:text-pink-50">
                        <option value="">Selecciona una opción</option>
                        @foreach (['Carnívoro', 'Herbívoro', 'Omnívoro'] as $alimentacion)
                            <option value="{{ $alimentacion }}" @selected(old('alimentacion', $animalToEdit['alimentacion'] ?? '') === $alimentacion)>{{ $alimentacion }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="clase" class="text-sm font-medium text-purple-900 dark:text-pink-100">Clase</label>
                    <select id="clase" name="clase" required class="rounded-lg border border-pink-300 bg-pink-50 px-4 py-2.5 text-sm text-purple-950 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 dark:border-purple-700 dark:bg-purple-950/70 dark:text-pink-50">
                        <option value="">Selecciona una opción</option>
                        @foreach (['Mamífero', 'Reptil', 'Ave', 'Anfibio', 'Pez'] as $animalClass)
                            <option value="{{ $animalClass }}" @selected(old('clase', $animalToEdit['clase'] ?? '') === $animalClass)>{{ $animalClass }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2 md:max-w-xs">
                    <label for="expVida" class="text-sm font-medium text-purple-900 dark:text-pink-100">Expectativa de vida</label>
                    <div class="flex items-center gap-3">
                        <input id="expVida" name="expVida" type="number" min="1" value="{{ old('expVida', $animalToEdit['expVida'] ?? '') }}" placeholder="15" required class="w-full rounded-lg border border-pink-300 bg-pink-50 px-4 py-2.5 text-sm text-purple-950 outline-none transition placeholder:text-purple-400 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 dark:border-purple-700 dark:bg-purple-950/70 dark:text-pink-50 dark:placeholder:text-purple-300">
                        <span class="shrink-0 text-sm text-purple-600 dark:text-purple-200">año/s</span>
                    </div>
                </div>

                <div class="flex items-end md:justify-end">
                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:bg-pink-300 dark:text-purple-950 dark:hover:bg-pink-200 dark:focus:ring-offset-purple-900 sm:w-auto">
                        {{ isset($animalToEdit) ? 'Actualizar animal' : 'Agregar animal' }}
                    </button>
                </div>
            </form>
            <form action="{{ route('animals.reset') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que querés reiniciar todos los datos?');" class="mt-3 flex justify-end">
                @csrf
                <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-gray-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600 dark:focus:ring-offset-purple-900 sm:w-auto">
                    Resetear datos
                </button>
            </form>
        </section>

        <section aria-labelledby="animal-list-title" class="overflow-hidden rounded-2xl border border-pink-200 bg-white shadow-sm dark:border-purple-800 dark:bg-purple-900/70">
            <div class="flex flex-col gap-1 border-b border-pink-200 px-6 py-5 dark:border-purple-800 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 id="animal-list-title" class="text-xl font-semibold text-purple-950 dark:text-pink-50">Animales registrados</h2>
                    <p class="mt-1 text-sm text-purple-600 dark:text-purple-200">Consulta, edita o elimina registros existentes.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-pink-200 text-left text-sm dark:divide-purple-800">
                    <thead class="bg-pink-50 text-xs uppercase tracking-wide text-purple-700 dark:bg-purple-950/60 dark:text-pink-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold">Nombre común</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Nombre científico</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Alimentación</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Clase</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Expectativa de vida</th>
                            <th scope="col" class="px-6 py-4 text-right font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 dark:divide-purple-800/80">
                        @forelse ($animals ?? [] as $animal)
                            <tr class="transition hover:bg-pink-50/70 dark:hover:bg-purple-800/30">
                                <td class="whitespace-nowrap px-6 py-4 font-medium text-purple-950 dark:text-pink-50">{{ $animal['nombre'] }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-purple-700 dark:text-purple-200">{{ $animal['nombreCientifico'] }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-purple-700 dark:text-purple-200">{{ $animal['alimentacion'] }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-purple-700 dark:text-purple-200">{{ $animal['clase'] }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-purple-700 dark:text-purple-200">{{ $animal['expVida'] }} año/s</td>
                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('animals.edit', $animal['id']) }}" class="rounded-md px-3 py-2 text-xs font-semibold text-purple-700 transition hover:bg-pink-100 hover:text-purple-950 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:text-pink-200 dark:hover:bg-purple-800 dark:hover:text-pink-50" aria-label="Editar {{ $animal['nombre'] }}">
                                            Editar
                                        </a>
                                        <form method="POST" action="{{ route('animals.destroy', $animal['id']) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-md px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 dark:text-red-300 dark:hover:bg-red-950/50" aria-label="Eliminar {{ $animal['nombre'] }}">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <p class="font-medium text-purple-900 dark:text-pink-100">Todavía no hay animales registrados.</p>
                                    <p class="mt-1 text-sm text-purple-600 dark:text-purple-300">Completa el formulario para agregar el primero.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection