<template lang="">
    <!-- komponen detail -->
    <div>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ artikel.judul }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ artikel.penulis }}</h6>
                    <p class="card-text">{{ artikel.konten }}</p>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ artikel.tanggal_publikasi }}</h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ artikel.kategori }}</h6>
                    <router-link to="/" class="btn btn-info">Back</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
//import axios untuk method API
import axios from 'axios';

    export default {
        name: 'Details',
        data() {
            return {
                artikel: []
            }
        },
        created() {
        //buat memanggil function getArtikelById
            this.getArtikelById();
        },
        methods: {
        //buat function getArtikel untuk GET data berdasarkan id
            async getArtikelById() {
            try {
            const response = await axios.get(`artikel/${this.$route.params.id}`);
            this.artikel = response.data;
            } catch (error) {
                console.log(error);
            }
            }
        },
    }
</script>
<style lang="">

</style>