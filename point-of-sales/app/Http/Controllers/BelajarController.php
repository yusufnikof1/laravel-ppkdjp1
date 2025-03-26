<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('belajar');
    }
    public function tambah()
    {
        $jumlah = 0;
        return view('tambah', compact('jumlah'));
    }
    public function actionTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }
    public function kurang()
    {
        $kurang = 0;
        return view('kurang', compact('kurang'));
    }
    public function actionKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $kurang = $angka1 - $angka2;
        return view('kurang', compact('kurang'));
    }
    public function bagi()
    {
        $bagi = 0;
        return view('bagi', compact('bagi'));
    }
    public function actionBagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $bagi = $angka1 / $angka2;
        return view('bagi', compact('bagi'));
    }
    public function kali()
    {
        $kali = 0;
        return view('kali', compact('kali'));
    }
    public function actionKali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $kali = $angka1 * $angka2;
        return view('kali', compact('kali'));
    }
}
