<template>
    <div class="form-input-binding">
        <div class="text">
            {{ message }}
        </div>
        <div class="input-form">
            <input type="radio" v-model="message" value="one">
            <input type="radio" v-model="message" value="two">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>