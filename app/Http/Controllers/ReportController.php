<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Report;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use PDF;
class ReportController extends Controller
{
    /** index page report list */
    public function report()
    {
        $reportList = Report::orderBy('when', 'desc')->get();
        return view('report.report', compact('reportList'));
    }

    /** index page report grid */
    public function reportGrid()
    {
        $reportList = Report::all();
        return view('report.report-grid', compact('reportList'));
    }

    /** report add page */
    public function reportAdd()
    {
        return view('report.add-report');
    }

    /** report save record */
    public function reportSave(Request $request)
    {
        $request->validate([
            'category'  => 'required|string',
            'when'      => 'required|date|before_or_equal:today',
            'where'     => 'required|string',
            'who'       => 'required|string',
            'what'      => 'required|string',
            'why'       => 'required|string',
            'how'       => 'required|string',
        ], [
            'when.before_or_equal' => 'The date cannot exceed today.',
        ]);
        DB::beginTransaction();
        try {

            // $upload_file = rand() . '.' . $request->upload->extension();
            // $request->upload->move(storage_path('app/public/report-photos/'), $upload_file);
            // if(!empty($request->upload)) {
            $report = new Report;
            $report->category   = $request->category;
            $report->reporter    = User::find(auth()->user()->id)->name;
            $report->when       = $request->when;
            $report->where      = $request->where;
            $report->who        = $request->who;
            $report->what       = $request->what;
            $report->why        = $request->why;
            $report->how        = $request->how;
            $report->status     = 'Open';
            $report->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            // }
            return redirect()->to(
                route('report/list')
            );
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Add new report  :)', 'Error');
            return redirect()->back();
        }
    }

    /** view for edit report */
    public function reportEdit($id)
    {
        $reportEdit = Report::where('id', $id)->first();
        return view('report.edit-report', compact('reportEdit'));
    }

    /** view for edit report */
    public function reportView($id)
    {
        $reportView = Report::where('id', $id)->first();
        return view('report.view-report', compact('reportView'));
    }

    /** update record */
    public function reportUpdate(Request $request)
    {
        $request->validate([
            'category'  => 'required|string',
            'when'      => 'required|date|before_or_equal:today',
            'where'     => 'required|string',
            'who'       => 'required|string',
            'what'      => 'required|string',
            'why'       => 'required|string',
            'how'       => 'required|string',
        ], [
            'when.before_or_equal' => 'The date cannot exceed today.',
        ]);
        DB::beginTransaction();
        try {
            $updateRecord = [
                'category'   => $request->category,
                'when'       => $request->when,
                'where'      => $request->where,
                'who'        => $request->who,
                'what'       => $request->what,
                'why'        => $request->why,
                'how'        => $request->how,
                'status'     => 'Open',
            ];
            Report::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->to(
                route('report/list')
            );
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update report  :)', 'Error');
            return redirect()->back();
        }
    }

    /** update view record */
    public function reportUpdateView(Request $request)
    {
        $request->validate([
            'status'  => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            $updateRecord = [
                'status'   => $request->status,
            ];
            Report::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->to(
                route('report/list')
            );
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update report  :)', 'Error');
            return redirect()->back();
        }
    }

    /** report delete */
    public function reportDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (!empty($request->id)) {
                Report::destroy($request->id);
                //unlink(storage_path('app/public/report-photos/'.$request->avatar));
                DB::commit();
                Toastr::success('report deleted successfully :)', 'Success');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('report deleted fail :)', 'Error');
            return redirect()->back();
        }
    }

    /** report profile page */
    public function reportProfile($id)
    {
        $reportProfile = Report::where('id', $id)->first();
        return view('report.report-profile', compact('reportProfile'));
    }

    /** report export pdf */
    public function exportpdf($id)
    {
        $reportData = Report::where('id', $id)->first();
            $data = [
                'category' => $reportData->category,
                'who' => $reportData->who,
                'when' => $reportData->when,
                'where' => $reportData->where,
                'what' => $reportData->what,
                'why' => $reportData->why,
                'how' => $reportData->how,
                'status' => $reportData->status,
            ];
        $pdf = PDF::loadView('pdf.export', $data);
        $filename = 'Report_' . now()->format('dmY') . '.pdf';
        return $pdf->download($filename);
    }
}