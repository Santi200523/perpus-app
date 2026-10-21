<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    kode_buku: '',
    judul: '',
    pengarang: '',
    penerbit: '',
    tahun: '',
    stok: 0,
});

function submit() {
    form.post('/books');
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-6 max-w-2xl">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Buku</h1>

            <form @submit.prevent="submit" class="bg-white rounded-xl shadow p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Buku</label>
                    <input v-model="form.kode_buku" type="text" class="w-full border rounded-lg px-3 py-2">
                    <p v-if="form.errors.kode_buku" class="text-red-600 text-sm mt-1">{{ form.errors.kode_buku }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Judul</label>
                    <input v-model="form.judul" type="text" class="w-full border rounded-lg px-3 py-2">
                    <p v-if="form.errors.judul" class="text-red-600 text-sm mt-1">{{ form.errors.judul }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Pengarang</label>
                    <input v-model="form.pengarang" type="text" class="w-full border rounded-lg px-3 py-2">
                    <p v-if="form.errors.pengarang" class="text-red-600 text-sm mt-1">{{ form.errors.pengarang }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Penerbit</label>
                    <input v-model="form.penerbit" type="text" class="w-full border rounded-lg px-3 py-2">
                    <p v-if="form.errors.penerbit" class="text-red-600 text-sm mt-1">{{ form.errors.penerbit }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Tahun</label>
                    <input v-model="form.tahun" type="text" class="w-full border rounded-lg px-3 py-2">
                    <p v-if="form.errors.tahun" class="text-red-600 text-sm mt-1">{{ form.errors.tahun }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input v-model="form.stok" type="number" min="0" class="w-full border rounded-lg px-3 py-2">
                    <p v-if="form.errors.stok" class="text-red-600 text-sm mt-1">{{ form.errors.stok }}</p>
                </div>

                <div class="flex gap-3">
                    <button type="submit" :disabled="form.processing"
                            class="px-4 py-2 bg-indigo-700 text-white rounded-lg hover:bg-indigo-800">
                        Simpan
                    </button>
                    <Link href="/books" class="px-4 py-2 border rounded-lg text-gray-700">Batal</Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>