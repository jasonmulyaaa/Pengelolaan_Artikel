<template lang="">
    <div>
        <!-- panggil komponen Details -->
        <Details />
    </div>
</template>
<script>
// import komponen Details
import Details from '../components/Details.vue';

// buat export ArtikelDetail dengan komponen Details
export default {
    name: 'ArtikelDetail',
    components: {
        Details
    }
}
</script>
<style lang="">
    
</style>