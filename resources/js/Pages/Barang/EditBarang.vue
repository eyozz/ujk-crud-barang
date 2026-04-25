<script setup>
import { ref, reactive, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import HeaderLayout from '@/Layouts/HeaderLayout.vue'
import ButtonSuccess from '@/Components/Button/ButtonSuccess.vue'
import Label from '@/Components/Label/Label.vue'
import TextInput from '@/Components/InputField/TextInput.vue'
import TextArea from '@/Components/InputField/TextArea.vue'
import NumberInput from '@/Components/InputField/NumberInput.vue'

const props = defineProps({
    barang: Object,
    kategori: Array,
    user: Object,
});

const form = reactive({
    nama_produk: '',
    deskripsi_produk: '',
    harga: '',
    stok_barang: '',
    id_kategori: '',
});

const isLoading = ref(false);

onMounted(() => {
    if (props.barang) {
        form.nama_produk = props.barang.nama_produk || '';
        form.deskripsi_produk = props.barang.deskripsi_produk || '';
        form.harga = props.barang.harga || '';
        form.stok_barang = props.barang.stok_barang || '';
        form.id_kategori = props.barang.id_kategori || '';
    }
});

function submit() {
    isLoading.value = true;
    router.put(`/edit/barang/${props.barang.id}`, form, {
        onFinish: () => { isLoading.value = false; },
        onError: () => { isLoading.value = false; }
    });
}

function cancel() {
    router.get('/barang');
}
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <HeaderLayout :user="user" />
        <div class="p-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold">Edit Barang</h1>
                    <p class="text-gray-600">Ubah informasi barang</p>
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <Label text="Nama Barang" />
                        <TextInput v-model="form.nama_produk" placeholder="Masukkan nama barang" required />
                    </div>

                    <div>
                        <Label text="Deskripsi Barang" />
                        <TextArea v-model="form.deskripsi_produk" placeholder="Masukkan deskripsi barang" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <Label text="Harga Barang" />
                            <NumberInput v-model="form.harga" placeholder="Masukkan harga" required />
                        </div>
                        <div>
                            <Label text="Stok Barang" />
                            <NumberInput v-model="form.stok_barang" placeholder="Masukkan stok" required />
                        </div>
                    </div>

                    <div>
                        <Label text="Kategori" />
                        <select v-model="form.id_kategori" class="w-full border rounded p-2">
                            <option value="">-- Pilih Kategori --</option>
                            <option v-for="k in kategori" :key="k.id_kategori" :value="k.id_kategori">
                                {{ k.nama_kategori }}
                            </option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" @click="cancel" class="btn btn-outline" :disabled="isLoading">
                            Batal
                        </button>
                        <ButtonSuccess type="submit" :disabled="isLoading">
                            <span v-if="isLoading" class="loading loading-spinner loading-sm"></span>
                            {{ isLoading ? 'Menyimpan...' : 'Update Barang' }}
                        </ButtonSuccess>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>