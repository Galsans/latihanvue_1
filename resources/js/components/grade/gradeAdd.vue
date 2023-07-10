<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Grades</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submitForm">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <input
                                    type="number"
                                    id="kelas"
                                    class="form-control"
                                    v-model="grade.kelas"
                                    placeholder="masukkan tingkat kelas..."
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <input
                                    type="text"
                                    id="jurusan"
                                    class="form-control"
                                    v-model="grade.jurusan"
                                    placeholder="masukkan nama jurusan..."
                                />
                            </div>
                            <div class="form-group">
                                <label for="">WaliKelas</label>
                                <input
                                    type="text"
                                    id="walikelas"
                                    class="form-control"
                                    v-model="grade.walikelas"
                                    placeholder="masukkan nama walikelas..."
                                />
                            </div>
                            <div class="form-button">
                                <button
                                    type="submit"
                                    v-if="isNewKelas"
                                    class="btn btn-primary"
                                >
                                    SEND
                                </button>
                                <button
                                    type="submit"
                                    v-else
                                    class="btn btn-secondary"
                                >
                                    UPDATE
                                </button>
                            </div>
                        </form>
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
//             grade: {
//                 kelas: "",
//                 jurusan: "",
//                 walikelas: "",
//             },
//         };
//     },
//     computed: {
//         isNewKelas() {
//             return !this.$route.path.includes("edit");
//         },
//     },
//     async created() {
//         if (!this.isNewKelas) {
//             const response = await axios.get(
//                 `/api/grades/${this.$route.params.id}`
//             );
//             this.grade = response.data;
//         }
//     },
//     methods: {
//         async submitForm() {
//             try {
//                 if (this.submitForm) {
//                     await axios.post("/api/grades", this.grade);
//                 } else {
//                     await axios.put(`/api/grades/${this.$route.params.id}`);
//                     this.grade;
//                 }
//                 this.$router.push("/grades");
//             } catch (error) {
//                 console.error(error);
//             }
//         },
//     },
// };

import axios from "axios";
export default {
    data() {
        return {
            grade: {
                kelas: "",
                jurusan: "",
                walikelas: "",
            },
        };
    },
    computed: {
        isNewKelas() {
            return !this.$route.path.includes("edit");
        },
    },
    async created() {
        if (!this.isNewKelas) {
            const response = await axios.get(
                `/api/grades/${this.$route.params.id}`
            );
            this.grade = response.data;
        }
    },
    methods: {
        async submitForm() {
            try {
                if (this.isNewKelas) {
                    await axios.post("/api/grades", this.grade);
                } else {
                    await axios.put(
                        `/api/grades/${this.$route.params.id}`,
                        this.grade
                    );
                }
                this.$router.push("/grades");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
