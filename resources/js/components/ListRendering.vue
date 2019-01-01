<template>
	<div class="list-rendering">
		<ul>
			<li v-for="(food, index) in foods">
                {{ food.name }} - at index {{ index }}
            </li>
		</ul>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				foods: [
					{ name: 'Hamberger'},
					{ name: 'Sanwide'},
					{ name: 'Pig'}
				]
			}
		}
	}
</script>