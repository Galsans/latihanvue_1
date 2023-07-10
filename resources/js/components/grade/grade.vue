<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Detail Kelas</h3>
                    </div>
                    <div class="card-body">
                        <h4>Kelas :</h4>
                        <p>{{ grade.kelas }}</p>
                        <h4>Jurusan :</h4>
                        <p>{{ grade.jurusan }}</p>
                        <h4>WaliKelas :</h4>
                        <p>{{ grade.walikelas }}</p>
                        <router-link
                            :to="`/grades/${grade.id}/edit`"
                            class="btn btn-info"
                            >Edit</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import axios from "axios";
// export default {
//     data() {
//         return {
//             grade: {},
//         };
//     },
//     async created() {
//         try {
//             const response = await axios.get(
//                 `/api/grades/${this.$route.params.id}`
//             );
//             this.grade = response.data;
//         } catch (error) {
//             console.error(error);
//         }
//     },
// };

import axios from "axios";
export default {
    data() {
        return {
            grade: {},
        };
    },
    async created() {
        try {
            const response = await axios.get(
                `/api/grades/${this.$route.params.id}`
            );
            this.grade = response.data;
        } catch (error) {
            console.error(error);
        }
    },
};
</script>
