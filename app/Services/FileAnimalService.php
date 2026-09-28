<?php

namespace App\Services;

use App\Contracts\AnimalServiceInterface;
use Illuminate\Support\Facades\Storage;
use Exception;
class FileAnimalService implements AnimalServiceInterface

{
    private string $filePath = 'animals.json';

    private function getAnimals(): array
    {
        if (!Storage::disk('local')->exists($this->filePath)) {
            $this->reset();
        }

        $jsonContent = Storage::disk('local')->get($this->filePath);

        $data = json_decode($jsonContent, true);

        return is_array($data) ? $data : [];
    }

    private function saveAnimals(array $animals): void
    {
        $jsonContent = json_encode($animals, JSON_PRETTY_PRINT);

        Storage::disk('local')->put($this->filePath, $jsonContent);
    }

    public function reset(): void
    {
        $defaultAnimals = [
            ['id' => 1, 'nombre' => 'Tigre', 'nombreCientifico' => 'Panthera tigris', 'alimentacion' => 'Carnívoro', 'clase' => 'Mamífero', 'expVida' => 15],
            ['id' => 2, 'nombre' => 'Elefante', 'nombreCientifico' => 'Loxodonta africana', 'alimentacion' => 'Herbívoro', 'clase' => 'Mamífero', 'expVida' => 70],
            ['id' => 3, 'nombre' => 'Canguro', 'nombreCientifico' => 'Macropus rufus', 'alimentacion' => 'Herbívoro', 'clase' => 'Mamífero', 'expVida' => 20],
            ['id' => 4, 'nombre' => 'Delfín', 'nombreCientifico' => 'Delphinus delphis', 'alimentacion' => 'Carnívoro', 'clase' => 'Mamífero', 'expVida' => 30],
            ['id' => 5, 'nombre' => 'Pingüino', 'nombreCientifico' => 'Aptenodytes forsteri', 'alimentacion' => 'Carnívoro', 'clase' => 'Ave', 'expVida' => 20],
            ['id' => 6, 'nombre' => 'Cocodrilo', 'nombreCientifico' => 'Crocodylus porosus', 'alimentacion' => 'Carnívoro', 'clase' => 'Reptil', 'expVida' => 70],
        ];

        $this->saveAnimals($defaultAnimals);
    }

    public function all(): array
    {
        return $this->getAnimals();
    }

    public function find(int|string $id): array
    {
        $animals = $this->getAnimals();

        foreach ($animals as $animal) {
            if ($animal['id'] == $id) {
                return $animal;
            }
        }

        throw new Exception("El animal con ID {$id} no fue encontrado.");
    }

    public function create(array $data): array
    {
        $animals = $this->getAnimals();

        $maxId = 0;
        foreach ($animals as $animal) {
            if (isset($animal['id']) && $animal['id'] > $maxId) {
                $maxId = (int) $animal['id'];
            }
        }

        $newAnimal = array_merge(['id' => $maxId + 1], $data);
        $animals[] = $newAnimal;

        $this->saveAnimals($animals);

        return $newAnimal;
    }

    public function update(int $id, array $data): ?array
    {
        $animals = $this->getAnimals();
        $updatedAnimal = null;

        foreach ($animals as $key => $animal) {
            if ($animal['id'] == $id) {
                $animals[$key] = array_merge($animal, $data, ['id' => $id]);
                $updatedAnimal = $animals[$key];
                break;
            }
        }

        if ($updatedAnimal === null) {
            throw new Exception("El animal con ID {$id} no fue encontrado.");
        }

        $this->saveAnimals($animals);

        return $updatedAnimal;
    }

    public function delete(int|string $id): bool
    {
        $animals = $this->getAnimals();
        $initialCount = count($animals);

        // Filtramos para dejar solo los animales con ID distinto al buscado
        $animals = array_values(array_filter($animals, fn($animal) => $animal['id'] != $id));

        if (count($animals) === $initialCount) {
            throw new Exception("El animal con ID {$id} no fue encontrado.");
        }

        $this->saveAnimals($animals);

        return true;
    }
}