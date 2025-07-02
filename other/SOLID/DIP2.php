<?php

//Задание 2:
//У вас есть класс ReportGenerator,
//который зависит от конкретного класса CsvExporter для экспорта отчета.
//Переработайте код, чтобы он соответствовал DIP,
//введя интерфейс и поддержку других форматов экспорта (например, JSON).
//Напишите код и покажите, как использовать новые классы.

interface ReportExportable
{
    public function export($data): string;
}

class CsvExporter implements ReportExportable {
    public function export($data): string {
        return "Экспорт в CSV: " . json_encode($data);
    }
}
class JSONExporter implements ReportExportable {
    public function export($data): string
    {
        return "Экспорт в JSON" . json_encode($data);
    }
}

class ReportGenerator_ { // _ т.к в этой папке уже обьявлен reportGenerator из spr задани
    private ReportExportable $exporter;

    public function __construct($exporter) {
        $this->exporter = $exporter;
    }

    public function generate($data): string {
        return $this->exporter->export($data);
    }
}

$data = "sadasdasdasdasdasda";

$jsonReportGenerator = new ReportGenerator_(new JSONExporter());
$csvReportGenerator = new ReportGenerator_(new CsvExporter());

var_dump($jsonReportGenerator->generate($data));
var_dump($csvReportGenerator->generate($data));