<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'sku' => 'BLO-001',
                'name' => 'Block de concreto',
                'unit' => 'piezas',
                'stock_quantity' => 500,
                'minimum_stock' => 50,
                'active' => true,
            ],
            [
                'sku' => 'LAD-002',
                'name' => 'Ladrillo rojo',
                'unit' => 'millares',
                'stock_quantity' => 30,
                'minimum_stock' => 5,
                'active' => true,
            ],
            [
                'sku' => 'YES-003',
                'name' => 'Yeso',
                'unit' => 'sacos',
                'stock_quantity' => 0,
                'minimum_stock' => 10,
                'active' => true,
            ],
            [
                'sku' => 'MAL-004',
                'name' => 'Malla electrosoldada',
                'unit' => 'rollos',
                'stock_quantity' => 18,
                'minimum_stock' => 5,
                'active' => true,
            ],
            [
                'sku' => 'TUB-005',
                'name' => 'Tubería PVC 4"',
                'unit' => 'piezas',
                'stock_quantity' => 0,
                'minimum_stock' => 8,
                'active' => true,
            ],
        ];

        foreach ($products as $p) {
            Product::updateOrCreate(
                ['sku' => $p['sku']],
                $p
            );
        }
    }
}