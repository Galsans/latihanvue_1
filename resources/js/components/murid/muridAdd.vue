<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Murid</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submitForm">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input
                                    type="text"
                                    id="nama"
                                    placeholder="masukkan nama murid..."
                                    v-model="murid.nama"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select
                                    name="grade_id"
                                    id="grade_id"
                                    class="form-control"
                                >
                                    <option selected disable>
                                        --Pilih Kelas--
                                    </option>
                                    <option
                                        v-for="grade in grades"
                                        :key="grade.id"
                                        :value="grade.id"
                                    >
                                        {{ grade.kelas }}
                                    </option>
                                </select>
                            </div>
                            <div class="btn-group mt-2">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    v-if="isNewMurid"
                                >
                                    SEND
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-secondary"
                                    v-else
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
import axios from "axios";
export default {
    data() {
        return {
            murid: {
                nama: "",
            },
            grade: {
                kelas: "",
            },
        };
    },
    computed: {
        isNewMurid() {
            return !this.$route.path.includes("edit");
        },
    },
    async created() {
        if (!this.isNewMurid) {
            const response = await axios.get(
                `/api/murids/${this.$route.params.id}`
            );
            this.murid = response.data;
        }
    },
    async show() {
        try {
            const response = await axios.get(
                `/api/grades/${this.$route.params.kelas}`
            );
            this.grade = response.data;
        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async submitForm() {
            try {
                if (this.isNewMurid) {
                    await axios.post("/api/murids", this.murid);
                } else {
                    await axios.put(
                        `/api/murids/${this.$route.params.id}`,
                        this.murid
                    );
                }
                this.$route.push("/murids");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
