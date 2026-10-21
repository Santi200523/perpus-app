<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';

// Mengelola nilai input dan pesan validasi
const form = useForm({
    kode_buku: '',
    judul: '',
    pengarang: '',
    penerbit: '',
    tahun: '',
    stok: 0,
});

// Mengirim data ke BookController
function submit() {
    form.post(route('buku.store'));
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-6">
            <h1 class="text-xl font-bold mb-4">Tambah Buku</h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block mb-1">Kode Buku</label>
                    <input
                        v-model="form.kode_buku"
                        type="text"
                        class="w-full border rounded p-2"
                    />
                    <span class="text-red-600">
                        {{ form.errors.kode_buku }}
                    </span>
                </div>

                <div>
                    <label class="block mb-1">Judul</label>
                    <input
                        v-model="form.judul"
                        type="text"
                        class="w-full border rounded p-2"
                    />
                    <span class="text-red-600">
                        {{ form.errors.judul }}
                    </span>
                </div>

                <div>
                    <label class="block mb-1">Pengarang</label>
                    <input
                        v-model="form.pengarang"
                        type="text"
                        class="w-full border rounded p-2"
                    />
                    <span class="text-red-600">
                        {{ form.errors.pengarang }}
                    </span>
                </div>

                <div>
                    <label class="block mb-1">Penerbit</label>
                    <input
                        v-model="form.penerbit"
                        type="text"
                        class="w-full border rounded p-2"
                    />
                </div>

                <div>
                    <label class="block mb-1">Tahun</label>
                    <input
                        v-model="form.tahun"
                        type="text"
                        class="w-full border rounded p-2"
                    />
                    <span class="text-red-600">
                        {{ form.errors.tahun }}
                    </span>
                </div>

                <div>
                    <label class="block mb-1">Stok</label>
                    <input
                        v-model="form.stok"
                        type="number"
                        min="0"
                        class="w-full border rounded p-2"
                    />
                    <span class="text-red-600">
                        {{ form.errors.stok }}
                    </span>
                </div>

                <div class="flex gap-2">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="bg-indigo-600 text-white px-4 py-2 rounded"
                    >
                        {{ form.processing ? 'Menyimpan...' : 'Simpan' }}
                    </button>

                    <Link
                        href="/buku"
                        class="border px-4 py-2 rounded"
                    >
                        Kembali
                    </Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>