<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use App\Models\MustahikKeluarga;
use App\Models\MustahikPengeluaran;
use App\Models\MustahikPenghasilan;
use App\Models\MustahikRekomendasi;
use App\Models\MustahikScoring;
use App\Models\MustahikTempatTinggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{

      public function index(Request $request)
      {
          // Get the filter parameter from the request (e.g., 'total_admin', 'total_surveyor', etc.)
          $filter = $request->input('filter');
          
          // Initialize the query
          $mustahikQuery = Mustahik::query()
              ->leftJoin('mustahik_scoring', 'mustahik.id', '=', 'mustahik_scoring.mustahik_id')
              ->leftJoin('mustahik_rekomendasi', 'mustahik.id', '=', 'mustahik_rekomendasi.mustahik_id');
      
          // Apply filter based on user role or specific filter from the request
          if (Auth::user()->level == 1) {
              $mustahikQuery->where('mustahik.user_id', Auth::user()->name);
          } else {
              if ($filter == 'total_admin') {
                  $mustahikQuery->leftJoin('users', 'mustahik.user_id', '=', 'users.name')
                                ->where('users.level', 0);
              } elseif ($filter == 'total_surveyor') {
                  $mustahikQuery->leftJoin('users', 'mustahik.user_id', '=', 'users.name')
                                ->where('users.level', 1);
              } elseif ($filter == 'total_ttd_sudah') {
                  $mustahikQuery->whereNotNull('mustahik_rekomendasi.signed_koordinator');
              } elseif ($filter == 'total_ttd_belum') {
                  $mustahikQuery->whereNull('mustahik_rekomendasi.signed_koordinator');
              } elseif ($filter == 'total_ditolak') {
                  $mustahikQuery->where('mustahik_scoring.rekomendasi_scoring', 0);
              } elseif ($filter == 'total_diterima') {
                  $mustahikQuery->where('mustahik_scoring.rekomendasi_scoring', 1);
              } elseif ($filter == 'surveyor') {
                $name = $request->input('name');
                $mustahikQuery->leftJoin('users', 'mustahik.user_id', '=', 'users.name')
                              ->where('users.name', $name);
              }
          }
          
          // Paginate results
          $mustahik = $mustahikQuery->paginate(4);
          //dd($mustahik);
          return view('home', compact('mustahik'));
      }
      

    public function dashboard(){
      $total_mustahik = Mustahik::count();
      $total_surveyor = Mustahik::leftJoin('users', 'mustahik.user_id', '=', 'users.name')->where('users.level', 1)->count();   
      $total_admin = Mustahik::leftJoin('users', 'mustahik.user_id', '=', 'users.name')->where('users.level', 0)->count();
      $total_ttd_sudah = Mustahik::leftJoin('mustahik_rekomendasi', 'mustahik.id', '=', 'mustahik_rekomendasi.mustahik_id')->where('mustahik_rekomendasi.signed_koordinator', '!=', null)->count();
      $total_ttd_belum = Mustahik::leftJoin('mustahik_rekomendasi', 'mustahik.id', '=', 'mustahik_rekomendasi.mustahik_id')->where('mustahik_rekomendasi.signed_koordinator', null)->count();
      $total_ditolak = Mustahik::leftJoin('mustahik_scoring', 'mustahik.id', '=', 'mustahik_scoring.mustahik_id')->where('mustahik_scoring.rekomendasi_scoring', 0)->count();
      $total_diterima = Mustahik::leftJoin('mustahik_scoring', 'mustahik.id', '=', 'mustahik_scoring.mustahik_id')->where('mustahik_scoring.rekomendasi_scoring', '!=', 0)->count();

 

      $detail_surveyor = Mustahik::selectRaw('users.name, count(*) as total')->leftJoin('users', 'mustahik.user_id', '=', 'users.name')->groupBy('users.name')->get();
      

      //dd($detail_surveyor, $total_mustahik, $total_surveyor, $total_admin, $total_ttd_sudah, $total_ttd_belum, $total_ditolak, $total_diterima);
      return view('dashboard', compact('total_mustahik', 'total_surveyor', 'total_admin', 'total_ttd_sudah', 'total_ttd_belum', 'total_ditolak', 'total_diterima', 'detail_surveyor'));
    }

  }