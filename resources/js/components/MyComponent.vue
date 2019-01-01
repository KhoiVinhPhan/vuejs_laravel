<template>
    <div class="my-component">
        <div>{{ message.text }}</div>
        <div>{{ message.type }}</div>
        <div><button @click="changeMessageText">Change text</button></div>
        <div><button @click="changeMessageType">Change type</button></div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: {
                    text: 'text',
                    type: 'type'
                }
            }
        },
        methods: {
            changeMessageText() {
                this.message.text = 'this is new message text'
            },
            changeMessageType() {
                this.message.type = 'this is new message type'
            }
        },
        computed: {
            watchText() {
                return this.message.text
            },
            watchType() {
                return this.message.type
            }
        },
        watch: {
            watchText() {
                console.log('change text')
            },
            watchType() {
                console.log('change type')
            }
        }
    }
</script>

<style lang="scss" scoped>
    .my-component {
        color: red;
    }
</style>