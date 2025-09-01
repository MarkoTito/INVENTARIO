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
                'UK_Nombre_Area' => 'Todas las áreas',
                'FK_Area_SedeId' => 1
            ],
            [
                'UK_Nombre_Area' => 'Consejo Municipal',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Alcaldía',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Control Institucional',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Procuradora Pública Municipal',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Integridad Institucional',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia Municipal',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Secretaria General',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Trámite Documentario, Registro Civil y Archivo',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Recursos Humanos',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Administración y Finanzas',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Comunicaciones',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Asesoría Jurídica',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Planeamiento y Presupuesto',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Abastecimiento y Patrimonio',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Contabilidad',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Tesorería',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Servicios Generales y Maestranza',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Presupuesto',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Desarrollo de Tecnologías de la Información y Estadística',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Inversiones Públicas',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Administración Tributaria',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Desarrollo Urbano',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Desarrollo Económico y Promoción Empresarial',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Fiscalización y Transporte',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Gestión Ambiental',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Seguridad Ciudadana',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Salud y Desarrollo Humano',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Deportes, Educación y Cultura',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Participación Vecinal',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Obras Públicas Estudios y Proyectos',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia Administración Tributaria y Orientación al Contribuyente',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Recaudación Tributaria y Control de la Deuda',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Fiscalización Tributaria',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Obras Privadas y Planeamiento Urbano',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Catastro y Habilitaciones Urbanas',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Licencias y Autorizaciones Comerciales',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Gestión de Riesgo de Desastres',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Control y Operaciones',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Seguridad Vial, Transporte y  Tránsito',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Limpieza Publica',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Parques y Jardines',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Serenazgo',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Servicios Sociales',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Recursos Alimentarios',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Sanidad y Zoonosis',
                'FK_Area_SedeId' => 1
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Juventud, Educación y Cultura',
                'FK_Area_SedeId' => 1
                

            ]

        ];

        foreach ($areas as $area) {
            Area::create($area);
        }




            
    }
}
