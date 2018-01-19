<?php

use Illuminate\Database\Seeder;
use App\Regras;
use App\User;

class RegraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Permissões para o CRUD da lista
         */
        $regra1 = new Regras();
        $regra1->nome = "lista.view";
        $regra1->descricao = "Visualização da lista";
        $regra1->save();

        $regra2 = new Regras();
        $regra2->nome = "lista.create";
        $regra2->descricao = "Inserção na lista";
        $regra2->save();

        $regra3 = new Regras();
        $regra3->nome = "lista.update";
        $regra3->descricao = "Atualização da lista";
        $regra3->save();

        $regra4 = new Regras();
        $regra4->nome = "lista.delete";
        $regra4->descricao = "Apagar da lista";
        $regra4->save();


        /**
         * Permissões para o CRUD dos usuários
         */
         $regra5 = new Regras();
         $regra5->nome = "user.view";
         $regra5->descricao = "Visualização do usuário";
         $regra5->save();

         $regra6 = new Regras();
         $regra6->nome = "user.create";
         $regra6->descricao = "Inserção do usuário";
         $regra6->save();

         $regra7 = new Regras();
         $regra7->nome = "user.update";
         $regra7->descricao = "Atualização do usário";
         $regra7->save();

         $regra8 = new Regras();
         $regra8->nome = "user.delete";
         $regra8->descricao = "Apagar usuário";
         $regra8->save();

         /**
          * Permissão do master
          */
          $regra8 = new Regras();
          $regra8->nome = "master";
          $regra8->descricao = "Master";
          $regra8->save();

    }
}
