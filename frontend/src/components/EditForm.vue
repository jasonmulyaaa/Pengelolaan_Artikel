<template lang="">
    <!-- komponen edit form -->
    <div>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Artikel</h4>
                </div>
                <div class="card-body">
                    <!-- buat form edit dengan memanggil function updateArtikel -->
                <form @submit.prevent="updateArtikel">
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
                        <label for="">Slug</label>
                        <input type="text" v-model="slug" class="form-control" disabled/>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">Update</button>
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
    name: "EditForm",
    data() {
        //buat empty string
        return {
            judul: "",
            penulis: "",
            konten: "",
            tanggal_publikasi: "",
            kategori: "",
            slug: "",
        }
    },
    created(){
        //buat memanggil function getArtikelById
        this.getArtikelById();
    },
    methods: {
        //buat function getArtikel untuk method GET data berdasarkan id
        async getArtikelById(){
            try {
            const response = await axios.get(`artikel/${this.$route.params.id}`);
            (this.judul = response.data.judul),
            (this.penulis = response.data.penulis),
            (this.konten = response.data.konten),
            (this.tanggal_publikasi = response.data.tanggal_publikasi),
            (this.kategori = response.data.kategori);
            (this.slug = response.data.slug);
            } catch (error) {
                console.log(error);
            }
        },
        //buat function updateArtikel untuk method PUT data berdasarkan id
        async updateArtikel(){
            try {
            await axios.put(`artikel/${this.$route.params.id}`, {
                // isi value sesuai dari form frontend
                judul: this.judul,
                penulis: this.penulis,
                konten: this.konten,
                tanggal_publikasi: this.tanggal_publikasi,
                kategori: this.kategori
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