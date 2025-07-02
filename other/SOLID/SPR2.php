<?php

//Задание 2:
//У вас есть класс ReportGenerator, который создает отчет и экспортирует его в PDF.
//Разделите его на классы, соответствующие SRP.
//Напишите код и покажите, как использовать новые классы.

class ReportGenerator
{
    public function generateReport($data)
    {
        $report = "Отчет:\n";
        foreach ($data as $key => $value) {
            $report .= "$key: $value\n";
        }
        // Экспорт в PDF (имитация)
        file_put_contents('report.pdf', $report);
        return $report;
    }
}

class ReportCreater
{
    public function createReport($data)
    {
        $report = "Отчет:\n";
        foreach ($data as $key => $value) {
            $report .= "$key: $value\n";
        }
        return $report;
    }
}

class ExporterPDF
{
    public function exportPDF($report)
    {
        file_put_contents('report.pdf', $report);
    }
}

$data = [
    'text' => 'some text',
    'text2' => 'some some text'
];

$reportCreater = new ReportCreater();
$exporterPDF = new ExporterPDF();

$exporterPDF->exportPDF($reportCreater->createReport($data));

