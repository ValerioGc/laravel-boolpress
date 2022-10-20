<template>
    <main>
        <router-view></router-view>
    </main>
</template>

<script>

    export default {
        name: 'appMain',
    }

</script>

<style lang="scss" scoped>
    main {
        background-color: #c7c7c7;
        min-height: calc(100vh - 11vh);
        padding: 3rem 0;
    }
</style>
