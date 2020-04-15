<template>
    <div class="tab-content">
        <br>
        <div class="card text-center">
            <div class="card-header">Contact Information</div>
            <div class="card-body">
                <form action="#" @submit.prevent="submitTask()">
                    <input type="hidden" :value="csrfToken" name="_token"/>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">
                            Name
                        </label>
                        <div class="col-sm-9">
                            <input
                                class="form-control"
                                type="text"
                                id="name"
                                v-model="name"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">
                            Email
                        </label>
                        <div class="col-sm-9">
                            <input
                                class="form-control"
                                type="email"
                                id="email"
                                v-model="email"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "profile",
        data() {
            return {
                csrfToken: '',
                name: '',
                email: '',
                // errors: new Errors()
            }
        },
        mounted() {
            this.csrfToken = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;

            this.findProfile();
        },
        methods: {
            submitTask(){
                let vm = this;

                axios
                    .post('/settings/profile_update', {
                        name: this.name,
                        email: this.email
                    })
                    .then(function (response) {
                        // vm.errors.record(response.data[0]);
                        vm.findProfile();

                        vm.flashMessage.success({
                            time: 5000,
                            message: 'Add success'
                        });
                    })
                    .catch(function (error) {
                        // vm.errors.record(error.response.data);
                        vm.findProfile();

                        vm.flashMessage.error({
                            time: 5000,
                            message: 'Errors'
                        });
                    });
            },

            async findProfile(){
                let response = await axios.post('/settings/profile_get');

                this.name = response.data.name;
                this.email = response.data.email;
            }
        }
    }

    // class Errors {
    //     constructor() {
    //         this.errors = {};
    //     }
    //
    //     record(errors) {
    //         if(errors === 'success'){
    //             return this.errors = '';
    //         }
    //
    //         this.errors = errors.errors;
    //     }
    //
    //     get(fields) {
    //         if(this.errors[fields]){
    //             return this.errors[fields][0];
    //         }
    //     }
    // }
</script>

<style scoped>

</style>
