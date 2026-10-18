
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const menu = [
    {
        judul: 'Data Buku',
        deskripsi: 'Lihat, tambah, dan kelola koleksi buku.',
        tautan: '/buku',
        ikon: '📚',
    },
    {
        judul: 'Data Anggota',
        deskripsi: 'Kelola data anggota perpustakaan.',
        tautan: '/anggota',
        ikon: '👥',
    },
    {
        judul: 'Peminjaman',
        deskripsi: 'Kelola data peminjaman buku.',
        tautan: '/peminjaman',
        ikon: '📝',
    },
];
</script>

<template>
    <Head title="Dashboard Perpustakaan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard Perpustakaan
            </h2>
        </template>

        <div class="min-h-screen bg-gray-100 py-8">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-8 rounded-xl bg-blue-900 p-8 text-white shadow">
                    <p class="text-sm text-blue-200">
                        SISTEM INFORMASI PERPUSTAKAAN
                    </p>

                    <h1 class="mt-2 text-3xl font-bold">
                        Selamat Datang!
                    </h1>

                    <p class="mt-3 text-blue-100">
                        Kelola buku, anggota, dan peminjaman melalui dashboard ini.
                    </p>
                </div>

                <h3 class="mb-4 text-lg font-bold text-gray-800">
                    Menu Perpustakaan
                </h3>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <Link
                        v-for="item in menu"
                        :key="item.judul"
                        :href="item.tautan"
                        class="rounded-xl bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md"
                    >
                        <div class="text-4xl">{{ item.ikon }}</div>

                        <h4 class="mt-4 text-lg font-bold text-gray-800">
                            {{ item.judul }}
                        </h4>

                        <p class="mt-2 text-sm text-gray-600">
                            {{ item.deskripsi }}
                        </p>

                        <p class="mt-5 font-semibold text-blue-700">
                            Buka menu →
                        </p>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
