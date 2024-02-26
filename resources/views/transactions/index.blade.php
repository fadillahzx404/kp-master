@extends('layouts.app')
@section('title')
    Transaksi
@endsection
@section('page-content')
    <div class="flash-data" data-flash="{!! \Session::get('Success') !!}"></div>
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <div class="relative overflow-x-auto shadow-lg border bg-white border-gray-200 sm:rounded-lg p-5">
            <div class="title-table grid">
                <div class="flex justify-between">
                    <div class="grid place-content-center">
                        <p class="text-lg font-bold">Transaksi</p>
                        <p class="text-sm font-light text-gray-400">Transaksi ada disini, anda bisa menambahkan, megedit atau
                            menghapus.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('transactions.create') }}"
                            class="btn btn-sm btn-neutral text-white transition duration-300 hover:scale-90 my-3 hover:text-black hover:bg-gray-200">Tambah
                            Transaksi</a>
                        <button id="btnPrint"
                            class="btn btn-sm btn-neutral text-white transition duration-300 hover:scale-90 my-3 hover:text-black hover:bg-gray-200">
                            Print</button>
                    </div>
                </div>

                <hr class="mb-3 mt-2 border-gray-400" />

            </div>
            <div class="form-control grid justify-center mb-6 mt-2 text-center
            s">
                <p class="text-sm mr-8">Pilih Tanggal</pc>

                <form method="GET">
                    <div id="dateRangePickerId" class="flex items-center pt-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input type="text" id="dateRangePickerId" name="start"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input type="text" id="dateRangePickerId" name="end"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>
                        <div class="relative ml-3">
                            <button class="btn btn-sm btn-accent">Filter</button>
                        </div>

                    </div>
                </form>


            </div>
            <div class="flex justify-between pb-4">
                <div class="input-search self-center">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="searchInput"
                            class="block p-2 pl-10 text-sm text-gray-900 border  border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-gray-900    focus:border-gray-900     "
                            placeholder="Search for items">
                    </div>
                </div>

                <div class="select-transaksi">
                    <div class="grid text-center">
                        <p>Pilih Transasksi: </p>
                        <div class="flex gap-3 pt-3">
                            <form method="GET">
                                <button type="submit" value="lihat_semua" name="tipe_transaksi"
                                    class="btn btn-neutral btn-sm">Lihat
                                    Semua</button>
                            </form>
                            <form method="GET">
                                <button type="submit" value="Masuk" name="tipe_transaksi" class="btn btn-neutral btn-sm">
                                    Masuk</button>
                            </form>
                            <form method="GET">
                                <button type="submit" value="Keluar" name="tipe_transaksi" class="btn btn-neutral btn-sm">
                                    Keluar</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 datatable  display" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-white">
                    <tr>
                        <th scope="col" class="w-10 p-4 text-center" style="text-align:center;">
                            No
                        </th>
                        <th scope="col" class="p-4 text-center" style="text-align:center;">
                            Nama Barang
                        </th>
                        <th scope="col" class="p-4 text-center" style="text-align:center;">
                            Merk
                        </th>
                        <th scope="col" class="p-4 text-center" style="text-align:center;">
                            Jumlah
                        </th>
                        <th scope="col" class="p-4 text-center" style="text-align:center;">
                            Tanggal
                        </th>
                        <th scope="col" class="p-4 text-center" style="text-align:center;">
                            Status
                        </th>

                        <th scope="col" class="p-4 text-end" style="text-align:end;">
                            Action
                        </th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($datas as $data)
                        <tr class="border-2 ">
                            <td class="p-4 text-center ">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="p-4 whitespace-nowrap  text-center">
                                {{ $data->barangss->nama_barang }}
                            </th>
                            <th class="p-4  text-center">
                                {{ $data->barangss->merks->nama_merk }}
                            </th>
                            <th class="p-4  text-center">
                                {{ $data->jumlah }}
                            </th>
                            <th class="p-4  text-center">
                                {{ $data->tanggal }}
                            </th>
                            <th class="p-4 text-center">
                                <p class="badge {{ $data->status == 'Masuk' ? 'badge-accent' : 'badge-error' }}">
                                    {{ $data->status }}</p>
                            </th>


                            <td class="p-4 text-end">

                                <div class="dropdown dropdown-end ">
                                    <label tabindex="0"
                                        class="btn btn-sm inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 shadow-sm shadow-gray-400">Action
                                        <span><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg></span></label>
                                    <ul tabindex="0"
                                        class="mt-1 dropdown-content z-[1] menu p-2 shadow bg-base-100 border rounded-box w-36">
                                        <li class=""><a href="{{ route('transactions.edit', $data->id) }}"
                                                class="hover:bg-orange-400 hover:text-white"><span><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a></li>

                                        <li>
                                            <form action="{{ route('transactions.destroy', $data->id) }}"
                                                class="hover:bg-red-500 hover:text-white" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa-solid fa-trash"></i>
                                                    Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
