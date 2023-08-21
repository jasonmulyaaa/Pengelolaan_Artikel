<template lang="">
    <!-- komponen add form -->
    <div>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Artikel</h4>
                </div>
                <div class="card-body">
                    <!-- buat form dengan memanggil function saveArtikel -->
                <form @submit.prevent="saveArtikel">
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <input type="text" v-model="judul" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="">Penulis</label>
                        <input type="text" v-model="penulis" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="">Konten</label>
                        <input type="text" v-model="konten" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Publikasi</label>
                        <input type="date" v-model="tanggal_publikasi" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="">Kategori</label>
                        <input type="text" v-model="kategori" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">Save</button>
                    <router-link to="/" class="btn btn-info">Back</router-link>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
//import axios untuk method API
import axios from 'axios';

export default {
    name: 'AddForm',
    data(){
        // buat empty string
        return {
            judul: '',
            penulis: '',
            konten: '',
            tanggal_publikasi: '',
            kategori: ''
        }
    },
    methods: {
        //buat function saveArtikel untuk method POST data artikel
        async saveArtikel(){
            try {
                await axios.post('artikel', {
                    // isi value sesuai dari form frontend
                    judul: this.judul,
                    penulis: this.penulis,
                    konten: this.konten,
                    tanggal_publikasi: this.tanggal_publikasi,
                    kategori: this.kategori,
                });
            // kosongkan kembali valuenya
            (this.judul = ""),
            (this.penulis = ""),
            (this.konten = ""),
            (this.tanggal_publikasi = ""),
            (this.kategori = ""),
            // buat redirect ke halaman list data
                this.$router.push('/');
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
<style lang="">
    
</style>