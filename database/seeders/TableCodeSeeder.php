<?php

namespace Database\Seeders;

use App\Models\TableCode;
use Illuminate\Database\Seeder;

class TableCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.Dat
     *
     * @return void
     */

    public function run()
    {
        $table = new TableCode();
        $table->create([
            'pai' => '1',
            'item' => '0',
            'valor' => 'FLAG BOOLEAN',
            'descricao' => 'FLAG BOOLEAN',
        ]);
        $table->create([
            'pai' => '1',
            'item' => '1',
            'valor' => 0,
            'descricao' => 'NÃO',
        ]);
        $table->create([
            'pai' => '1',
            'item' => '2',
            'valor' => 1,
            'descricao' => 'SIM',
        ]);

        $table->create([
            'pai' => '2',
            'item' => '0',
            'valor' => 0,
            'descricao' => 'MARITAL STATUS',
        ]);
        $table->create([
            'pai' => '2',
            'item' => '1',
            'valor' => 1,
            'descricao' => 'SOLTEIRO (A)',
        ]);
        $table->create([
            'pai' => '2',
            'item' => '2',
            'valor' => 2,
            'descricao' => 'DIVORCIADO (A)',
        ]);
        $table->create([
            'pai' => '2',
            'item' => '3',
            'valor' => 3,
            'descricao' => 'VIÚVO (A)',
        ]);
        $table->create([
            'pai' => '2',
            'item' => '4',
            'valor' => 4,
            'descricao' => 'COMPANHEIRO (A)',
        ]);
        $table->create([
            'pai' => '2',
            'item' => '5',
            'valor' => 5,
            'descricao' => 'CASADO (A)',
            ]
        );

        // NATIONALITY

        $table->create([
            'pai' => '3',
            'item' => '0',
            'valor' => 0,
            'descricao' => 'NATIONALITY',
            ]
        );
        $table->create([
            'pai' => '3',
            'item' => '1',
            'valor' => 1,
            'descricao' => 'BRASILEIRA',
            ]
        );
        $table->create([
            'pai' => '3',
            'item' => '2',
            'valor' => 2,
            'descricao' => 'ESTRANGEIRA',
            ]
        );
        // COLLOR
        $table->create([
            'pai' => '4',
            'item' => '0',
            'valor' => 0,
            'descricao' => 'COLOR',
            ]
        );
        $table->create([
            'pai' => '4',
            'item' => '1',
            'valor' => 1,
            'descricao' => 'PRETA',
            ]
        );
        $table->create([
            'pai' => '4',
            'item' => '2',
            'valor' => 2,
            'descricao' => 'PARDA',
            ]
        );
        $table->create([
            'pai' => '4',
            'item' => '3',
            'valor' => 3,
            'descricao' => 'INDÍGENA',
            ]
        );
        $table->create([
            'pai' => '4',
            'item' => '4',
            'valor' => 4,
            'descricao' => 'AMARELA',
            ]
        );
        $table->create([
            'pai' => '4',
            'item' => '5',
            'valor' => 5,
            'descricao' => 'PREFIRO NÃO DECLARAR',
            ]
        );
        $table->create([
            'pai' => '4',
            'item' => '6',
            'valor' => 6,
            'descricao' => 'BRANCA',
            ]
        );
        // SEX
        $table->create([
            'pai' => '5',
            'item' => '0',
            'valor' => 0,
            'descricao' => 'SEX',
            ]
        );
        $table->create([
            'pai' => '5',
            'item' => '1',
            'valor' => 1,
            'descricao' => 'MASCULINO',
            ]
        );
        $table->create([
            'pai' => '5',
            'item' => '2',
            'valor' => 2,
            'descricao' => 'FEMININO',
            ]
        );
        // TIME WORK
        $table->create([
            'pai' => '6',
            'item' => '0',
            'valor' => 0,
            'descricao' => 'TIME_WORK',
            ]
        );
        $table->create([
            'pai' => '6',
            'item' => '1',
            'valor' => 1,
            'descricao' => 'MANHÃ',
            ]
        );
        $table->create([
            'pai' => '6',
            'item' => '2',
            'valor' => 2,
            'descricao' => 'TARDE',
            ]
        );
        $table->create([
            'pai' => '6',
            'item' => '3',
            'valor' => 3,
            'descricao' => 'NOITE',
            ]
        );
        $table->create([
            'pai' => '6',
            'item' => '4',
            'valor' => 4,
            'descricao' => 'HORÁRIO COMERCIAL',
            ]
        );
        //  PLACE STUDY
        $table->create([
            'pai' => '7',
            'item' => '0',
            'valor' => 0,
            'descricao' => 'PLACE STUDY',
            ]
        );
        $table->create([
            'pai' => '7',
            'item' => '1',
            'valor' => 1,
            'descricao' => 'POSITIVO',
            ]
        );
        $table->create([
            'pai' => '7',
            'item' => '2',
            'valor' => 2,
            'descricao' => 'OUTRO',
            ]
        );

        // UNIDADES FEDERATIVAS
        $table->create(['pai' => '8','item' => '0','valor' => '0','descricao' => 'UNIDADES FEDERATIVAS']);
        $table->create(['pai' => '8','item' => '1','valor' => 'AC','descricao' => 'Acre']);
        $table->create(['pai' => '8','item' => '2','valor' => 'AL','descricao' => 'Alagoas']);
        $table->create(['pai' => '8','item' => '3','valor' => 'AP','descricao' => 'Amapá']);
        $table->create(['pai' => '8','item' => '4','valor' => 'AM','descricao' => 'Amazonas']);
        $table->create(['pai' => '8','item' => '5','valor' => 'BA','descricao' => 'Bahia']);
        $table->create(['pai' => '8','item' => '6','valor' => 'CE','descricao' => 'Ceará']);
        $table->create(['pai' => '8','item' => '7','valor' => 'DF','descricao' => 'Distrito Federal']);
        $table->create(['pai' => '8','item' => '8','valor' => 'ES','descricao' => 'Espirito Santo']);
        $table->create(['pai' => '8','item' => '9','valor' => 'GO','descricao' => 'Goiás']);
        $table->create(['pai' => '8','item' => '10','valor' => 'MA','descricao' => 'Maranhão']);
        $table->create(['pai' => '8','item' => '11','valor' => 'MS','descricao' => 'Mato Grosso do Sul']);
        $table->create(['pai' => '8','item' => '12','valor' => 'MT','descricao' => 'Mato Grosso']);
        $table->create(['pai' => '8','item' => '13','valor' => 'MG','descricao' => 'Minas Gerais']);
        $table->create(['pai' => '8','item' => '14','valor' => 'PA','descricao' => 'Pará']);
        $table->create(['pai' => '8','item' => '15','valor' => 'PB','descricao' => 'Paraíba']);
        $table->create(['pai' => '8','item' => '16','valor' => 'PR','descricao' => 'Paraná']);
        $table->create(['pai' => '8','item' => '17','valor' => 'PE','descricao' => 'Pernambuco']);
        $table->create(['pai' => '8','item' => '18','valor' => 'PI','descricao' => 'Piauí']);
        $table->create(['pai' => '8','item' => '19','valor' => 'RJ','descricao' => 'Rio de Janeiro']);
        $table->create(['pai' => '8','item' => '20','valor' => 'RN','descricao' => 'Rio Grande do Norte']);
        $table->create(['pai' => '8','item' => '21','valor' => 'RS','descricao' => 'Rio Grande do Sul']);
        $table->create(['pai' => '8','item' => '22','valor' => 'RO','descricao' => 'Rondônia']);
        $table->create(['pai' => '8','item' => '23','valor' => 'RR','descricao' => 'Roraima']);
        $table->create(['pai' => '8','item' => '24','valor' => 'SC','descricao' => 'Santa Catarina']);
        $table->create(['pai' => '8','item' => '25','valor' => 'SP','descricao' => 'São Paulo']);
        $table->create(['pai' => '8','item' => '26','valor' => 'SE','descricao' => 'Sergipe']);
        $table->create(['pai' => '8','item' => '27','valor' => 'TO','descricao' => 'Tocantins']);

        // TYPE QUESTIONS
        $table->create(['pai' => '9','item' => '0','valor' => '0','descricao' => 'TYPE QUESTIONS']);
        $table->create(['pai' => '9','item' => '1','valor' => '1','descricao' => 'SIMPLES']);
        $table->create(['pai' => '9','item' => '2','valor' => '2','descricao' => 'MISTA ((S/N) + Texto)']);
        $table->create(['pai' => '9','item' => '3','valor' => '3','descricao' => 'TEXTO']);

        //  TYPE QUESTIONS
        $table->create(['pai' => '10','item' => '0','valor' => '0','descricao' => 'TYPE RESPONSES']);
        $table->create(['pai' => '10','item' => '1','valor' => '1','descricao' => 'GROUP']);
        $table->create(['pai' => '10','item' => '2','valor' => '2','descricao' => 'FREE']);

    }
}
