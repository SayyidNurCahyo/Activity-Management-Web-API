@extends('layouts.template')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="padding: 0px 100px 0px 100px">
            {{ __('Dashboard') }} <a href="{{ route('create.read') }}" style="float: right" class="btn btn-primary" role="button">Tambah Aktivitas</a>
        </h2>
    </x-slot>
    @section('Content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 20%">Aktivitas</th>
                                <th>Deskripsi</th>
                                <th style="width: 10%">Repetisi</th>
                                <th style="width: 20%">Tandai Selesai</th>
                                <th style="width: 15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            {{-- @if ($item->is_done==0) --}}
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->activity }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->repetition }}</td>
                                <td>
                                    @if ($item->is_done==0)
                                    <form action="{{ route('dashboard.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning btn-sm">Belum Selesai</button>
                                    </form>
                                    @else
                                    <form action="{{ route('dashboard.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus Aktivitas</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- @endif --}}
                            @endforeach        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 20%">Aktivitas</th>
                                <th>Deskripsi</th>
                                <th style="width: 10%">Repetisi</th>
                                <th style="width: 20%">Tandai Selesai</th>
                                <th style="width: 15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            @if ($item->is_done==1)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->activity }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->repetition }}</td>
                                <td>
                                    <form action="{{ route('dashboard.update', $item->id) }}">
                                        @csrf
                                        @method('UPDATE')
                                        <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.delete', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus Aktivitas</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
