<template>
	<div class="col-sm-12">
		<div class="form-group">
            <router-link :to="{ name: 'Categories' }" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new Category</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Name</label>
                            <input type="text" v-model="category.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Body</label>
                            <input type="text" v-model="category.body" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-info">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</template>

<script>
    import { EventBus } from '../../event-bus.js';
    export default {
        data() {
            return {
                edit_success: true,
                categoryId: null,
                category: {
                    name: '',
                    body: ''
                },

            }
        },
        mounted() {
            let id = this.$route.params.id;
            this.categoryId = id;
            axios.get('/api/v1/category/' + id)
                .then(response => {
                    this.category = response.data;
                })
                .catch(response => {
                    alert("Could not load your company")
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var newCategory = this.category;
                axios.patch('/api/v1/category/' + this.categoryId, newCategory)
                    .then(response => {
                        this.$router.replace('/categories');
                        EventBus.$emit('edit-success', this.edit_success);
                    })
                    .catch(response => {
                        console.log(response);
                        alert("Could not update your category");
                    });
            }
        }
    }
</script>