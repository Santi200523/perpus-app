<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    kode_buku: '',
    judul: '',
    pengarang: '',
    penerbit: '',
    tahun: '',
    stok: 1,
});

function submit() {
    form.post('/buku');
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Tambah Buku</h1>

            <Link href="/buku" class="text-blue-600 mb-4 inline-block">
                Kembali ke Daftar Buku
            </Link>

            <form @submit.prevent="submit"
                  class="max-w-xl bg-white p-6 rounded-lg shadow space-y-4">
                <div>
                    <label class="block mb-1">Kode Buku</label>
                    <input v-model="form.kode_buku" type="text"
                           class="w-full border rounded p-2" required>
                    <p v-if="form.errors.kode_buku" class="text-red-600">
                        {{ form.errors.kode_buku }}
                    </p>
                </div>

                <div>
                    <label class="block mb-1">Judul Buku</label>
                    <input v-model="form.judul" type="text"
                           class="w-full border rounded p-2" required>
                    <p v-if="form.errors.judul" class="text-red-600">
                        {{ form.errors.judul }}
                    </p>
                </div>

                <div>
                    <label class="block mb-1">Pengarang</label>
                    <input v-model="form.pengarang" type="text"
                           class="w-full border rounded p-2" required>
                    <p v-if="form.errors.pengarang" class="text-red-600">
                        {{ form.errors.pengarang }}
                    </p>
                </div>

                <div>
                    <label class="block mb-1">Penerbit</label>
                    <input v-model="form.penerbit" type="text"
                           class="w-full border rounded p-2">
                    <p v-if="form.errors.penerbit" class="text-red-600">
                        {{ form.errors.penerbit }}
                    </p>
                </div>

                <div>
                    <label class="block mb-1">Tahun Terbit</label>
                    <input v-model="form.tahun" type="number"
                           min="1000" max="9999"
                           class="w-full border rounded p-2">
                    <p v-if="form.errors.tahun" class="text-red-600">
                        {{ form.errors.tahun }}
                    </p>
                </div>

                <div>
                    <label class="block mb-1">Stok</label>
                    <input v-model="form.stok" type="number" min="0"
                           class="w-full border rounded p-2" required>
                    <p v-if="form.errors.stok" class="text-red-600">
                        {{ form.errors.stok }}
                    </p>
                </div>

                <button type="submit" :disabled="form.processing"
                        class="bg-indigo-700 text-white px-5 py-2 rounded">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Buku' }}
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
