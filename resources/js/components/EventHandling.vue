<template>
    <div class="event-handling">
        <form>
            <button type="submit" v-on:click.prevent="sayWelcome">Submit</button>
        </form>
    </div>
</template>

<script>
     export default {
        methods: {
            sayWelcome() {
                alert(1)
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>