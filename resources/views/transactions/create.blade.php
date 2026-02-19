@extends('layouts.app')

@section('title', 'Tambah Transaksi - Pembelian Bahan Bakar')

@section('content')
<div class="mb-6">
    <a href="{{ route('transactions.index') }}" class="text-slate-600 hover:text-slate-900 text-sm font-medium">← Kembali ke daftar</a>
    <h1 class="text-2xl font-bold text-slate-800 mt-1">Tambah Transaksi Baru</h1>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-2xl">
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="customer_name" class="block text-sm font-medium text-slate-700 mb-1">Nama Pelanggan <span class="text-red-500">*</span></label>
                <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required
                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('customer_name') border-red-500 @enderror">
                @error('customer_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="fuel_type" class="block text-sm font-medium text-slate-700 mb-1">Jenis Bahan Bakar <span class="text-red-500">*</span></label>
                <select name="fuel_type" id="fuel_type" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('fuel_type') border-red-500 @enderror">
                    <option value="">-- Pilih Jenis Bahan Bakar --</option>
                    @foreach(\App\Models\Transaction::FUEL_TYPES as $type)
                        <option value="{{ $type }}" {{ old('fuel_type') === $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @error('fuel_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="liters" class="block text-sm font-medium text-slate-700 mb-1">Jumlah Liter <span class="text-red-500">*</span></label>
                <input type="number" name="liters" id="liters" value="{{ old('liters') }}" step="0.01" min="0.01" required
                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('liters') border-red-500 @enderror">
                @error('liters')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="total_price" class="block text-sm font-medium text-slate-700 mb-1">Total Harga (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="total_price" id="total_price" value="{{ old('total_price') }}" step="0.01" min="0" required
                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('total_price') border-red-500 @enderror">
                @error('total_price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-6 flex gap-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition">Simpan</button>
            <a href="{{ route('transactions.index') }}" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-lg transition">Batal</a>
        </div>
    </form>
</div>
@endsection
