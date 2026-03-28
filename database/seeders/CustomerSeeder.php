<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\FiscalData;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'customer_number' => 'CL-78301',
                'display_name' => 'Edificaciones del Valle SA',
                'address' => [
                    'street' => 'Blvd. Tollocan',
                    'ext_number' => '450',
                    'int_number' => null,
                    'neighborhood' => 'San Sebastián',
                    'city' => 'Toluca',
                    'state' => 'Estado de México',
                    'zip' => '50090',
                    'references' => 'Frente al parque industrial',
                ],
                'fiscal' => [
                    'rfc' => 'EDV780301ABC',
                    'legal_name' => 'Edificaciones del Valle SA de CV',
                    'tax_regime' => 'General de Ley Personas Morales',
                    'cfdi_use' => 'G03',
                    'email_for_invoice' => 'facturacion@edv.com',
                ],
            ],
            [
                'customer_number' => 'CL-33021',
                'display_name' => 'Grupo Constructor Anáhuac',
                'address' => [
                    'street' => 'Calle Reforma',
                    'ext_number' => '88',
                    'int_number' => null,
                    'neighborhood' => 'Doctores',
                    'city' => 'Ciudad de México',
                    'state' => 'CDMX',
                    'zip' => '06720',
                    'references' => null,
                ],
                'fiscal' => null,
            ],
            [
                'customer_number' => 'CL-55987',
                'display_name' => 'Distribuidora Peña e Hijos',
                'address' => [
                    'street' => 'Calle Juárez',
                    'ext_number' => '210',
                    'int_number' => 'B',
                    'neighborhood' => 'Centro Histórico',
                    'city' => 'Puebla',
                    'state' => 'Puebla',
                    'zip' => '72000',
                    'references' => 'Junto a la notaría',
                ],
                'fiscal' => [
                    'rfc' => 'DPH550987XYZ',
                    'legal_name' => 'Distribuidora Peña e Hijos SA',
                    'tax_regime' => 'Régimen Simplificado',
                    'cfdi_use' => 'G01',
                    'email_for_invoice' => 'facturas@pena.com',
                ],
            ],
        ];

        foreach ($customers as $c) {
            $customer = Customer::firstOrCreate(
                ['customer_number' => $c['customer_number']],
                [
                    'display_name' => $c['display_name'],
                    'created_at' => now(),
                ]
            );

            CustomerAddress::updateOrCreate(
                ['customer_id' => $customer->customer_id],
                array_merge($c['address'], [
                    'customer_id' => $customer->customer_id,
                ])
            );

            if ($c['fiscal']) {
                FiscalData::updateOrCreate(
                    ['customer_id' => $customer->customer_id],
                    array_merge($c['fiscal'], [
                        'customer_id' => $customer->customer_id,
                    ])
                );
            }
        }
    }
}