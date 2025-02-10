<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Menampilkan daftar laporan.
     */
    public function index()
    {
        $reports = Report::all();
        return view('backend.report.index', compact('reports'));
    }

    /**
     * Menampilkan detail laporan.
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('backend.report.show', compact('report'));
    }

    /**
     * Menampilkan form edit status laporan.
     */
    public function editStatus($id)
    {
        $report = Report::findOrFail($id);
        return view('backend.report.edit', compact('report'));
    }

    /**
     * Memperbarui status laporan.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai'
        ]);

        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return redirect()->route('report.index')->with('success', 'Status laporan berhasil diperbarui.');
    }

    /**
     * Menghapus laporan.
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('report.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
