<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = [
            // Afrique
            ['nom' => 'Dakar', 'pays' => 'Sénégal', 'latitude' => 14.6928, 'longitude' => -17.4467, 'population' => 1146051],
            ['nom' => 'Abidjan', 'pays' => 'Côte d\'Ivoire', 'latitude' => 5.3097, 'longitude' => -4.0127, 'population' => 4765000],
            ['nom' => 'Nairobi', 'pays' => 'Kenya', 'latitude' => -1.2864, 'longitude' => 36.8172, 'population' => 4397000],
            ['nom' => 'Le Caire', 'pays' => 'Égypte', 'latitude' => 30.0444, 'longitude' => 31.2357, 'population' => 9900000],

            // Europe
            ['nom' => 'Paris', 'pays' => 'France', 'latitude' => 48.8566, 'longitude' => 2.3522, 'population' => 2148000],
            ['nom' => 'Berlin', 'pays' => 'Allemagne', 'latitude' => 52.5200, 'longitude' => 13.4050, 'population' => 3769000],
            ['nom' => 'Madrid', 'pays' => 'Espagne', 'latitude' => 40.4168, 'longitude' => -3.7038, 'population' => 3266000],
            ['nom' => 'Rome', 'pays' => 'Italie', 'latitude' => 41.9028, 'longitude' => 12.4964, 'population' => 2873000],

            // Amérique
            ['nom' => 'New York', 'pays' => 'États-Unis', 'latitude' => 40.7128, 'longitude' => -74.0060, 'population' => 8419000],
            ['nom' => 'São Paulo', 'pays' => 'Brésil', 'latitude' => -23.5505, 'longitude' => -46.6333, 'population' => 12330000],
            ['nom' => 'Buenos Aires', 'pays' => 'Argentine', 'latitude' => -34.6037, 'longitude' => -58.3816, 'population' => 3075646],

            // Asie
            ['nom' => 'Tokyo', 'pays' => 'Japon', 'latitude' => 35.6895, 'longitude' => 139.6917, 'population' => 13929286],
            ['nom' => 'Pékin', 'pays' => 'Chine', 'latitude' => 39.9042, 'longitude' => 116.4074, 'population' => 21540000],

            // Autres
            ['nom' => 'Sydney', 'pays' => 'Australie', 'latitude' => -33.8688, 'longitude' => 151.2093, 'population' => 5312163],
            ['nom' => 'Moscou', 'pays' => 'Russie', 'latitude' => 55.7558, 'longitude' => 37.6173, 'population' => 12506468],
        ];

        foreach ($villes as $ville) {
            Ville::create($ville);
        }
    
    }
}
