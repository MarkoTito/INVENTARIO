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
                
            ],
            [
                'UK_Nombre_Area' => 'Consejo Municipal',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Alcaldía',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Control Institucional',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Procuradora Pública Municipal',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Integridad Institucional',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia Municipal',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Secretaria General',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Trámite Documentario, Registro Civil y Archivo',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Recursos Humanos',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Administración y Finanzas',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Comunicaciones',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Asesoría Jurídica',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina General de Planeamiento y Presupuesto',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Abastecimiento y Patrimonio',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Contabilidad',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Tesorería',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Servicios Generales y Maestranza',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Presupuesto',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Oficina de Desarrollo de Tecnologías de la Información y Estadística',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Inversiones Públicas',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Administración Tributaria',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Desarrollo Urbano',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Desarrollo Económico y Promoción Empresarial',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Fiscalización y Transporte',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Gestión Ambiental',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Seguridad Ciudadana',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Salud y Desarrollo Humano',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Deportes, Educación y Cultura',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Gerencia de Participación Vecinal',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Obras Públicas Estudios y Proyectos',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia Administración Tributaria y Orientación al Contribuyente',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Recaudación Tributaria y Control de la Deuda',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Fiscalización Tributaria',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Obras Privadas y Planeamiento Urbano',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Catastro y Habilitaciones Urbanas',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Licencias y Autorizaciones Comerciales',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Gestión de Riesgo de Desastres',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Control y Operaciones',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Seguridad Vial, Transporte y  Tránsito',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Limpieza Publica',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Parques y Jardines',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Serenazgo',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Servicios Sociales',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Recursos Alimentarios',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Sanidad y Zoonosis',
                
                

            ],
            [
                'UK_Nombre_Area' => 'Subgerencia de Juventud, Educación y Cultura',
                
                

            ]

        ];

        foreach ($areas as $area) {
            Area::create($area);
        }




            
    }
}
