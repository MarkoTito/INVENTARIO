<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * SEEDER QUE CONTIENE LAS AREAS DE LAS MUNIS
     * ESTE SERA LLAMADO AL DATA-SEEDER PARA Q SE COORRA
     */
    public function run(): void
    {
        $areas=[
            [
                'nombre' => 'Consejo Municipal',
                'estado' => 1

            ],
            [
                'nombre' => 'Alcaldía',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Control Institucional',
                'estado' => 1

            ],
            [
                'nombre' => 'Procuradora Pública Municipal',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Integridad Institucional',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia Municipal',
                'estado' => 1

            ],
            [
                'nombre' => 'Secretaria General',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Trámite Documentario, Registro Civil y Archivo',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina General de Recursos Humanos',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina General de Administración y Finanzas',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina General de Comunicaciones',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina General de Asesoría Jurídica',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina General de Planeamiento y Presupuesto',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Abastecimiento y Patrimonio',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Contabilidad',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Tesorería',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Servicios Generales y Maestranza',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Presupuesto',
                'estado' => 1

            ],
            [
                'nombre' => 'Oficina de Desarrollo de Tecnologías de la Información y Estadística',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Inversiones Públicas',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Administración Tributaria',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Desarrollo Urbano',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Desarrollo Económico y Promoción Empresarial',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Fiscalización y Transporte',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Gestión Ambiental',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Seguridad Ciudadana',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Salud y Desarrollo Humano',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Deportes, Educación y Cultura',
                'estado' => 1

            ],
            [
                'nombre' => 'Gerencia de Participación Vecinal',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Obras Públicas Estudios y Proyectos',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia Administración Tributaria y Orientación al Contribuyente',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Recaudación Tributaria y Control de la Deuda',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Fiscalización Tributaria',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Obras Privadas y Planeamiento Urbano',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Catastro y Habilitaciones Urbanas',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Licencias y Autorizaciones Comerciales',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Gestión de Riesgo de Desastres',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Control y Operaciones',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Seguridad Vial, Transporte y  Tránsito',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Limpieza Publica',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Parques y Jardines',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Serenazgo',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Servicios Sociales',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Recursos Alimentarios',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Sanidad y Zoonosis',
                'estado' => 1

            ],
            [
                'nombre' => 'Subgerencia de Juventud, Educación y Cultura',
                'estado' => 1

            ],



        ];

        foreach ($areas as $area) {
            Area::create($area);
        }




            
    }
}
