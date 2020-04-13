<template>
    <div class="tab-content">
        <br>
        <div class="card text-center">
            <div class="card-header">Contact Information</div>
            <div class="card-body">
                <form method="POST" action="#">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" id="email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "profile"
    }
</script>

<style scoped>

</style>
