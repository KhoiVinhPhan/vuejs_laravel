<template>
	<div class="col-sm-12">
		<div class="form-group">
            <router-link :to="{ name: 'Categories' }" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new Category</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div>
                        <div class="col-sm-2">
                            <div class="dropbox">
                                <input type="file" multiple :name="uploadFieldName" :disabled="isSaving" @change="filesChange($event.target.name, $event.target.files); fileCount = $event.target.files.length" accept="image/*" class="input-file">
                                <p v-if="isInitial">
                                    Drag your file(s) here to begin<br> or click to browse
                                </p>
                                <p v-if="isSaving">
                                    Uploading {{ fileCount }} files...
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Name</label>
                                <input type="text" v-model="category.name" class="form-control">
                            </div>
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Body</label>
                                <input type="text" v-model="category.body" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 form-group">
                        <button class="btn btn-success">Create</button>
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
                create_success: true,
				category: {
					name: '',
					body: ''
				},
                file: '',
			}
		},
		methods: {
            saveForm() {
                event.preventDefault();
                var newCategory = this.category;
                var file = this.file;
                axios.post( '/api/v1/category', newCategory )
                .then(response => {
                    this.$router.push({path: '/categories'});
                    EventBus.$emit('create-success', this.create_success);
                })
                .catch(response => {
                    console.log(response);
                    alert("Could not create your company");
                });
            },
            previewFiles(e) {
                this.file = this.$refs.file.files[0];
            }
            
        }
	}
</script>
<style lang="scss" scoped>
    .dropbox {
        
        outline-offset: -10px;
        background: lightcyan;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px; /* minimum height */
        position: relative;
        cursor: pointer;
    }

    .input-file {
        opacity: 0; /* invisible but it's there! */
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }

    .dropbox:hover {
        background: lightblue; /* when mouse over to the drop zone, change color */
    }

    .dropbox p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 0;
    }
</style>
