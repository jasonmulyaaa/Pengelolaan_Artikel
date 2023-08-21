<template lang="">
    <!-- komponen list artikel -->
<div>
    <div class="card">
        <div class="card-header">
            <h4>
                Artikel
                <RouterLink :to="{ name: 'ArtikelAdd'}" class="btn btn-primary float-end">
                    Add Artikel
                </RouterLink>
                <form class="d-flex float-end me-3">
                <input v-model="search" type="text" placeholder="Search..." class="form-control">
                </form>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <!-- <th>No</th> -->
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal Publikasi</th>
                        <th>Kategori</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <!-- looping data artikel -->
                    <tr v-for="artikel in filteredPosts" :key="artikel.id">
                        <!-- <td>{{ artikel + 1 }}</td> -->
                        <td>{{ artikel.judul }}</td>
                        <td>{{ artikel.penulis }}</td>
                        <td>{{ artikel.tanggal_publikasi }}</td>
                        <td>{{ artikel.kategori }}</td>
                        <td>{{ artikel.view }}</td>
                        <td>
                            <!-- buat tombol untuk pergi ke halaman detail -->
                            <router-link :to="{name: 'ArtikelDetail', params:{id: artikel.id}}" class="btn btn-info">Detail</router-link>
                            <!-- buat tombol untuk pergi ke halaman edit -->
                            <router-link :to="{name: 'ArtikelEdit',params:{id: artikel.id}}" class="btn btn-warning">Edit</router-link>
                            <!-- buat tombol untuk menghapus data dan memanggil function deleteArtikel -->
                            <button type="button" class="btn btn-danger" @click="deleteArtikel(artikel.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>
<script>
//import axios untuk method API
import axios from 'axios';

export default {
    name: "Artikel",
    data() {
        return {
            search: "",
            artikel: []
        }
    },
    created() {
        //buat memanggil function getArtikel
        this.getArtikel();
    },

    methods: {
        //buat function getArtikel untuk GET all data artikel
        async getArtikel(){
            try {
            const response = await axios.get('artikel');
            this.artikel = response.data;
            } catch (error) {
                console.log(error);
            }

        },
        //buat function deleteArtikel untuk DELETE data berdasarkan id
        async deleteArtikel(id){
            try {
            await axios.delete(`artikel/${id}`);
            this.getArtikel();
            } catch (error) {
                console.log(error);
            }
        },
    },
    //buat function filteredPosts untuk search data
    computed: {
        filteredPosts() {
            return this.artikel.filter(artikel => artikel.judul.toLowerCase().includes(this.search.toLowerCase()));
        }
    },
};
</script>
<style lang="">
    
</style>