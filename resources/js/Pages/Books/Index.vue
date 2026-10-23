<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    books: Object,
    search: {
        type: String,
        default: '',
    },
});

const page = usePage();
const keyword = ref(props.search);

watch(() => props.search, (value) => {
    keyword.value = value ?? '';
});

function cariBuku() {
    router.get(route('buku.index'), {
        search: keyword.value,
    }, {
        preserveState: true,
        replace: true,
    });
}

function hapusBuku(id) {
    if (confirm('Yakin ingin menghapus buku ini?')) {
        router.delete(route('buku.destroy', id));
    }
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-6">
            <h1 class="mb-4 text-xl font-bold">Data Buku</h1>

            <div
                v-if="page.props.flash?.success"
                class="mb-4 rounded bg-green-100 p-3 text-green-800"
            >
                {{ page.props.flash.success }}
            </div>

            <div class="mb-4 flex flex-wrap gap-2">
                <Link
                    href="/buku/create"
                    class="rounded bg-indigo-600 px-4 py-2 text-white"
                >
                    + Tambah Buku
                </Link>

                <input
                    v-model="keyword"
                    @keyup.enter="cariBuku"
                    type="text"
                    placeholder="Cari kode, judul, atau pengarang..."
                    class="rounded border border-gray-300 px-3 py-2"
                />

                <button
                    @click="cariBuku"
                    class="rounded bg-gray-700 px-4 py-2 text-white"
                >
                    Cari
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Kode</th>
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Pengarang</th>
                            <th class="border p-2">Stok</th>
                            <th class="border p-2">Tahun</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="book in books.data" :key="book.id">
                            <td class="border p-2">{{ book.kode_buku }}</td>
                            <td class="border p-2">{{ book.judul }}</td>
                            <td class="border p-2">{{ book.pengarang }}</td>
                            <td class="border p-2">{{ book.stok }}</td>
                            <td class="border p-2">{{ book.tahun ?? '-' }}</td>
                            <td class="border p-2">
                                <div class="flex gap-2">
                                    <Link
                                        :href="route('buku.edit', book.id)"
                                        class="rounded bg-yellow-500 px-3 py-1 text-white"
                                    >
                                        Edit
                                    </Link>

                                    <button
                                        @click="hapusBuku(book.id)"
                                        class="rounded bg-red-600 px-3 py-1 text-white"
                                    >
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr v-if="books.data.length === 0">
                            <td colspan="6" class="border p-4 text-center">
                                Data buku tidak ditemukan.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex items-center gap-2">
                <Link
                    v-if="books.prev_page_url"
                    :href="books.prev_page_url"
                    class="rounded border px-3 py-2"
                >
                    Sebelumnya
                </Link>

                <span>
                    Halaman {{ books.current_page }} dari {{ books.last_page }}
                </span>

                <Link
                    v-if="books.next_page_url"
                    :href="books.next_page_url"
                    class="rounded border px-3 py-2"
                >
                    Berikutnya
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
