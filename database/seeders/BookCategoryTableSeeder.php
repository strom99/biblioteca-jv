<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookCategoryTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Book::all()->each(function (Book $book) {
            // Genera un número aleatorio entre 1 y 3 ambos inclusivos
            $randomCategoriesCount = random_int(1, 3);
            // Obtenemos un array de los id's de las categories, como máximo 3.
            $categoriesIdsInRandomOrder = Category::all()->random($randomCategoriesCount);
            // Insertar categorías en libro
            $book->categories()->attach($categoriesIdsInRandomOrder);
        });
    }
}
