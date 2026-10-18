
<script setup>
import { Link, router, usePage } from '@inertiajs/vue3'

defineProps({
    books: Object,
})

const page = usePage()

function hapusBuku(id) {
    if (confirm('Apakah kamu yakin ingin menghapus buku ini?')) {
        router.delete(`/buku/${id}`)
    }
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 p-6">
        <div class="mx-auto max-w-6xl rounded-lg bg-white p-6 shadow">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">
                    Daftar Buku Perpustakaan
                </h1>

                <Link
                    href="/buku/create"
                    class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                >
                    + Tambah Buku
                </Link>
            </div>

            <div
                v-if="page.props.flash?.success"
                class="mb-4 rounded bg-green-100 p-3 text-green-700"
            >
                {{ page.props.flash.success }}
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border p-3">No.</th>
                            <th class="border p-3">Kode Buku</th>
                            <th class="border p-3">Judul</th>
                            <th class="border p-3">Pengarang</th>
                            <th class="border p-3">Penerbit</th>
                            <th class="border p-3">Tahun</th>
                            <th class="border p-3">Stok</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-if="books.data.length === 0">
                            <td colspan="8" class="border p-4 text-center">
                                Belum ada data buku.
                            </td>
                        </tr>

                        <tr
                            v-for="(book, index) in books.data"
                            :key="book.id"
                        >
                            <td class="border p-3">
                                {{ books.from + index }}
                            </td>
                            <td class="border p-3">{{ book.kode_buku }}</td>
                            <td class="border p-3">{{ book.judul }}</td>
                            <td class="border p-3">{{ book.pengarang }}</td>
                            <td class="border p-3">{{ book.penerbit || '-' }}</td>
                            <td class="border p-3">{{ book.tahun || '-' }}</td>
                            <td class="border p-3">{{ book.stok }}</td>
                            <td class="border p-3">
                                <div class="flex gap-2">
                                    <Link
                                        :href="`/buku/${book.id}/edit`"
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
                    </tbody>
                </table>
            </div>

            <div class="mt-5 flex flex-wrap gap-2">
                <Link
                    v-for="(link, index) in books.links"
                    :key="index"
                    :href="link.url || '#'"
                    v-html="link.label"
                    class="rounded border px-3 py-2"
                    :class="{
                        'bg-blue-600 text-white': link.active,
                        'pointer-events-none opacity-50': !link.url,
                    }"
                />
            </div>
        </div>
    </div>
</template>
