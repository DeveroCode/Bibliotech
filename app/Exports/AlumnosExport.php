<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AlumnosExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Alumno::select('Nombre', 'ApellidoP', 'ApellidoM', 'Email', 'Telefono', 'Direccion', 'No_Institucional', 'Fecha_Nacimiento', 'Anio_Ingreso', 'Carrera')->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Correo Institucional',
            'Teléfono',
            'Dirección',
            'No. Institucional',
            'Fecha Nacimiento',
            'Año Ingreso',
            'Carrera',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Estilo para los encabezados
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F2F2F2'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Estilo para todo el contenido
        $sheet->getStyle('A2:J' . $sheet->getHighestRow())->applyFromArray([
            'font' => [
                'size' => 10,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ]);

        // Ajustar altura de la fila de encabezado
        $sheet->getRowDimension(1)->setRowHeight(20);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 30,
            'E' => 15,
            'F' => 25,
            'G' => 20,
            'H' => 20,
            'I' => 15,
            'J' => 20,
        ];
    }

    public function title(): string
    {
        return 'Alumnos';
    }
}