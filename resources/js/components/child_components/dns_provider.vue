<template>
    <div class="tab-content">
        <br>
        <div class="card text-center">
            <div class="card-header">Add Digital Ocean Account Token</div>
            <div class="card-body">
                <form action="#" @submit.prevent="submitTask()">
                    <input type="hidden" :value="csrfToken" name="_token"/>
                    <div class="form-group row">
                        <label
                            class="col-sm-3
                            col-form-label"
                            for="token_digital_ocean"
                        >Token</label>
                        <div class="col-sm-9">
                            <input
                                class="form-control"
                                type="text"
                                id="token_digital_ocean"
                                v-model="token"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "dns_provider",
        data() {
            return {
                csrfToken: '',
                token: ''
            }
        },
        mounted() {
            this.csrfToken = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;

        },
        methods: {
            submitTask() {
                let vm = this;

                axios
                    .post('/settings/token_create', {
                        token: this.token,
                    })
                    .then(function (response) {
                        // vm.errors.record(response.data[0]);

                        vm.flashMessage.success({
                            time: 5000,
                            message: 'Add success'
                        });
                    })
                    .catch(function (error) {
                        // vm.errors.record(error.response.data);

                        vm.flashMessage.error({
                            time: 5000,
                            message: 'Errors'
                        });
                    });
            },

            async findToken(){
                let response = await axios.post('/settings/token_get');

                this.token = response.data.token;
            }
        }
    }
</script>

<style scoped>

</style>
