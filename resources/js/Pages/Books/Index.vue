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
            <h1 class="text-xl font-bold mb-4">Data Buku</h1>

            <Link
                href="/buku/create"
                class="inline-block bg-indigo-600 text-white px-4 py-2 rounded mb-4"
            >
                + Tambah Buku
            </Link>

            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">Kode</th>
                        <th class="border p-2">Judul</th>
                        <th class="border p-2">Pengarang</th>
                        <th class="border p-2">Stok</th>
                        <th class="border p-2">Tahun</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="book in books.data"
                        :key="book.id"
                    >
                        <td class="border p-2">
                            {{ book.kode_buku }}
                        </td>
                        <td class="border p-2">
                            {{ book.judul }}
                        </td>
                        <td class="border p-2">
                            {{ book.pengarang }}
                        </td>
                        <td class="border p-2">
                            {{ book.stok }}
                        </td>
                        <td class="border p-2">
                            {{ book.tahun ?? '-' }}
                        </td>
                    </tr>

                    <tr v-if="books.data.length === 0">
                        <td colspan="5" class="border p-4 text-center">
                            Belum ada data buku.
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4 flex gap-2">
                <Link
                    v-if="books.prev_page_url"
                    :href="books.prev_page_url"
                    class="px-3 py-2 border rounded"
                >
                    Sebelumnya
                </Link>

                <Link
                    v-if="books.next_page_url"
                    :href="books.next_page_url"
                    class="px-3 py-2 border rounded"
                >
                    Berikutnya
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>