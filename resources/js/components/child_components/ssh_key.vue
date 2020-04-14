<template>
    <div>
        <div class="tab-content">
            <br>
            <div class="card text-center">
                <div class="card-header">Add SSH Public Key</div>
                <div class="card-body">
                    <form action="#" @submit.prevent="submitTask()">
                        <input type="hidden" :value="csrfToken" name="_token"/>
                        <div class="form-group row">
                            <label
                                class="col-sm-3 col-form-label"
                                for="ssh_name"
                            >Name</label>
                            <div class="col-sm-9">
                                <input
                                    class="form-control"
                                    type="text"
                                    id="ssh_name"
                                    name="ssh_name"
                                    v-model="ssh_name"
                                >
                                <div >
                                    {{errors.get('ssh_name')}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-3
                                col-form-label"
                                for="ssh_pub_key"
                            >Public Key</label>
                            <div class="col-sm-9">
                                <textarea
                                    class="form-control"
                                    rows="8"
                                    id="ssh_pub_key"
                                    name="ssh_pub_key"
                                    v-model="ssh_key"
                                ></textarea>
                                <div>
                                    {{errors.get('ssh_key')}}
                                </div>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="btn
                            btn-success"
                        >Add Key</button>
                    </form>
                </div>
            </div>
        </div>

        <br>

        <div class="tab-content">
            <div class="card text-center">
                <div class="card-header">SSH Keys</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    class Errors {
        constructor() {
            this.errors = {};
        }

        get(fields) {
            if(this.errors[fields]){
                return this.errors[fields][0];
            }
        }

        record(errors) {
            if(errors === 'success'){
                return this.errors = '';
            }
            this.errors = errors.errors;
        }
    }

    export default {
        name: "ssh_key",
        data() {
            return {
                csrfToken: null,
                ssh_name: null,
                ssh_key: null,
                errors: new Errors()
            }
        },
        mounted() {
            this.csrfToken = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;
        },
        methods: {
            submitTask(){
                let vm = this;

                axios
                    .post('/settings/ssh', {
                        ssh_name: this.ssh_name,
                        ssh_key: this.ssh_key
                    })
                    .then(function (response) {
                        vm.errors.record(response.data[0]);
                        vm.flashMessage.success({
                            time: 5000,
                            message: 'Success'
                        });
                    })
                    .catch(function (error) {
                        vm.errors.record(error.response.data);
                        vm.flashMessage.error({
                            time: 5000,
                            message: 'Errors'
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>
