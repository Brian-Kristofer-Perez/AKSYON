<?php

    namespace App\Services;
    use App\Models\Report;
    use App\Models\StatusUpdate;

    class ReportService {

        public function addReport(Report $report) {
            $report->save();
        }

        public function getById($id) {
            return Report::where('userId', $id)->get();
        }

        public function deleteReport(int $reportId) {
            Report::destroy($reportId);
        }

        public function addUpdate($array) {
            
            $report = Report::find($array['currentReportId']);
            $report->status = $array['newStatus'];
            $report->description = $array['notes'];
            $report->date = now();

            $report->save();
        }

        public function getAll() {
            return Report::all();
        }

    }

?>