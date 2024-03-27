@extends('layouts.template')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="padding: 0px 100px">
            {{ __('Tambah Aktivitas') }}
        </h2>
    </x-slot>
    @section('Content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                    <div style="padding: 0px 190px 0px 190px">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <b>Data Aktivitas Belum Lengkap Atau Format Salah</b>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('create') }}">
                        @csrf
                        <div class="row mb-3 justify-content-center">
                            <label for="" class="col-sm-2 col-form-label"><b>Aktivitas</b></label>
                            <div class="col-sm-6"><input type="text" name="activity" class="form-control border-1 border-dark"></div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <label for="" class="col-sm-2 col-form-label"><b>Dekripsi</b></label>
                            <div class="col-sm-6"><textarea name="description" cols="30" rows="10" class="form-control border-1 border-dark"></textarea></div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <label for="" class="col-sm-2 col-form-label"><b>Repetisi</b></label>
                            <div class="col-sm-6"><input type="text" name="repetition" class="form-control border-1 border-dark"></div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="offset-sm-2 col-sm-3 d-grid"><button class="btn btn-primary" type="submit">Submit</button></div>
                            <div class="col-sm-3 d-grid"><a href="{{ route('dashboard') }}" class="btn btn-outline-primary" role="button">Kembali</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
