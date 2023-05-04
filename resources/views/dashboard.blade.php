@extends('layouts.app')

@section('content')
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <!-- Page Heading -->
    <header>
        <p class="mb-2 text-sm font-semibold text-blue-600">Dashboard</p>
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Welcome to the SoftBenz Testing Project</h1>
        <p class="mt-2 text-lg text-gray-800 dark:text-gray-400">This project is designed and developed by Dipak Mahatara</p>
        <div class="mt-5 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
            <a href="{{ route('products.index') }}" class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                </svg>
                Go to products
            </a>

        </div>
    </header>
    <!-- End Page Heading -->
</div>
@stop