<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleMapService
{
    public function searchCityByPostalCode($postalcode)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $postalcode,
            'region' => 'fr',
            'components' => 'country:FR',
            'key' => env('GOOGLE_MAPS_API_KEY'),
        ]);

        $data = $response->json();

        if ($data['status'] === 'OK') {
            if (isset($data['results']) && !array_key_exists('partial_match', $data['results'][0])) {
                $city = $data['results'][0]['address_components'][1]['long_name'];
                $department = $data['results'][0]['address_components'][2]['long_name'];
                $cityLat = $data['results'][0]['geometry']['location']['lat'];
                $cityLong = $data['results'][0]['geometry']['location']['lng'];

                return [
                    'city' => $city,
                    'department' => $department,
                    'city_lat' => $cityLat,
                    'city_long' => $cityLong,
                ];
            } else {
                return ['error' => 'Code postal invalide'];
            }
        } else {
            return ['error' => 'Erreur de chargement'];
        }
    }
}