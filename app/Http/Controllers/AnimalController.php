<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals = [
        ['id' => 1, 'nombre' => 'Tigre', 'nombreCientifico' => 'Panthera tigris', 'alimentacion' => 'Carnívoro', 'clase' => 'Mamífero', 'expVida' => 15],
        ['id' => 2, 'nombre' => 'Elefante', 'nombreCientifico' => 'Loxodonta africana', 'alimentacion' => 'Herbívoro', 'clase' => 'Mamífero', 'expVida' => 70],
        ['id' => 3, 'nombre' => 'Canguro', 'nombreCientifico' => 'Macropus rufus', 'alimentacion' => 'Herbívoro', 'clase' => 'Mamífero', 'expVida' => 20],
        ['id' => 4, 'nombre' => 'Delfín', 'nombreCientifico' => 'Delphinus delphis', 'alimentacion' => 'Carnívoro', 'clase' => 'Mamífero', 'expVida' => 30],
        ['id' => 5, 'nombre' => 'Pingüino', 'nombreCientifico' => 'Aptenodytes forsteri', 'alimentacion' => 'Carnívoro', 'clase' => 'Ave', 'expVida' => 20],
        ['id' => 6, 'nombre' => 'Cocodrilo', 'nombreCientifico' => 'Crocodylus porosus', 'alimentacion' => 'Carnívoro', 'clase' => 'Reptil', 'expVida' => 70]

    ];

    public function index()
    {
        if (session()->has('animals')) {
            $this->animals = session('animals');
        } else {
            session(['animals' => $this->animals]);
        }
        return view('animales', ['animals' => $this->animals]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombreCientifico' => 'required|string|max:255',
            'alimentacion' => 'required|string|in:Carnívoro,Herbívoro,Omnívoro',
            'clase' => 'required|string|in:Mamífero,Reptil,Ave,Anfibio,Pez',
            'expVida' => 'required|integer|min:1',
        ]);

        $newAnimal = [
            'id' => count(session('animals', $this->animals)) + 1,
            'nombre' => $validatedData['nombre'],
            'nombreCientifico' => $validatedData['nombreCientifico'],
            'alimentacion' => $validatedData['alimentacion'],
            'clase' => $validatedData['clase'],
            'expVida' => $validatedData['expVida'],
        ];

        if (session()->has('animals')) {
            $this->animals = session('animals');
        } else {
            session(['animals' => $this->animals]);
        }

        $this->animals[] = $newAnimal;
        session(['animals' => $this->animals]);
        return redirect()->route('animals.index')->with('success', 'Animal agregado exitosamente.');
    }

    public function edit(int $id)
    {
        $animals = session('animals', $this->animals);
        $animalToEdit = collect($animals)->firstWhere('id', $id);

        abort_unless($animalToEdit, 404);

        return view('animales', [
            'animals' => $animals,
            'animalToEdit' => $animalToEdit,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombreCientifico' => 'required|string|max:255',
            'alimentacion' => 'required|string|in:Carnívoro,Herbívoro,Omnívoro',
            'clase' => 'required|string|in:Mamífero,Reptil,Ave,Anfibio,Pez',
            'expVida' => 'required|integer|min:1',
        ]);

        $animals = session('animals', $this->animals);
        $animalIndex = collect($animals)->search(fn (array $animal): bool => $animal['id'] === $id);

        abort_unless($animalIndex !== false, 404);

        $animals[$animalIndex] = [
            'id' => $id,
            ...$validatedData,
        ];

        session(['animals' => $animals]);

        return redirect()->route('animals.index')->with('success', 'Animal actualizado exitosamente.');
    }

    public function destroy(int $id)
    {
        $animals = session('animals', $this->animals);
        $filteredAnimals = array_values(array_filter($animals, fn (array $animal): bool => $animal['id'] !== $id));

        abort_if(count($animals) === count($filteredAnimals), 404);

        session(['animals' => $filteredAnimals]);

        return redirect()->route('animals.index')->with('success', 'Animal eliminado exitosamente.');
    }
}