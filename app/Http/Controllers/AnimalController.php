<?php

namespace App\Http\Controllers;

use App\Contracts\AnimalServiceInterface;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function __construct(
        private AnimalServiceInterface $animalService
    ) {}

    public function index()
    {
        return view('animales', [
            'animals' => $this->animalService->all()
        ]);
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

        $this->animalService->create($validatedData);

        return redirect()->route('animals.index')->with('success', 'Animal agregado exitosamente.');
    }

    public function edit(int $id)
    {
        $animals = $this->animalService->all();
        $animalToEdit = $this->animalService->find($id);

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

        $this->animalService->update($id, $validatedData);

        return redirect()->route('animals.index')->with('success', 'Animal actualizado exitosamente.');
    }

    public function destroy(int $id)
    {
        $this->animalService->delete($id);

        return redirect()->route('animals.index')->with('success', 'Animal eliminado exitosamente.');
    }

    public function reset()
    {
        $this->animalService->reset();

        return redirect()->route('animals.index')->with('success', 'Los datos fueron reiniciados correctamente.');
    }
}