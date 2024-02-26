@extends('layouts.app')
@section('title')
    Tambah Category
@endsection
@section('page-content')
    <div class="container px-12 pb-36 pt-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="user-created card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Tambah Transaksi</p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('transactions.store') }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-control grid justify-center mb-6">

                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepickerId" type="text" name="tanggal" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-80 ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Pilih Barang</span>

                            </div>
                            <select
                                class="select select-bordered select-neutral focus:outline-offset-0 focus:border-neutral"
                                name="barang_id" id="selectedBarang">
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}" class="option-item"
                                        id="{{ $barang->merks->nama_merk }}">{{ $barang->nama_barang }}</option>
                                @endforeach

                            </select>

                        </label>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-sm">Nama Merk</span>
                            </label>
                            <input type="text" id="merk" readonly
                                class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Jumlah</span>
                            </label>
                            <input type="number" name="jumlah"
                                class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />
                        </div>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-sm">Pilih Status</span>

                            </div>
                            <select
                                class="select select-bordered select-neutral focus:outline-offset-0 focus:border-neutral"
                                name="status">
                                <option value="Masuk">Masuk</option>
                                <option value="Keluar">Keluar</option>
                            </select>

                        </label>
                        
                    </div>




                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('transactions.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-success text-white transition duration-300 hover:scale-90"
                            type="submit">Next</button>


                    </div>

                </form>
            </div>
        </section>

    </div>
@endsection

@push('addon-script')
    <script>
        var x = $('#selectedBarang').find("option:selected").attr("id");
        $('#merk').val(x);
        $('#selectedBarang').change(function() {
            var x = $('#selectedBarang').find("option:selected").attr("id");
            $('#merk').val(x);
        });
    </script>
@endpush
