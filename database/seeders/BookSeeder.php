<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Il nome della rosa',
                'author' => 'Umberto Eco',
                'isbn' => '9788807885534',
                'published_at' => '1980-01-01',
                'description' => 'Un giallo storico ambientato in un monastero medievale.',
                'cover_image' => 'https://picsum.photos/200/300',
                'available_copies' => 2,
                'category_id' => 12, // Gialli e Thriller
            ],
            [
                'title' => 'Sapiens: Da animali a dèi',
                'author' => 'Yuval Noah Harari',
                'isbn' => '9788850245674',
                'published_at' => '2011-01-01',
                'description' => 'Un saggio che esplora la storia dell’umanità.',
                'cover_image' => 'https://picsum.photos/201/300',
                'available_copies' => 2,
                'category_id' => 2, // Saggistica
            ],
            [
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'isbn' => '9788867310516',
                'published_at' => '2011-01-01',
                'description' => 'La biografia ufficiale del fondatore di Apple.',
                'cover_image' => 'https://picsum.photos/201/301',
                'available_copies' => 2,
                'category_id' => 3, // Biografie
            ],
            [
                'title' => 'L’arte della felicità',
                'author' => 'Dalai Lama',
                'isbn' => '9788807881987',
                'published_at' => '1998-01-01',
                'description' => 'Un dialogo tra psicologia occidentale e spiritualità orientale.',
                'cover_image' => 'https://picsum.photos/200/301',
                'available_copies' => 2,
                'category_id' => 8, // Salute e Benessere
            ],
            [
                'title' => 'Il piccolo principe',
                'author' => 'Antoine de Saint-Exupéry',
                'isbn' => '9788845292613',
                'published_at' => '1943-01-01',
                'description' => 'Un racconto poetico sul senso della vita e dell’amore.',
                'cover_image' => 'https://picsum.photos/200/302',
                'available_copies' => 2,
                'category_id' => 1, // Narrativa
            ],
            [
                'title' => 'Cucchiaio d’argento',
                'author' => 'AA.VV.',
                'isbn' => '9788830402508',
                'published_at' => '1950-01-01',
                'description' => 'Il ricettario italiano più famoso del mondo.',
                'cover_image' => 'https://picsum.photos/201/302',
                'available_copies' => 2,
                'category_id' => 9, // Cucina
            ],
            [
                'title' => 'Il codice dell’anima',
                'author' => 'James Hillman',
                'isbn' => '9788850243571',
                'published_at' => '1996-01-01',
                'description' => 'Un viaggio psicologico e filosofico nell’identità personale.',
                'cover_image' => 'https://picsum.photos/202/308',
                'available_copies' => 2,
                'category_id' => 2, // Saggistica
            ],
            [
                'title' => 'Breve storia del tempo',
                'author' => 'Stephen Hawking',
                'isbn' => '9788850207382',
                'published_at' => '1988-01-01',
                'description' => 'Un’introduzione accessibile alla cosmologia moderna.',
                'cover_image' => 'https://picsum.photos/202/301',
                'available_copies' => 2,
                'category_id' => 6, // Scienze
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'isbn' => '9780132350884',
                'published_at' => '2008-01-01',
                'description' => 'Un libro fondamentale per scrivere codice leggibile e manutenibile.',
                'cover_image' => 'https://picsum.photos/205/301',
                'available_copies' => 2,
                'category_id' => 7, // Tecnologia
            ],
            [
                'title' => 'Le città invisibili',
                'author' => 'Italo Calvino',
                'isbn' => '9788807880164',
                'published_at' => '1972-01-01',
                'description' => 'Un viaggio immaginario e filosofico tra città fantastiche.',
                'cover_image' => 'https://picsum.photos/203/300',
                'available_copies' => 2,
                'category_id' => 11, // Letteratura
            ],
        ];


        foreach ($books as $bookData) {
            $category = Category::find($bookData['category_id']);

            if ($category) {
                // Se cover_image è vuoto o null, usa immagine default
                if (empty($bookData['cover_image'])) {
                    $path = 'covers/default.jpg'; // percorso immagine di default già salvata su disco public
                } else {
                    // Genera il nome file coerente con il titolo
                    $filename = 'cover_image_' . Str::slug($bookData['title']) . '.jpg';
                    $folder = Str::slug($bookData['title']);
                    $path = $folder . '/' . $filename;

                    // Scarica immagine da URL e salva nel disco public
                    try {
                        $imageContent = Http::get($bookData['cover_image'])->body();
                        Storage::disk('public')->put($path, $imageContent);
                    } catch (\Exception $e) {
                        // fallback se il download fallisce
                        $path = 'covers/default.jpg';
                    }
                }

                // Crea il libro
                Book::create([
                    'title' => $bookData['title'],
                    'author' => $bookData['author'],
                    'isbn' => $bookData['isbn'],
                    'published_at' => $bookData['published_at'],
                    'description' => $bookData['description'],
                    'cover_image' => $path,
                    'available_copies' => $bookData['available_copies'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
