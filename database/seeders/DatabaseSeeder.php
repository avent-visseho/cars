<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\CarSeeder; // ✅ <-- ajoute le namespace complet

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur admin
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@ImportCars.com',
            'password' => bcrypt('password'),
        ]);

        // Appeler le seeder des voitures
        $this->call([
            CarSeeder::class,
        ]);

        echo "\n✅ Base de données peuplée avec succès!\n";
        echo "📧 Email admin: admin@ImportCars.com\n";
        echo "🔑 Mot de passe: password\n\n";
    }
}
