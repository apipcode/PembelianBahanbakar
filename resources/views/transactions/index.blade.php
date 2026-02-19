@extends('layouts.app')

@section('title', 'Daftar Transaksi - Pembelian Bahan Bakar')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Daftar Transaksi Pembelian Bahan Bakar</h1>
    <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition">
        + Tambah Transaksi
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Nama Pelanggan</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Jenis Bahan Bakar</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Liter</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Total Harga</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                @forelse($transactions as $transaction)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                            {{ $transaction->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                            {{ $transaction->customer_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                            {{ $transaction->fuel_type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700 text-right">
                            {{ number_format($transaction->liters, 2, ',', '.') }} L
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 text-right">
                            {{ $transaction->formatted_total_price }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="{{ route('transactions.edit', $transaction) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded transition">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                            Belum ada data transaksi. <a href="{{ route('transactions.create') }}" class="text-blue-600 hover:underline">Tambah transaksi pertama</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($transactions->hasPages())
        <div class="px-6 py-3 bg-slate-50 border-t border-slate-200">
            {{ $transactions->links() }}
        </div>
    @endif
</div>
@endsection
