<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = date("Y-m-d H:i:s");

        DB::table("state")->insert([
            [
                "id"         => 11,
                "name"       => "Rondônia",
                "acronym"       => "RO",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 12,
                "name"       => "Acre",
                "acronym"       => "AC",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 13,
                "name"       => "Amazonas",
                "acronym"       => "AM",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 14,
                "name"       => "Roraima",
                "acronym"       => "RR",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 15,
                "name"       => "Pará",
                "acronym"       => "PA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 16,
                "name"       => "Amapá",
                "acronym"       => "AP",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 17,
                "name"       => "Tocantins",
                "acronym"       => "TO",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 21,
                "name"       => "Maranhão",
                "acronym"       => "MA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 22,
                "name"       => "Piauí",
                "acronym"       => "PI",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 23,
                "name"       => "Ceará",
                "acronym"       => "CE",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 24,
                "name"       => "Rio Grande do Norte",
                "acronym"       => "RN",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 25,
                "name"       => "Paraíba",
                "acronym"       => "PB",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 26,
                "name"       => "Pernambuco",
                "acronym"       => "PE",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 27,
                "name"       => "Alagoas",
                "acronym"       => "AL",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 28,
                "name"       => "Sergipe",
                "acronym"       => "SE",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 29,
                "name"       => "Bahia",
                "acronym"       => "BA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 31,
                "name"       => "Minas Gerais",
                "acronym"       => "MG",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 32,
                "name"       => "Espírito Santo",
                "acronym"       => "ES",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 33,
                "name"       => "Rio de Janeiro",
                "acronym"       => "RJ",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 35,
                "name"       => "São Paulo",
                "acronym"       => "SP",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 41,
                "name"       => "Paraná",
                "acronym"       => "PR",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 42,
                "name"       => "Santa Catarina",
                "acronym"       => "SC",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 43,
                "name"       => "Rio Grande do Sul",
                "acronym"       => "RS",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 50,
                "name"       => "Mato Grosso do Sul",
                "acronym"       => "MS",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 51,
                "name"       => "Mato Grosso",
                "acronym"       => "MT",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 52,
                "name"       => "Goiás",
                "acronym"       => "GO",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 53,
                "name"       => "Distrito Federal",
                "acronym"       => "DF",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);

    }

}
