<template>
    <div class="tab-content">
        <br>
        <div class="card text-center">
            <div class="card-header">Add Digital Ocean Account Token</div>
            <div class="card-body">
                <form method="POST" action="#">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="token_digital_ocean">Token</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="token_digital_ocean">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "dns_provider"
    }
</script>

<style scoped>

</style>
