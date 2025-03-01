<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    // ✅ GET ALL REPORTS
    public function index()
    {
        try {
            $reports = Report::latest()->get();

            $reports->transform(function ($report) {
                if ($report->image) {
                    $report->image = url('/') . Storage::url($report->image);
                }
                return $report;
            });

            return new JsonResponses(Response::HTTP_OK, "Semua Data Laporan berhasil didapatkan!", $reports);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ GET SINGLE REPORT
    public function show($id)
    {
        try {
            $report = Report::findOrFail($id);

            if ($report->image) {
                $report->image = url('/') . Storage::url($report->image);
            }

            return new JsonResponses(Response::HTTP_OK, "Satu Data Laporan berhasil didapatkan!", $report);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ CREATE NEW REPORT (Status otomatis "menunggu")
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'urgency' => 'required|in:Rendah,Sedang,Tinggi',
                'image' => 'nullable|image',
            ]);

            // Handle upload image
            $imagePath = $request->hasFile('image') ? $request->file('image')->store('reports', 'public') : null;

            $report = Report::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'urgency' => $request->urgency,
                'image' => $imagePath,
                'status' => 'Menunggu', // ✅ Status otomatis "menunggu"
            ]);

            return new JsonResponses(Response::HTTP_CREATED, "Laporan berhasil dikirim!", $report);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ UPDATE REPORT
    public function update(Request $request, $id)
    {
        try {
            // Debug: Periksa semua data yang masuk ke API
            // dd($request->all());

            $report = Report::findOrFail($id); // Pastikan data ditemukan

            // ✅ Validasi input
            $validatedData = $request->validate([
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'urgency' => 'nullable|in:Rendah,Sedang,Tinggi',
                'image' => 'nullable|image',
            ]);

            // ✅ Jika ada upload gambar baru, hapus gambar lama
            if ($request->hasFile('image')) {
                if (!empty($report->image)) {
                    Storage::disk('public')->delete($report->image);
                }
                $validatedData['image'] = $request->file('image')->store('reports', 'public');
            }

            // ✅ Debug: Periksa data yang masuk sebelum update
            // dd($validatedData);

            // ✅ Update data laporan
            $report->update($validatedData);

            return new JsonResponses(Response::HTTP_OK, "Laporan berhasil diperbarui!", $report);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }


    // ✅ DELETE REPORT
    public function destroy($id)
    {
        try {
            $report = Report::findOrFail($id);

            if (!empty($report->image)) {
                Storage::disk('public')->delete($report->image);
            }

            $report->delete();

            return new JsonResponses(Response::HTTP_OK, "Laporan berhasil dihapus!", null);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }
}
