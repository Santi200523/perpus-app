<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    book: Object,
});

const form = useForm({
    kode_buku: props.book.kode_buku ?? '',
    judul: props.book.judul ?? '',
    pengarang: props.book.pengarang ?? '',
    penerbit: props.book.penerbit ?? '',
    tahun: props.book.tahun ?? '',
    stok: props.book.stok ?? 0,
});

function simpan() {
    form.put(route('buku.update', props.book.id));
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="mx-auto max-w-2xl p-6">
            <h1 class="mb-6 text-xl font-bold">Edit Data Buku</h1>

            <form @submit.prevent="simpan" class="space-y-4">
                <div>
                    <label class="mb-1 block">Kode Buku</label>
                    <input v-model="form.kode_buku" required class="w-full rounded border p-2" />
                    <p v-if="form.errors.kode_buku" class="text-red-600">{{ form.errors.kode_buku }}</p>
                </div>

                <div>
                    <label class="mb-1 block">Judul Buku</label>
                    <input v-model="form.judul" required class="w-full rounded border p-2" />
                    <p v-if="form.errors.judul" class="text-red-600">{{ form.errors.judul }}</p>
                </div>

                <div>
                    <label class="mb-1 block">Pengarang</label>
                    <input v-model="form.pengarang" required class="w-full rounded border p-2" />
                    <p v-if="form.errors.pengarang" class="text-red-600">{{ form.errors.pengarang }}</p>
                </div>

                <div>
                    <label class="mb-1 block">Penerbit</label>
                    <input v-model="form.penerbit" class="w-full rounded border p-2" />
                </div>

                <div>
                    <label class="mb-1 block">Tahun Terbit</label>
                    <input v-model="form.tahun" maxlength="4" class="w-full rounded border p-2" />
                    <p v-if="form.errors.tahun" class="text-red-600">{{ form.errors.tahun }}</p>
                </div>

                <div>
                    <label class="mb-1 block">Stok</label>
                    <input v-model="form.stok" type="number" min="0" required class="w-full rounded border p-2" />
                    <p v-if="form.errors.stok" class="text-red-600">{{ form.errors.stok }}</p>
                </div>

                <div class="flex gap-2">
                    <button type="submit" :disabled="form.processing"
                        class="rounded bg-indigo-600 px-4 py-2 text-white">
                        {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                    </button>

                    <Link href="/buku" class="rounded border px-4 py-2">
                        Batal
                    </Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
