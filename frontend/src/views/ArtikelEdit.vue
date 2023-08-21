<template lang="">
    <div>
        <!-- panggil komponen EditForm -->
        <EditForm />
    </div>
</template>
<script>
// import komponen EditForm
import EditForm from '../components/EditForm.vue';

// buat export ArtikelEdit dengan komponen EditForm
export default {
    name: "ArtikelEdit",
    components: {
        EditForm
    },
};
</script>
<style lang="">
    
</style>