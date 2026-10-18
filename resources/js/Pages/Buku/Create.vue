
<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
    kode_buku: '',
    judul: '',
    pengarang: '',
    penerbit: '',
    tahun: '',
    stok: 0,
})

function simpanBuku() {
    form.post('/buku')
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 p-6">
        <div class="mx-auto max-w-2xl rounded-lg bg-white p-6 shadow">
            <h1 class="mb-6 text-2xl font-bold">
                Tambah Buku
            </h1>

            <form @submit.prevent="simpanBuku" class="space-y-4">
                <div>
                    <label class="mb-1 block font-medium">Kode Buku</label>
                    <input
                        v-model="form.kode_buku"
                        type="text"
                        class="w-full rounded border p-2"
                        placeholder="Contoh: BK001"
                    />
                    <p v-if="form.errors.kode_buku" class="mt-1 text-sm text-red-600">
                        {{ form.errors.kode_buku }}
                    </p>
                </div>

                <div>
                    <label class="mb-1 block font-medium">Judul Buku</label>
                    <input
                        v-model="form.judul"
                        type="text"
                        class="w-full rounded border p-2"
                        placeholder="Masukkan judul buku"
                    />
                    <p v-if="form.errors.judul" class="mt-1 text-sm text-red-600">
                        {{ form.errors.judul }}
                    </p>
                </div>

                <div>
                    <label class="mb-1 block font-medium">Pengarang</label>
                    <input
                        v-model="form.pengarang"
                        type="text"
                        class="w-full rounded border p-2"
                        placeholder="Nama pengarang"
                    />
                    <p v-if="form.errors.pengarang" class="mt-1 text-sm text-red-600">
                        {{ form.errors.pengarang }}
                    </p>
                </div>

                <div>
                    <label class="mb-1 block font-medium">Penerbit</label>
                    <input
                        v-model="form.penerbit"
                        type="text"
                        class="w-full rounded border p-2"
                        placeholder="Nama penerbit (opsional)"
                    />
                </div>

                <div>
                    <label class="mb-1 block font-medium">Tahun Terbit</label>
                    <input
                        v-model="form.tahun"
                        type="number"
                        min="1000"
                        max="9999"
                        class="w-full rounded border p-2"
                        placeholder="Contoh: 2025"
                    />
                    <p v-if="form.errors.tahun" class="mt-1 text-sm text-red-600">
                        {{ form.errors.tahun }}
                    </p>
                </div>

                <div>
                    <label class="mb-1 block font-medium">Stok Buku</label>
                    <input
                        v-model.number="form.stok"
                        type="number"
                        min="0"
                        class="w-full rounded border p-2"
                    />
                    <p v-if="form.errors.stok" class="mt-1 text-sm text-red-600">
                        {{ form.errors.stok }}
                    </p>
                </div>

                <div class="flex gap-3 pt-2">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 disabled:opacity-50"
                    >
                        {{ form.processing ? 'Menyimpan...' : 'Simpan Buku' }}
                    </button>

                    <Link
                        href="/buku"
                        class="rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600"
                    >
                        Kembali
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>
