<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articulos')->insert([
            'art_numero' => '01',
            'art_descripcion' => 'Formación Profesional integral',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '02',
            'art_descripcion' => 'Comunidad Educativa SENA',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '03',
            'art_descripcion' => 'Aprendiz SENA',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '04',
            'art_descripcion' => 'Cumplimiento de Principios y Valores',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '05',
            'art_descripcion' => 'Centros de Convivencia',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '06',
            'art_descripcion' => 'Alcance',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '07',
            'art_descripcion' => 'Derechos del Aprendiz SENA',
            'capitulo_id' => 2,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '08',
            'art_descripcion' => 'Deberes del Aprendiz SENA',
            'capitulo_id' => 3,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '09',
            'art_descripcion' => 'Prohibiciones',
            'capitulo_id' => 3,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '10',
            'art_descripcion' => 'Ingreso',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '11',
            'art_descripcion' => 'Registro en el sistema de gestión académica',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '12',
            'art_descripcion' => 'Matrícula',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '13',
            'art_descripcion' => 'Trámite de las novedades académicas y administrativas',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '14',
            'art_descripcion' => 'Gestión de Novedades',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '15',
            'art_descripcion' => 'Certificación',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '16',
            'art_descripcion' => 'Expedición de documentos académicos',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '17',
            'art_descripcion' => 'Verificación de documentos académicos SENA para trámites de apostilla',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '18',
            'art_descripcion' => 'Solicitudes',
            'capitulo_id' => 4,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '19',
            'art_descripcion' => 'Participación y Cumplimiento',
            'capitulo_id' => 5,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '20',
            'art_descripcion' => 'Incumplimientos',
            'capitulo_id' => 5,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '21',
            'art_descripcion' => 'Incumplimiento justificado',
            'capitulo_id' => 5,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '22',
            'art_descripcion' => 'Incumplimiento injustificado',
            'capitulo_id' => 5,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '23',
            'art_descripcion' => 'Deserción',
            'capitulo_id' => 5,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '24',
            'art_descripcion' => 'Procedimiento en caso de deserción',
            'capitulo_id' => 5,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '25',
            'art_descripcion' => 'Faltas',
            'capitulo_id' => 6,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '26',
            'art_descripcion' => 'Faltas académicas',
            'capitulo_id' => 6,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '27',
            'art_descripcion' => 'Faltas disciplinarias',
            'capitulo_id' => 6,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '28',
            'art_descripcion' => 'Calificación de las faltas',
            'capitulo_id' => 6,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '29',
            'art_descripcion' => 'Criterios para calificar la falta',
            'capitulo_id' => 6,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '30',
            'art_descripcion' => 'Medidas formativas',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '31',
            'art_descripcion' => 'Tipos de medidas formativas',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '32',
            'art_descripcion' => 'Medidas formativas Académicas',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '33',
            'art_descripcion' => 'Medidas formativas disciplinarias',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '34',
            'art_descripcion' => 'Medidas Sancionatorias',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '35',
            'art_descripcion' => 'Instancias de evaluación y aplicación de las medidas formativas y sanciones',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '36',
            'art_descripcion' => 'Equipo ejecutor del programa de formación',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '37',
            'art_descripcion' => 'Comité de evaluación y seguimiento del Centro de formación',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '38',
            'art_descripcion' => 'Criterios para aplicación de sanciones',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '39',
            'art_descripcion' => 'Procedimiento para la aplicación de sanciones',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '40',
            'art_descripcion' => 'Citación al Aprendiz',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '41',
            'art_descripcion' => 'Sesión del Comité de Evaluación y Seguimiento',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '42',
            'art_descripcion' => 'Acto administrativo sancionatorio',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '43',
            'art_descripcion' => 'Notificación al Aprendiz',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '44',
            'art_descripcion' => 'Delegación',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '45',
            'art_descripcion' => 'Recurso de reposición',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '46',
            'art_descripcion' => 'Firmeza del acto administrativo',
            'capitulo_id' => 7,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '47',
            'art_descripcion' => 'Evaluación del Aprendizaje',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '48',
            'art_descripcion' => 'Las evidencias de aprendizaje',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '49',
            'art_descripcion' => 'Transparencia de la evaluación de aprendizaje',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '50',
            'art_descripcion' => 'Acompañamiento en el proceso evaluativo',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '51',
            'art_descripcion' => 'Juicios de la Evaluación',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '52',
            'art_descripcion' => 'Seguimiento de los resultados',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '53',
            'art_descripcion' => 'Inconformidad con la evaluación',
            'capitulo_id' => 8,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '54',
            'art_descripcion' => 'Representatividad de los aprendices',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '55',
            'art_descripcion' => 'Representantes voceros de ficha',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '56',
            'art_descripcion' => 'Requisitos y condiciones para ser Vocero de ficha',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '57',
            'art_descripcion' => 'Responsabilidades del Vocero de ficha',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '58',
            'art_descripcion' => 'Elección de los voceros de ficha',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '59',
            'art_descripcion' => 'Revocatoria de la designación de los voceros',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '60',
            'art_descripcion' => 'Suplencia de voceros',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '61',
            'art_descripcion' => 'Representantes de Centro',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '62',
            'art_descripcion' => 'Número de Representantes por Centro de Formación',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '63',
            'art_descripcion' => 'Periodo de Representación',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '64',
            'art_descripcion' => 'Requisitos y condiciones para postularse como Representante de los Aprendices del Centro',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '65',
            'art_descripcion' => 'Verificación de requisitos y condiciones para postularse como Representante de los Aprendices del Centro',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '66',
            'art_descripcion' => 'Responsabilidades del Representante de Aprendices en el Centro',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '67',
            'art_descripcion' => 'Dependencia responsable del proceso de Elección de Representantes de aprendices',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '68',
            'art_descripcion' => 'Procedimiento para elegir Representante de los Aprendices por Centro',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '69',
            'art_descripcion' => 'Revocatoria de la designación del Representante de Aprendiz SENA',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '70',
            'art_descripcion' => 'Suplencia de Representante de aprendices',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '71',
            'art_descripcion' => 'La Dirección de Formación Profesional desarrollará un plan para divulgar el presente reglamento en la comunidad educativa',
            'capitulo_id' => 9,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => '72',
            'art_descripcion' => 'El presente Acuerdo rige a partir de la fecha de su publicación en el Diario Oficial y deroga el Acuerdo 0007 del 2012 y el acuerdo 002 de 2014',
            'capitulo_id' => 9,
        ]);
    }
}
