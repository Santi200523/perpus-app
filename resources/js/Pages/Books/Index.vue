<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    books: Object,
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Data Buku</h1>
                <Link href="/books/create"
                      class="px-4 py-2 bg-indigo-700 text-white rounded-lg hover:bg-indigo-800">
                    + Tambah Buku
                </Link>
            </div>

            <div class="bg-white rounded-xl shadow overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 text-gray-600 text-sm">
                        <tr>
                            <th class="px-4 py-3">Kode</th>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Pengarang</th>
                            <th class="px-4 py-3">Tahun</th>
                            <th class="px-4 py-3">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="book in books.data" :key="book.id" class="border-t">
                            <td class="px-4 py-3">{{ book.kode_buku }}</td>
                            <td class="px-4 py-3">{{ book.judul }}</td>
                            <td class="px-4 py-3">{{ book.pengarang }}</td>
                            <td class="px-4 py-3">{{ book.tahun }}</td>
                            <td class="px-4 py-3">{{ book.stok }}</td>
                        </tr>
                        <tr v-if="books.data.length === 0">
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Belum ada data buku.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex gap-1 mt-4">
                <template v-for="l in books.links" :key="l.label">
                    <Link v-if="l.url" :href="l.url" v-html="l.label"
                          class="px-3 py-1 rounded border"
                          :class="l.active ? 'bg-indigo-700 text-white' : 'bg-white text-gray-700'" />
                    <span v-else v-html="l.label" class="px-3 py-1 rounded border text-gray-400"></span>
                </template>
            </div>
        </div>
    </AuthenticatedLayout>
</template>