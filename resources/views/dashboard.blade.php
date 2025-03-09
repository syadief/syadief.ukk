@extends('layout.header')
@section('main')
    <div class="container mx-auto px-4 py-6">
        @if (Auth::check())
            <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-lg p-8 mb-8 text-white">
                <h1 class="text-4xl font-bold">
                    Dashboard
                </h1>
                <p class="text-emerald-100 mt-2">
                    Selamat datang kembali, {{ auth::user()->name }}
                </p>
            </div>
        @endif

        <!-- Tabel Transaksi -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800">Transaksi Terbaru</h2>
                <p class="text-sm text-gray-500 mt-1">Daftar transaksi yang tercatat dalam sistem</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white">
                            <th class="px-6 py-3 text-left text-sm font-semibold">Pelanggan</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Sepeda</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Sewa</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($transaksi as $t)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $t->pelanggan->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $t->sepeda->merk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ date('d/m/Y', strtotime($t->tanggalSewa)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $t->status == 'LUNAS' ? 'bg-emerald-100 text-emerald-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $t->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                Rp {{ number_format($t->totalBiaya, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection