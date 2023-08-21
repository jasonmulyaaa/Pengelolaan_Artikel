<template lang="">
        <!-- panggil komponen Artikel -->
    <Artikel />
</template>
<script>
// import komponen Artikel
import Artikel from '../components/Artikel.vue';

// buat export ArtikelList dengan komponen Artikel
export default {
    name: "ArtikelList",
    components: {
        Artikel
    }
}
</script>
<style lang="">
    
</style>