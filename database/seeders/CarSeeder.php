<?php

namespace Database\Seeders;

// ============================================
// Seeder : CarSeeder
// Description : Peuple la table 'cars' avec des voitures de démonstration.
// ============================================

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Exécute le seeder pour insérer les voitures.
     */
    public function run(): void
    {
        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Camry',
                'year' => 2023,
                'description' => 'La Toyota Camry est une berline fiable et efficace, parfaite pour les trajets quotidiens et les voyages en famille. Elle est équipée de systèmes de sécurité avancés, d\'un intérieur confortable et offre une excellente économie de carburant.',
                'price' => 28500000,
                'main_image' => 'cars/toyota-camry.jpg',
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2022,
                'description' => 'Sportive et économique, la Honda Civic offre un mélange parfait de performance et de praticité. Équipée de technologies modernes et d\'un habitacle spacieux, elle est idéale pour la ville comme pour les longs trajets.',
                'price' => 24999000,
                'main_image' => 'cars/honda-civic.jpg',
            ],
            [
                'brand' => 'Ford',
                'model' => 'F-150',
                'year' => 2024,
                'description' => 'Le pick-up le plus vendu en Amérique. Le Ford F-150 combine capacité robuste et confort moderne. Parfait pour le travail et les loisirs avec une impressionnante capacité de remorquage.',
                'price' => 45000000,
                'main_image' => 'cars/ford-f150.jpg',
            ],
            [
                'brand' => 'BMW',
                'model' => '3 Series',
                'year' => 2023,
                'description' => 'Le luxe rencontre la performance dans la BMW Série 3. Découvrez un savoir-faire premium, une technologie de pointe et un plaisir de conduite dynamique dans cette berline sportive allemande.',
                'price' => 42000000,
                'main_image' => 'cars/bmw-3series.jpg',
            ],
            [
                'brand' => 'Tesla',
                'model' => 'Model 3',
                'year' => 2024,
                'description' => 'Excellence du véhicule électrique. La Tesla Model 3 offre une accélération incroyable, une longue autonomie et des fonctionnalités d\'autopilote avancées. L\'avenir de l\'automobile est là.',
                'price' => 39990000,
                'main_image' => 'cars/tesla-model3.jpg',
            ],
            [
                'brand' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'year' => 2023,
                'description' => 'L\'incarnation du luxe et de la sophistication. La Mercedes-Benz Classe C offre un confort raffiné et des performances puissantes, avec un design élégant et des technologies innovantes.',
                'price' => 48000000,
                'main_image' => 'cars/mercedes-c-class.jpg',
            ],
            [
                'brand' => 'Audi',
                'model' => 'A4',
                'year' => 2023,
                'description' => 'L\'Audi A4 allie élégance, technologie et performance. Avec son design raffiné et ses innovations Quattro, cette berline allemande offre une expérience de conduite exceptionnelle.',
                'price' => 41500000,
                'main_image' => 'cars/audi-a4.jpg',
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Altima',
                'year' => 2022,
                'description' => 'La Nissan Altima est une berline familiale spacieuse et confortable, offrant une excellente fiabilité et des fonctionnalités modernes à un prix abordable.',
                'price' => 22500000,
                'main_image' => 'cars/nissan-altima.jpg',
            ],
            [
                'brand' => 'Volkswagen',
                'model' => 'Passat',
                'year' => 2023,
                'description' => 'La Volkswagen Passat est reconnue pour sa qualité de fabrication allemande, son espace intérieur généreux et son confort de conduite exceptionnel.',
                'price' => 32000000,
                'main_image' => 'cars/vw-passat.jpg',
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Sonata',
                'year' => 2024,
                'description' => 'La Hyundai Sonata combine design moderne, technologies avancées et rapport qualité-prix exceptionnel. Idéale pour les familles modernes.',
                'price' => 26500000,
                'main_image' => 'cars/hyundai-sonata.jpg',
            ],
            [
                'brand' => 'Mazda',
                'model' => 'CX-5',
                'year' => 2023,
                'description' => 'Le SUV compact Mazda CX-5 offre un design élégant, une maniabilité sportive et un intérieur de qualité supérieure. Parfait pour les aventures urbaines et les escapades.',
                'price' => 33500000,
                'main_image' => 'cars/mazda-cx5.jpg',
            ],
            [
                'brand' => 'Lexus',
                'model' => 'ES',
                'year' => 2023,
                'description' => 'La Lexus ES est le summum du luxe japonais avec son habitacle silencieux, son confort exceptionnel et sa fiabilité légendaire.',
                'price' => 52000000,
                'main_image' => 'cars/lexus-es.jpg',
            ],
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }

        echo "✅ " . count($cars) . " voitures créées avec succès!\n";
    }
}
