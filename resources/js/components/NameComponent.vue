<template>
    <div class="names">
        <p>{{ hello }}</p>
        <ul>
            <li 
                v-for="col in [ 'red', 'green' ]"
                :value="col"
                :key="col"
            >{{ col }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            hello: 'Hello World!'
        }
    },
    mounted() {
        console.log('Name  Component mounted.')
    },
}
</script>

<style scoped>
  p {
    color: blue;
  }
</style>