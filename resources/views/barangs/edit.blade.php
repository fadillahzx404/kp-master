@extends('layouts.app')
@section('title')
    Edit Barang
@endsection
@section('page-content')
    <div class="data-error" data-error="{!! \Session::get('error') !!}"></div>
    <div class="container px-12 pb-36 pt-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="user-created card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Edit Barang</p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('barangs.update', $data->id) }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Barang</span>
                        </label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang') ?? $data->nama_barang }}"
                            required
                            class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />
                    </div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Merk</span>

                        </div>
                        <select class="select select-bordered select-neutral focus:outline-offset-0 focus:border-neutral"
                            name="merk_id">
                            @foreach ($merkss as $merk)
                                <option value="{{ $merk->id }}" {{ $merk->id == $data->merk_id ? 'selected' : '' }}>
                                    {{ $merk->nama_merk }}
                                </option>
                            @endforeach

                        </select>

                    </label>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Stock</span>
                            </label>
                            <input type="number" name="stock" value="{{ old('stock') ?? $data->stock }}" required
                                class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Unit</span>
                            </label>
                            <input type="number" name="unit" value="{{ old('unit') ?? $data->unit }}" required
                                class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Photo</span>
                        </label>
                        <input type="file" class="file-input w-full " name="photo" />
                    </div>




                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('barangs.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-success text-white transition duration-300 hover:scale-90"
                            type="submit">Next</button>


                    </div>

                </form>
            </div>
        </section>

    </div>
@endsection
