<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-block p-3">
                        <div class="form-group d-flex gap-2">
                            <h5>Nama:</h5>
                            <span>{{ murid.nama }}</span>
                        </div>
                        <div class="form-group d-flex gap-2">
                            <h5>Kelas:</h5>
                            <span>{{ murid.grade_id }}</span>
                        </div>
                        <div class="btn-group">
                            <router-link
                                :to="`/murids/${murid.id}/edit`"
                                class="btn btn-secondary mt-3"
                                >Edit</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            murid: {},
        };
    },
    async created() {
        try {
            const response = await axios.get(
                `/api/murids/${this.$route.params.id}`
            );
            this.murid = response.data;
        } catch (error) {
            console.error(error);
        }
    },
};
</script>
