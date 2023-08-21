<template lang="">
    <div>
        <!-- panggil komponen AddForm -->
        <AddForm />
    </div>
</template>
<script>
// import komponen AddForm
import AddForm from '../components/AddForm.vue';

// buat export ArtikelAdd dengan komponen AddForm
export default {
    name: "ArtikelAdd",
    components: {
        AddForm
    },
};
</script>
<style lang="">
    
</style>