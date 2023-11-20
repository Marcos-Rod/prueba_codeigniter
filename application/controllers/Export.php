<?php

defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function export()
    {
        $users = $this->User_model->users_complete();
        
        //Instanciación de Spreadsheet
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        //Encabezados de la tabla

        $sheet->setCellValue('A1', 'ID Usuario');
        $sheet->setCellValue('B1', 'Nombre completo');
        $sheet->setCellValue('C1', 'Genero');
        $sheet->setCellValue('D1', 'Correo');
        $sheet->setCellValue('E1', 'Teléfono');
        $sheet->setCellValue('F1', 'Tipo de usuario');
        $sheet->setCellValue('G1', 'Direccion');
        $sheet->setCellValue('H1', 'Estatus');
        $sheet->setCellValue('I1', 'Fecha de registro');

        $row = 2; //se inicializa en 2 para la siguiente fila

        //valores por cada fila
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user['id']);
            $sheet->setCellValue('B' . $row, $user['name'] . ' ' . $user['last_name']);
            $sheet->setCellValue('C' . $row, $user['gender']);
            $sheet->setCellValue('D' . $row, $user['email']);
            $sheet->setCellValue('E' . $row, $user['phone']);
            $sheet->setCellValue('F' . $row, $user['user_type']);
            $sheet->setCellValue('G' . $row, 'CP. ' . $user['codigo_postal'] . ', Col. ' . $user['colonia'] . ', Del. ' . $user['delegacion'] . ', Edo. ' . $user['estado']);
            $sheet->setCellValue('H' . $row, ($user['status'] == 1) ? 'Activo' : 'Inactivo');
            $sheet->setCellValue('I' . $row, $user['created_format']);

            $row++;
        }

        //Estilos para la primer fila
        $styleArray = [
            'font' => ['bold' => true],
        ];
        
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray($styleArray);
        

        // Objeto Writer para guardar el archivo Excel
        $writer = new Xlsx($spreadsheet);

        // Definir el nombre del archivo
        $filename = 'reporte_usuarios' . date('d-m-y-i-h-s') . '.xlsx';

        // Configurar el tipo de respuesta del navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Enviar el archivo Excel al navegador
        $writer->save('php://output');
    }
}
